#!/bin/bash
# =============================================================================
# migrate-to-remote.sh — Migra conteúdo IIBPR do WP local para o site remoto
# =============================================================================
set -euo pipefail

REMOTE_URL="https://mkt.institutoibpr.com.br"
ROYAL_KEY="8fc626f7ac435484572e789abf032f8e"
WP_USER="claude-migration"
WP_APP_PASS="c4Om TxDh etq1 USGk UCmM NYmi"
WP_ROOT="/Users/oguidomingos/Documents/wp_sites/wpall"
AUTH=$(echo -n "${WP_USER}:${WP_APP_PASS}" | base64)
TMP="/tmp/iibpr-mig"

mkdir -p "$TMP"

echo "╔══════════════════════════════════════╗"
echo "║  IIBPR — Migração para Produção     ║"
echo "╚══════════════════════════════════════╝"
echo ""

cd "$WP_ROOT"

# ─── Helper: push CPT posts ───
push_posts() {
  local post_type="$1"
  local api_endpoint="$2"
  local json_file="$TMP/${post_type}.json"

  wp post list --post_type="$post_type" --post_status=publish \
    --fields=ID,post_title,post_name,post_content,post_excerpt \
    --format=json 2>/dev/null | grep -v '^Deprecated:' > "$json_file"

  python3 << PYEOF
import json, urllib.request, base64, ssl

ctx = ssl.create_default_context()
auth = base64.b64encode(b'${WP_USER}:${WP_APP_PASS}').decode()
url = '${REMOTE_URL}/wp-json/wp/v2/${api_endpoint}'

with open('${json_file}') as f:
    data = json.load(f)

for item in data:
    payload = json.dumps({
        'title': item['post_title'],
        'slug': item['post_name'],
        'content': item['post_content'],
        'excerpt': item['post_excerpt'],
        'status': 'publish'
    }).encode()

    req = urllib.request.Request(url, data=payload, method='POST')
    req.add_header('Authorization', f'Basic {auth}')
    req.add_header('Content-Type', 'application/json')
    try:
        resp = urllib.request.urlopen(req, context=ctx)
        result = json.loads(resp.read())
        print(f"      + {item['post_title'][:55]} -> ID {result.get('id','?')}")
    except urllib.error.HTTPError as e:
        body = e.read().decode()
        if 'already exists' in body.lower() or 'duplicate' in body.lower():
            print(f"      = {item['post_title'][:55]} (ja existe)")
        else:
            print(f"      ! ERRO {item['post_title'][:40]}: {e.code} {body[:80]}")
PYEOF
}

# ─── Helper: push meta ───
push_meta() {
  local post_type="$1"
  local api_endpoint="$2"

  wp post list --post_type="$post_type" --post_status=publish \
    --fields=ID,post_name --format=csv 2>/dev/null | grep -v '^Deprecated:' > "$TMP/${post_type}_ids.csv"

  tail -n +2 "$TMP/${post_type}_ids.csv" | while IFS=',' read -r local_id slug; do
    # Get remote ID by slug
    remote_id=$(curl -s "${REMOTE_URL}/wp-json/wp/v2/${api_endpoint}?slug=${slug}&per_page=1" \
      -H "Authorization: Basic ${AUTH}" | python3 -c "
import json,sys
data=json.load(sys.stdin)
if data: print(data[0]['id'])" 2>/dev/null || true)

    [ -z "$remote_id" ] && continue

    # Get local meta
    wp post meta list "$local_id" --format=json 2>/dev/null | grep -v '^Deprecated:' > "$TMP/meta_${local_id}.json"

    python3 << PYEOF
import json, urllib.request, base64, ssl

ctx = ssl.create_default_context()
auth = base64.b64encode(b'${WP_USER}:${WP_APP_PASS}').decode()

with open('${TMP}/meta_${local_id}.json') as f:
    data = json.load(f)

meta = {}
for m in data:
    key = m['meta_key']
    if key.startswith('_iibpr_'):
        meta[key] = m['meta_value']

if meta:
    url = '${REMOTE_URL}/wp-json/wp/v2/${api_endpoint}/${remote_id}'
    payload = json.dumps({'meta': meta}).encode()
    req = urllib.request.Request(url, data=payload, method='POST')
    req.add_header('Authorization', f'Basic {auth}')
    req.add_header('Content-Type', 'application/json')
    try:
        resp = urllib.request.urlopen(req, context=ctx)
        print(f"      + meta ${slug}: {len(meta)} campos -> ID ${remote_id}")
    except urllib.error.HTTPError as e:
        print(f"      ! meta erro ${slug}: {e.code}")
PYEOF
  done
}

# ─────────────────────────────────────────────
# 1. CRIAR PÁGINAS
# ─────────────────────────────────────────────
echo "[1/6] Criando paginas..."

for pair in \
  "front-page|front-page" \
  "psicomotricidade|Psicomotricidade" \
  "cursos|Cursos" \
  "eventos|Eventos" \
  "sobre|Sobre Nos" \
  "blog|Blog / Noticias" \
  "contato|Contato" \
  "pesquisa|Pesquisa" \
  "area-do-aluno|Area do Aluno"; do

  slug="${pair%%|*}"
  title="${pair##*|}"

  # Check if exists via WP REST API
  existing=$(curl -s "${REMOTE_URL}/wp-json/wp/v2/pages?slug=${slug}&per_page=1" \
    -H "Authorization: Basic ${AUTH}" | python3 -c "
import json,sys
data=json.load(sys.stdin)
if data: print(data[0]['id'])" 2>/dev/null || true)

  if [ -n "$existing" ]; then
    echo "      = $title ($slug) ja existe (ID $existing)"
    continue
  fi

  json_body=$(python3 -c "
import json
print(json.dumps({'title':'${title}','slug':'${slug}','content':' ','status':'publish'}))
")

  result=$(curl -s -X POST "${REMOTE_URL}/wp-json/wp/v2/pages" \
    -H "Authorization: Basic ${AUTH}" \
    -H "Content-Type: application/json" \
    -d "$json_body")

  new_id=$(echo "$result" | python3 -c "import json,sys;print(json.load(sys.stdin).get('id','?'))" 2>/dev/null || echo "?")
  echo "      + $title ($slug) -> ID $new_id"
done

# ─────────────────────────────────────────────
# 2. CRIAR CURSOS
# ─────────────────────────────────────────────
echo ""
echo "[2/6] Criando cursos..."
push_posts "iibpr_curso" "iibpr_curso"

# ─────────────────────────────────────────────
# 3. CRIAR EVENTOS
# ─────────────────────────────────────────────
echo ""
echo "[3/6] Criando eventos..."
push_posts "iibpr_evento" "iibpr_evento"

# ─────────────────────────────────────────────
# 4. CRIAR DEPOIMENTOS + EQUIPE
# ─────────────────────────────────────────────
echo ""
echo "[4/6] Criando depoimentos e equipe..."
echo "  [depoimentos]"
push_posts "iibpr_depoimento" "iibpr_depoimento"
echo "  [equipe]"
push_posts "iibpr_equipe" "iibpr_equipe"

# ─────────────────────────────────────────────
# 5. CRIAR BLOG POSTS
# ─────────────────────────────────────────────
echo ""
echo "[5/6] Criando blog posts..."
push_posts "post" "posts"

# ─────────────────────────────────────────────
# 6. MIGRAR META
# ─────────────────────────────────────────────
echo ""
echo "[6/6] Migrando meta fields..."
echo "  [cursos]"
push_meta "iibpr_curso" "iibpr_curso"
echo "  [eventos]"
push_meta "iibpr_evento" "iibpr_evento"
echo "  [depoimentos]"
push_meta "iibpr_depoimento" "iibpr_depoimento"
echo "  [equipe]"
push_meta "iibpr_equipe" "iibpr_equipe"

# Cleanup
rm -rf "$TMP"

echo ""
echo "========================================"
echo "  Migracao concluida!"
echo "========================================"
echo ""
echo "Site: $REMOTE_URL"
echo ""
echo "Proximos passos no WP Admin:"
echo "  1. Configuracoes > Leitura > Pagina estatica > front-page"
echo "  2. Configuracoes > Links permanentes > Nome do post"
echo "  3. Aparencia > Menus > criar menu principal"
echo "  4. Aparencia > Personalizar > theme mods"
