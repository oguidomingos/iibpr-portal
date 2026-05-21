#!/bin/bash
# =============================================================================
# IIBPR Site Review — Abre cada página para inspeção visual
# Uso: bash review-site.sh [all|home|cursos|eventos|blog|pesquisa|sobre|contato|psicomotricidade|curso-single|customizer]
# =============================================================================

SITE="http://wpall.test"
DELAY=3

pages=(
  "$SITE|Home"
  "$SITE/cursos|Cursos"
  "$SITE/eventos|Eventos"
  "$SITE/blog|Blog"
  "$SITE/pesquisa|Pesquisa"
  "$SITE/sobre|Sobre"
  "$SITE/contato|Contato"
  "$SITE/psicomotricidade|Psicomotricidade"
)

open_page() {
  local url="$1" name="$2"
  echo "→ Abrindo: $name ($url)"
  open "$url"
}

case "${1:-all}" in
  all)
    echo "=== Review Visual Completo ==="
    echo "Abrindo todas as páginas com ${DELAY}s de intervalo..."
    echo ""
    for entry in "${pages[@]}"; do
      IFS='|' read -r url name <<< "$entry"
      open_page "$url" "$name"
      sleep $DELAY
    done
    echo ""
    echo "=== Extras ==="
    # Primeiro curso e primeiro evento
    echo "→ Abrindo: Primeiro Curso (single)"
    open "$SITE/?post_type=iibpr_curso&p=188"
    sleep $DELAY
    echo "→ Abrindo: Primeiro Evento (single)"
    open "$SITE/?post_type=iibpr_evento&p=194"
    sleep $DELAY
    echo "→ Abrindo: Customizer"
    open "$SITE/wp-admin/customize.php"
    echo ""
    echo "=== Tudo aberto! Revise cada aba. ==="
    ;;
  home)        open_page "$SITE" "Home" ;;
  cursos)      open_page "$SITE/cursos" "Cursos" ;;
  eventos)     open_page "$SITE/eventos" "Eventos" ;;
  blog)        open_page "$SITE/blog" "Blog" ;;
  pesquisa)    open_page "$SITE/pesquisa" "Pesquisa" ;;
  sobre)       open_page "$SITE/sobre" "Sobre" ;;
  contato)     open_page "$SITE/contato" "Contato" ;;
  psicomotricidade) open_page "$SITE/psicomotricidade" "Psicomotricidade" ;;
  curso-single) open_page "$SITE/?post_type=iibpr_curso&p=188" "Curso Single" ;;
  customizer)  open_page "$SITE/wp-admin/customize.php" "Customizer" ;;
  *)
    echo "Uso: bash review-site.sh [all|home|cursos|eventos|blog|pesquisa|sobre|contato|psicomotricidade|curso-single|customizer]"
    ;;
esac
