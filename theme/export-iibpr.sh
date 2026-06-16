#!/bin/bash
# =============================================================================
# export-iibpr.sh — Gera pacote completo para deploy do tema IIBPR
# Uso: bash export-iibpr.sh
# Saída: ~/Desktop/iibpr-completo.zip
# =============================================================================
set -euo pipefail

THEME_DIR="$(cd "$(dirname "$0")" && pwd)"
WP_ROOT="$(cd "$THEME_DIR/../../../.." && pwd)"
UPLOADS_DIR="$WP_ROOT/wp-content/uploads"
BUILD_DIR="/tmp/iibpr-completo"
OUTPUT="$HOME/Desktop/iibpr-completo.zip"
SOURCE_DOMAIN="wpall.test"

echo "╔══════════════════════════════════════╗"
echo "║    IIBPR — Export Completo           ║"
echo "╚══════════════════════════════════════╝"
echo ""
echo "Theme:   $THEME_DIR"
echo "WP Root: $WP_ROOT"
echo "Output:  $OUTPUT"
echo ""

# Verificar wp-cli
if ! command -v wp &>/dev/null; then
  echo "ERRO: wp-cli não encontrado. Instale: brew install wp-cli"
  exit 1
fi

# Limpar build anterior
rm -rf "$BUILD_DIR"
mkdir -p "$BUILD_DIR/uploads"

# ─────────────────────────────────────────────
# 1. ZIP DO TEMA
# ─────────────────────────────────────────────
echo "[1/6] Comprimindo tema..."
# Copiar tema para diretório temporário com nome correto
TEMP_THEME="/tmp/iibpr-portal"
rm -rf "$TEMP_THEME"
# Copiar tudo EXCETO images/ (que é muito grande)
rsync -a --exclude='.asset-tmp' --exclude='node_modules' --exclude='.git' \
  --exclude='export-iibpr.sh' --exclude='*.bak' --exclude='images' \
  "$THEME_DIR/" "$TEMP_THEME/"

# Copiar apenas as imagens referenciadas pelo código PHP
mkdir -p "$TEMP_THEME/images"
REQUIRED_IMAGES=(
  iibpr-logo-main.svg
  aboutus-banner.jpg abp-logo.jpg
  acao-formacao-1.jpg acao-formacao-4.jpg acao-formacao-5.jpg
  acao-grupo-1.jpg acao-grupo-2.jpg acao-grupo-4.jpg acao-grupo-5.jpg acao-grupo-6.jpg
  acao-movimento-1.jpg acao-movimento-2.jpg acao-movimento-4.jpg acao-movimento-6.jpg
  alexandre.jpg augusto2.jpg banner3.png cursos-hero-bg.jpg
  fabiane2.png formacaoprp8.jpg grafomotricidade.png haryadna.jpg
  hero-slide-1.jpg hero-slide-2.jpg hero-slide-3.jpg hero-slide-4.jpg hero-slide-5.jpg
  iesb-logo.jpg iipr.png leilah-machado.jpg luciana-dias.jpg
  mauro-palestra2.png
  para-quem-educadores.jpg para-quem-estudantes.jpg para-quem-pesquisadores.jpg para-quem-saude.jpg
  quem-somos-2.png quem-somos.png services-banner.jpg
  testimonial-section-home3-pattern-1.png textura-fundo.jpg
)
img_count=0
for img in "${REQUIRED_IMAGES[@]}"; do
  if [ -f "$THEME_DIR/images/$img" ]; then
    cp "$THEME_DIR/images/$img" "$TEMP_THEME/images/"
    img_count=$((img_count + 1))
  else
    echo "      AVISO: images/$img não encontrada"
  fi
done

cd /tmp
zip -rq "$BUILD_DIR/iibpr-wp-theme.zip" iibpr-portal/
THEME_SIZE=$(du -sh "$BUILD_DIR/iibpr-wp-theme.zip" | cut -f1)
rm -rf "$TEMP_THEME"
echo "      → iibpr-wp-theme.zip criado ($THEME_SIZE, $img_count imagens, folder: iibpr-portal)"

# ─────────────────────────────────────────────
# 2. EXPORT WXR (conteúdo WordPress)
# ─────────────────────────────────────────────
echo "[2/6] Exportando conteúdo WXR..."
cd "$WP_ROOT"

# Páginas IIBPR (por ID)
IIBPR_PAGE_IDS="13,154,157,159,161,163,165,167,169"
wp export --post__in="$IIBPR_PAGE_IDS" \
  --dir="$BUILD_DIR" --filename_format="iibpr-pages.xml" 2>/dev/null || {
  # Fallback: exportar todas as páginas se --post__in não funcionar
  echo "      → Fallback: exportando todas as páginas..."
  wp export --post_type=page --post_status=publish \
    --dir="$BUILD_DIR" --filename_format="iibpr-pages.xml" 2>/dev/null
}
echo "      → Páginas exportadas"

# CPTs
for pt in iibpr_curso iibpr_evento iibpr_depoimento iibpr_equipe; do
  wp export --post_type="$pt" \
    --dir="$BUILD_DIR" --filename_format="iibpr-${pt}.xml" 2>/dev/null
  count=$(wp post list --post_type="$pt" --format=count 2>/dev/null)
  echo "      → $pt: $count items"
done

# Blog posts
wp export --post_type=post --post_status=publish \
  --dir="$BUILD_DIR" --filename_format="iibpr-posts.xml" 2>/dev/null
echo "      → Blog posts exportados"

# Attachments (media)
wp export --post_type=attachment \
  --dir="$BUILD_DIR" --filename_format="iibpr-media.xml" 2>/dev/null
echo "      → Media exportada"

# ─────────────────────────────────────────────
# 3. COPIAR UPLOADS
# ─────────────────────────────────────────────
echo "[3/6] Copiando uploads..."

# Copiar 2026/ (onde está toda a mídia IIBPR)
if [ -d "$UPLOADS_DIR/2026" ]; then
  cp -R "$UPLOADS_DIR/2026" "$BUILD_DIR/uploads/"
  file_count=$(find "$BUILD_DIR/uploads/2026" -type f | wc -l | tr -d ' ')
  echo "      → 2026/: $file_count arquivos"
fi

# Copiar 2025/ se existir (pode ter media relevante)
if [ -d "$UPLOADS_DIR/2025" ]; then
  cp -R "$UPLOADS_DIR/2025" "$BUILD_DIR/uploads/"
  file_count=$(find "$BUILD_DIR/uploads/2025" -type f | wc -l | tr -d ' ')
  echo "      → 2025/: $file_count arquivos"
fi

# ─────────────────────────────────────────────
# 4. GERAR setup.sh
# ─────────────────────────────────────────────
echo "[4/6] Gerando setup.sh..."

cat > "$BUILD_DIR/setup.sh" << 'SETUP_SCRIPT'
#!/bin/bash
# =============================================================================
# setup.sh — Instala e configura o tema IIBPR num WordPress limpo
# Uso: bash setup.sh https://seudominio.com.br
# =============================================================================
set -euo pipefail

# ─── Parâmetros ───
if [ $# -lt 1 ]; then
  echo "Uso: bash setup.sh <URL_DO_SITE>"
  echo "Exemplo: bash setup.sh https://iibpr.com.br"
  exit 1
fi

TARGET_URL="${1%/}"  # Remove trailing slash
SOURCE_DOMAIN="wpall.test"
SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"

# Extrair domínio do URL destino
TARGET_DOMAIN=$(echo "$TARGET_URL" | sed -E 's|https?://||' | sed 's|/.*||')

echo "╔══════════════════════════════════════╗"
echo "║    IIBPR — Setup Automático          ║"
echo "╚══════════════════════════════════════╝"
echo ""
echo "Destino: $TARGET_URL"
echo "Domínio: $TARGET_DOMAIN"
echo ""

# ─── Pré-requisitos ───
echo "[CHECK] Verificando pré-requisitos..."

if ! command -v wp &>/dev/null; then
  echo "ERRO: wp-cli não encontrado."
  echo "Instale: https://wp-cli.org/#installing"
  exit 1
fi

# Detectar WP root
WP_ROOT=$(wp eval 'echo ABSPATH;' 2>/dev/null || true)
if [ -z "$WP_ROOT" ]; then
  echo "ERRO: WordPress não encontrado no diretório atual."
  echo "Execute este script na raiz do WordPress (onde está wp-config.php)"
  exit 1
fi

WP_CONTENT="$WP_ROOT/wp-content"
echo "      WordPress: $WP_ROOT"
echo ""

# ─── 1. Instalar Contact Form 7 ───
echo "[1/9] Instalando Contact Form 7..."
wp plugin install contact-form-7 --activate 2>/dev/null || echo "      (já instalado)"

# ─── 2. Instalar e ativar tema ───
echo "[2/9] Instalando tema IIBPR..."
if [ -f "$SCRIPT_DIR/iibpr-wp-theme.zip" ]; then
  wp theme install "$SCRIPT_DIR/iibpr-wp-theme.zip" --force 2>/dev/null
  echo "      → Tema instalado"
else
  echo "ERRO: iibpr-wp-theme.zip não encontrado em $SCRIPT_DIR"
  exit 1
fi
wp theme activate iibpr-portal 2>/dev/null
echo "      → Tema ativado"

# ─── 3. Copiar uploads ───
echo "[3/9] Copiando uploads..."
if [ -d "$SCRIPT_DIR/uploads" ]; then
  cp -R "$SCRIPT_DIR/uploads/"* "$WP_CONTENT/uploads/" 2>/dev/null || true
  echo "      → Uploads copiados"
else
  echo "      → Pasta uploads não encontrada (pular)"
fi

# ─── 4. Instalar WP Importer ───
echo "[4/9] Preparando importador..."
wp plugin install wordpress-importer --activate 2>/dev/null || echo "      (já instalado)"

# ─── 5. Importar conteúdo XML ───
echo "[5/9] Importando conteúdo..."
IMPORT_COUNT=0
for xml in "$SCRIPT_DIR"/iibpr-*.xml; do
  if [ -f "$xml" ]; then
    echo "      → Importando $(basename "$xml")..."
    wp import "$xml" --authors=create --skip=image_resize 2>/dev/null || \
    wp import "$xml" --authors=create 2>/dev/null || \
      echo "        AVISO: falha ao importar $(basename "$xml")"
    IMPORT_COUNT=$((IMPORT_COUNT + 1))
  fi
done
echo "      → $IMPORT_COUNT arquivos importados"

# ─── 6. Search-replace URLs ───
echo "[6/9] Atualizando URLs..."
wp search-replace "http://$SOURCE_DOMAIN" "$TARGET_URL" --all-tables --skip-columns=guid 2>/dev/null
wp search-replace "https://$SOURCE_DOMAIN" "$TARGET_URL" --all-tables --skip-columns=guid 2>/dev/null
# Também tratar URLs escapadas em JSON (theme mods são serializados)
wp search-replace "http:\/\/$SOURCE_DOMAIN" "$(echo "$TARGET_URL" | sed 's|/|\\/|g')" --all-tables --skip-columns=guid 2>/dev/null || true
echo "      → URLs atualizadas: $SOURCE_DOMAIN → $TARGET_DOMAIN"

# ─── 7. Configurar opções do site ───
echo "[7/9] Configurando opções..."
wp option update blogname "IIBPR — Instituto Internacional Brasileiro de Psicomotricidade Relacional"
wp option update blogdescription "Psicomotricidade Relacional Psicodinâmica"
wp option update permalink_structure '/%postname%/'

# Descobrir ID da front-page pelo slug
FRONT_ID=$(wp post list --name=front-page --post_type=page --post_status=publish --field=ID 2>/dev/null | head -1)
if [ -n "$FRONT_ID" ]; then
  wp option update show_on_front page
  wp option update page_on_front "$FRONT_ID"
  echo "      → Homepage: página ID $FRONT_ID (front-page)"
else
  echo "      AVISO: Página 'front-page' não encontrada. Configure manualmente em Configurações → Leitura."
fi

# Página do blog
BLOG_ID=$(wp post list --name=blog --post_type=page --post_status=publish --field=ID 2>/dev/null | head -1)
if [ -n "$BLOG_ID" ]; then
  wp option update page_for_posts "$BLOG_ID"
  echo "      → Blog: página ID $BLOG_ID"
fi

# ─── 8. Theme Mods ───
echo "[8/9] Configurando theme mods..."

# Fundador 1
wp theme mod set iibpr_founder_1_name "Fabiane Alves Crispim"
wp theme mod set iibpr_founder_1_role "Fundadora e Coordenadora Técnica"
wp theme mod set iibpr_founder_1_bio_long "Psicopedagoga, Pedagoga especializada em Psicomotricidade, com Mestrado em Psicomotricidade pela Universidade de Évora (Portugal). Com mais de 19 anos dedicados ao desenvolvimento da Psicomotricidade Relacional Psicodinâmica, Fabiane é representante oficial do IIPR no Brasil e coordena toda a metodologia e formações oferecidas pelo instituto."
wp theme mod set iibpr_founder_1_credentials "Pedagogia • Psicopedagogia • Mestrado em Psicomotricidade (Universidade de Évora, Portugal)"

# Fundador 2
wp theme mod set iibpr_founder_2_name "Augusto Parras Albuquerque"
wp theme mod set iibpr_founder_2_role "Pesquisador e Coordenador Acadêmico"
wp theme mod set iibpr_founder_2_bio_long "Licenciado em Educação Física, Mestre em Educação pela Universidade de Brasília (UnB) e Doutor em Psicomotricidade pela Universidade Lusófona (Portugal). Especialista em intervenções com populações atípicas e vulneráveis, Augusto lidera a linha de pesquisa do IIBPR e supervisiona as práticas clínicas."
wp theme mod set iibpr_founder_2_credentials "Educação Física • Mestrado em Educação (UnB) • Doutoramento em Psicomotricidade (Europa)"

# Fundador 3
wp theme mod set iibpr_founder_3_name "Prof. Dr. Mauro Vecchiato"
wp theme mod set iibpr_founder_3_role "Diretor Científico Internacional — IIPR Itália"
wp theme mod set iibpr_founder_3_bio_long "Criador do método Psicomotricidade Relacional Psicodinâmica. Fundador do IIPR (Instituto Italiano de Psicomotricidade Relacional) em Veneza. Formou os fundadores do IIBPR e mantém parceria científica ativa com o instituto brasileiro."

# MVV
wp theme mod set iibpr_sobre_mvv_1_title "Missão"
wp theme mod set iibpr_sobre_mvv_1_text "Desenvolver pessoas autoconscientes capazes de promover o bem social através da saúde gerada pelo autoconhecimento, pela autorregulação e pela integração Psicocorporal."
wp theme mod set iibpr_sobre_mvv_2_title "Visão"
wp theme mod set iibpr_sobre_mvv_2_text "Ser conhecida como referência em Psicomotricidade na região Centro-Oeste do Brasil, exercendo intercâmbios de conhecimento com outras regiões e com outros países."
wp theme mod set iibpr_sobre_mvv_3_title "Valores"
wp theme mod set iibpr_sobre_mvv_3_text "Respeito • Movimento • Consciência • Amor • Ludicidade • Alegria • Visão Holística • Autoconhecimento • Autorregulação • Intercâmbio • Interação • Resiliência • Relação"

# Histórico
wp theme mod set iibpr_sobre_hist_text_1 "O IIBPR nasceu da demanda por serviços de Psicomotricidade na região Centro-Oeste do Brasil, inspirado nas experiências do Instituto Italiano di Psicologia della Relazione (IIPR) e de instituições de Minas Gerais. Fundado por Fabiane Alves Crispim e Augusto Parras Albuquerque, o instituto foi criado para oferecer formação especializada e atendimento psicomotor de alta qualidade."
wp theme mod set iibpr_sobre_hist_text_2 "Hoje, o IIBPR é referência em Psicomotricidade Relacional Psicodinâmica no Centro-Oeste, com formações que atingem profissionais em todo o Brasil e intercâmbios com Portugal, Itália e Espanha. Nossa metodologia une rigor científico com sensibilidade humana, preparando profissionais que transformam vidas pelo movimento e pela relação."

# Stats
wp theme mod set iibpr_sobre_stat_1_number "420h"
wp theme mod set iibpr_sobre_stat_1_label "Carga Horária da Pós-Graduação"
wp theme mod set iibpr_sobre_stat_2_number "+25"
wp theme mod set iibpr_sobre_stat_2_label "Anos de Experiência"
wp theme mod set iibpr_sobre_stat_3_number "+500"
wp theme mod set iibpr_sobre_stat_3_label "Profissionais Formados"
wp theme mod set iibpr_sobre_stat_4_number "3"
wp theme mod set iibpr_sobre_stat_4_label "Países com Parcerias"

# PRP Pilares
wp theme mod set iibpr_prp_pillar_1_title "Psicomotricidade"
wp theme mod set iibpr_prp_pillar_1_text "A ciência que estuda o ser humano por meio do seu corpo em movimento, integrando aspectos cognitivos, emocionais, simbólicos e motores na formação de um sujeito ativo e criativo."
wp theme mod set iibpr_prp_pillar_2_title "Relacional"
wp theme mod set iibpr_prp_pillar_2_text "A dimensão relacional destaca que o desenvolvimento humano ocorre por meio do encontro com o outro. O jogo espontâneo e a relação terapêutica são o coração da intervenção psicomotora."
wp theme mod set iibpr_prp_pillar_3_title "Psicodinâmica"
wp theme mod set iibpr_prp_pillar_3_text "A abordagem psicodinâmica integra os princípios da psicanálise à prática corporal, compreendendo que o movimento revela a história emocional e relacional de cada sujeito."

# PRP Áreas
wp theme mod set iibpr_prp_area_1_title "Educação Infantil"
wp theme mod set iibpr_prp_area_1_text "Apoio ao desenvolvimento psicomotor, emocional e social de crianças em ambientes educacionais, promovendo aprendizagem através do movimento."
wp theme mod set iibpr_prp_area_2_title "Saúde e Reabilitação"
wp theme mod set iibpr_prp_area_2_text "Intervenção em contextos clínicos com foco na integração corpo-mente para pessoas com transtornos do desenvolvimento, deficiências e condições neurológicas."
wp theme mod set iibpr_prp_area_3_title "Inclusão e Vulnerabilidade"
wp theme mod set iibpr_prp_area_3_text "Trabalho com populações em situação de risco social, promovendo autoestima, regulação emocional e vínculos seguros por meio da experiência corporal relacional."

# PRP Benefícios
wp theme mod set iibpr_prp_benefit_1_title "Valorização das Potencialidades"
wp theme mod set iibpr_prp_benefit_1_text "A intervenção psicomotora parte do que a pessoa PODE fazer, desenvolvendo competências e ampliando as possibilidades de expressão e comunicação."
wp theme mod set iibpr_prp_benefit_2_title "Autoconhecimento"
wp theme mod set iibpr_prp_benefit_2_text "Através da vivência corporal e do jogo relacional, o indivíduo descobre aspectos de si mesmo que estavam ocultos, promovendo maior consciência de si e de seus padrões emocionais."
wp theme mod set iibpr_prp_benefit_3_title "Progresso Relacional"
wp theme mod set iibpr_prp_benefit_3_text "As sessões criam espaços seguros onde é possível experimentar novas formas de se relacionar, superando bloqueios e desenvolvendo vínculos mais saudáveis."
wp theme mod set iibpr_prp_benefit_4_title "Vivência Corporal Integradora"
wp theme mod set iibpr_prp_benefit_4_text "O corpo é o instrumento central da intervenção. A experiência de movimento libera tensões, integra emoções e conecta a pessoa à sua história e ao presente."

# PRP Conceito
wp theme mod set iibpr_prp_conceito_text_1 "A Psicomotricidade Relacional Psicodinâmica (PRP) é uma abordagem terapêutica e educacional que compreende o ser humano de forma integral, unindo corpo, emoção e relação."
wp theme mod set iibpr_prp_conceito_text_2 "Desenvolvida a partir dos trabalhos do Prof. Dr. Mauro Vecchiato no Instituto Italiano di Psicologia della Relazione, a PRP chegou ao Brasil através do IIBPR, que a adapta ao contexto cultural e social brasileiro."
wp theme mod set iibpr_prp_conceito_text_3 "Através do jogo espontâneo e da relação terapêutica, a PRP cria condições para que cada pessoa possa se expressar, se descobrir e crescer de forma autêntica e integrada."

# Sobre — O que fazemos
wp theme mod set iibpr_sobre_wwd_text_1 "Oferecemos formações especializadas em Psicomotricidade Relacional Psicodinâmica para educadores, profissionais de saúde e estudantes que desejam ampliar sua prática com uma abordagem corporal e relacional."
wp theme mod set iibpr_sobre_wwd_text_2 "Realizamos atendimento psicomotor individual e em grupo para crianças, adolescentes, adultos e idosos, com foco no desenvolvimento integral e na promoção da saúde mental e corporal."
wp theme mod set iibpr_sobre_wwd_text_3 "Produzimos pesquisa científica e promovemos eventos nacionais e internacionais que conectam profissionais e impulsionam o avanço da Psicomotricidade no Brasil."

echo "      → Theme mods configurados"

# ─── 9. Criar Menu de Navegação ───
echo "[9/9] Criando menu de navegação..."

# Deletar menu existente se houver
wp menu delete "Menu Principal" 2>/dev/null || true

# Criar menu
wp menu create "Menu Principal"

# Buscar IDs das páginas por slug
add_menu_page() {
  local slug="$1"
  local title="$2"
  local position="$3"
  local page_id
  page_id=$(wp post list --name="$slug" --post_type=page --post_status=publish --field=ID 2>/dev/null | head -1)
  if [ -n "$page_id" ]; then
    wp menu item add-post "Menu Principal" "$page_id" --title="$title" --position="$position" 2>/dev/null
    echo "      → $title (ID $page_id)"
  else
    echo "      AVISO: Página '$slug' não encontrada — item '$title' não adicionado"
  fi
}

add_menu_page "cursos" "Cursos" 1
add_menu_page "eventos" "Eventos" 2
add_menu_page "psicomotricidade" "Psicomotricidade" 3
add_menu_page "pesquisa" "Pesquisa" 4
add_menu_page "blog" "Blog" 5
add_menu_page "sobre" "Sobre Nós" 6
add_menu_page "contato" "Contato" 7

# Associar menu ao location
wp menu location assign "Menu Principal" primary 2>/dev/null
echo "      → Menu associado ao location 'primary'"

# ─── Flush rewrite rules ───
wp rewrite flush 2>/dev/null
echo ""
echo "╔══════════════════════════════════════╗"
echo "║    ✓ IIBPR instalado com sucesso!    ║"
echo "╚══════════════════════════════════════╝"
echo ""
echo "Acesse: $TARGET_URL"
echo "Admin:  $TARGET_URL/wp-admin"
echo ""
echo "Próximos passos manuais:"
echo "  1. Vá em Aparência → Personalizar para ajustar logo e imagens do hero"
echo "  2. Confira as imagens destacadas dos cursos e eventos"
echo "  3. Configure o formulário de contato (Contact Form 7)"
echo ""
SETUP_SCRIPT

chmod +x "$BUILD_DIR/setup.sh"
echo "      → setup.sh gerado"

# ─────────────────────────────────────────────
# 5. GERAR README.txt
# ─────────────────────────────────────────────
echo "[5/6] Gerando README.txt..."

cat > "$BUILD_DIR/README.txt" << 'README'
===============================================================
 IIBPR — Pacote de Instalação Completa
 Instituto Internacional Brasileiro de Psicomotricidade Relacional
===============================================================

CONTEÚDO DESTE PACOTE:
  iibpr-wp-theme.zip   → Tema WordPress para instalar
  iibpr-*.xml          → Conteúdo exportado (páginas, cursos, eventos, etc.)
  uploads/             → Imagens e mídia do site
  setup.sh             → Script de instalação automática
  README.txt           → Este arquivo

PRÉ-REQUISITOS:
  - WordPress instalado e funcionando (versão 6.0+)
  - WP-CLI instalado (https://wp-cli.org)
  - Acesso SSH ao servidor (para rodar o script)
  - PHP 8.0+

INSTALAÇÃO AUTOMÁTICA (recomendado):
  1. Descompacte este arquivo no servidor
  2. Navegue até a raiz do WordPress (onde está wp-config.php)
  3. Execute:
     bash /caminho/para/iibpr-completo/setup.sh https://seudominio.com.br

INSTALAÇÃO MANUAL:
  1. Instale o tema: WP Admin → Aparência → Temas → Adicionar → Upload
     (arquivo: iibpr-wp-theme.zip)
  2. Ative o tema
  3. Copie a pasta uploads/ para wp-content/uploads/
  4. Instale o plugin "WordPress Importer"
  5. Importe os arquivos XML: Ferramentas → Importar → WordPress
     (importe todos os arquivos iibpr-*.xml)
  6. Vá em Configurações → Leitura:
     - "Uma página estática" → Página inicial: front-page
     - Página de posts: Blog / Notícias
  7. Vá em Configurações → Links permanentes → Nome do post
  8. Configure o menu: Aparência → Menus

PÁGINAS DO SITE:
  - Homepage (front-page)
  - Cursos
  - Eventos
  - Psicomotricidade
  - Pesquisa
  - Blog / Notícias
  - Sobre Nós
  - Contato
  - Área do Aluno

PLUGINS NECESSÁRIOS:
  - Contact Form 7 (instalado automaticamente pelo setup.sh)
  - WordPress Importer (instalado automaticamente pelo setup.sh)

SUPORTE:
  Em caso de dúvidas, entre em contato com o desenvolvedor.
===============================================================
README

echo "      → README.txt gerado"

# ─────────────────────────────────────────────
# 6. EMPACOTAR TUDO
# ─────────────────────────────────────────────
echo "[6/6] Criando zip final..."
rm -f "$OUTPUT"
cd /tmp
zip -rq "$OUTPUT" iibpr-completo/
SIZE=$(du -sh "$OUTPUT" | cut -f1)
echo "      → $OUTPUT ($SIZE)"

# Limpeza
rm -rf "$BUILD_DIR"

echo ""
echo "╔══════════════════════════════════════╗"
echo "║    ✓ Pacote gerado com sucesso!      ║"
echo "╚══════════════════════════════════════╝"
echo ""
echo "Arquivo: $OUTPUT"
echo "Tamanho: $SIZE"
echo ""
echo "Para instalar num WP limpo:"
echo "  1. Copie o zip para o servidor"
echo "  2. Descompacte: unzip iibpr-completo.zip"
echo "  3. Execute: bash iibpr-completo/setup.sh https://seudominio.com.br"
