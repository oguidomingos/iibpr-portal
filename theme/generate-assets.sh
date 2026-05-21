#!/bin/bash
# =============================================================================
# IIBPR Premium Asset Generator v4 — PHOTO-BASED, NO BAKED TEXT
# Every thumbnail uses a real photo as base + brand overlays.
# All text is rendered as HTML overlay via WordPress templates.
# =============================================================================

set -e

THEME_DIR="$(cd "$(dirname "$0")" && pwd)"
PHOTOS="$HOME/Downloads/fotos selecionadas"
TEXTURES="$HOME/Downloads/fundos-texturas"
IMAGES="$THEME_DIR/images"
TMP="$THEME_DIR/.asset-tmp"

# Colors
GREEN="#6CB350"
GREEN_DARK="#4A8A35"
CHARCOAL="#404856"
WHITE="#FFFFFF"

mkdir -p "$TMP"

echo "=== IIBPR Asset Generator v4 (photo-based, no text) ==="

# --- Helper: overlay texture preserving its transparency ---
overlay_texture() {
  local tex="$1" base="$2" opacity="$3" out="$4"
  local bw=$(magick identify -format "%w" "$base")
  local bh=$(magick identify -format "%h" "$base")
  magick "$tex" -resize "${bw}x${bh}!" -channel A -evaluate Multiply "$(echo "scale=2; $opacity/100" | bc)" +channel "$TMP/_tex_overlay.png"
  magick composite "$TMP/_tex_overlay.png" "$base" "$out"
}

# --- Helper: overlay decorative line preserving its transparency ---
overlay_line() {
  local line="$1" base="$2" width="$3" opacity="$4" gravity="$5" geom="$6" out="$7"
  magick "$line" -resize "${width}x" -channel A -evaluate Multiply "$(echo "scale=2; $opacity/100" | bc)" +channel "$TMP/_line_overlay.png"
  magick composite -gravity "$gravity" -geometry "$geom" "$TMP/_line_overlay.png" "$base" "$out"
}

# --- Helper: photo base with crop ---
# Usage: photo_base <source> <width> <height> <output>
photo_base() {
  local src="$1" w="$2" h="$3" out="$4"
  magick "$src" -auto-orient -resize "${w}x${h}^" -gravity Center -crop "${w}x${h}+0+0" +repage "$out"
}

# --- Helper: gradient overlay bottom-to-top ---
# Usage: gradient_bottom <width> <height> <color_bottom_rgba> <height_pct> <output>
gradient_bottom() {
  local w="$1" h="$2" color="$3" hpct="$4" out="$5"
  local gh=$(echo "$h * $hpct / 100" | bc)
  local ph=$(echo "$h - $gh" | bc)
  magick -size "${w}x${gh}" gradient:"rgba(0,0,0,0)"-"$color" "$TMP/_gb_grad.png"
  magick -size "${w}x${ph}" xc:"rgba(0,0,0,0)" "$TMP/_gb_pad.png"
  magick "$TMP/_gb_pad.png" "$TMP/_gb_grad.png" -append "$out"
}

# =============================================================================
# Pre-process source photos (fix orientation)
# =============================================================================
echo "--- Pre-processing ---"
magick "$PHOTOS/_B2B2876.JPG" -auto-orient "$TMP/src-couple.png"
magick "$PHOTOS/_B2B2850.JPG" -auto-orient "$TMP/src-fabiane.png"
magick "$PHOTOS/_B2B2819.JPG" -auto-orient "$TMP/src-augusto.png"
# PNG cutouts: stored landscape but content is portrait — rotate
magick "$PHOTOS/Fundo de _B2B2850 Removido.png" -rotate -90 "$TMP/src-fabiane-cut.png"
magick "$PHOTOS/Fundo de _B2B2819 Removido.png" -rotate -90 "$TMP/src-augusto-cut.png"
magick "$PHOTOS/Fundo de _B2B2876 Removido.png" -rotate -90 "$TMP/src-couple-cut.png"
echo "  OK"

# =============================================================================
# GRUPO 1 — Hero Slides (1920x1080)
# =============================================================================
echo ""
echo "--- GRUPO 1: Hero Slides ---"

# --- Hero 1: Casal + gradiente ---
echo "[1/20] hero-slide-1.jpg"
magick -size 1920x1080 gradient:"$GREEN"-"$CHARCOAL" "$TMP/h1-bg.png"
overlay_texture "$TEXTURES/2 1.png" "$TMP/h1-bg.png" 12 "$TMP/h1-tex.png"
magick "$TMP/src-couple.png" -resize 1400x1080^ -gravity Center -crop 1152x1080+0+0 +repage "$TMP/h1-photo.png"
magick -size 1152x1080 gradient:"rgba(64,72,86,0.75)"-"rgba(64,72,86,0)" -rotate 90 "$TMP/h1-fade.png"
magick composite "$TMP/h1-fade.png" "$TMP/h1-photo.png" "$TMP/h1-photo-f.png"
magick composite -gravity East "$TMP/h1-photo-f.png" "$TMP/h1-tex.png" "$TMP/h1-comp.png"
overlay_line "$TEXTURES/Linha Verde 1.png" "$TMP/h1-comp.png" 350 50 SouthWest +80+60 "$TMP/h1-final.png"
magick "$TMP/h1-final.png" -quality 85 -strip "$IMAGES/hero-slide-1.jpg"
echo "  ✓"

# --- Hero 2: Textura marca + overlay escuro ---
echo "[2/20] hero-slide-2.jpg"
magick "$TEXTURES/2 1.png" -resize 1920x1080! "$TMP/h2-tex.png"
magick -size 1920x1080 xc:"$CHARCOAL" "$TMP/h2-dark.png"
magick composite -blend 20 "$TMP/h2-tex.png" "$TMP/h2-dark.png" "$TMP/h2-blend.png"
magick -size 1920x1080 gradient:"rgba(108,179,80,0.15)"-"rgba(0,0,0,0)" -rotate 90 "$TMP/h2-grad.png"
magick composite "$TMP/h2-grad.png" "$TMP/h2-blend.png" "$TMP/h2-comp.png"
overlay_line "$TEXTURES/Linha Branca 1.png" "$TMP/h2-comp.png" 450 30 SouthEast +60+50 "$TMP/h2-final.png"
magick "$TMP/h2-final.png" -quality 85 -strip "$IMAGES/hero-slide-2.jpg"
echo "  ✓"

# --- Hero 3: Fabiane branded ---
echo "[3/20] hero-slide-3.jpg"
magick -size 1920x1080 xc:"$GREEN" "$TMP/h3-bg.png"
overlay_texture "$TEXTURES/4 1.png" "$TMP/h3-bg.png" 8 "$TMP/h3-tex.png"
magick -size 960x1080 gradient:"rgba(64,72,86,0.85)"-"rgba(64,72,86,0)" "$TMP/h3-left.png"
magick -size 960x1080 xc:"rgba(0,0,0,0)" "$TMP/h3-right.png"
magick "$TMP/h3-left.png" "$TMP/h3-right.png" +append "$TMP/h3-grad.png"
magick composite "$TMP/h3-grad.png" "$TMP/h3-tex.png" "$TMP/h3-graded.png"
magick "$TMP/src-fabiane-cut.png" -resize x1080 "$TMP/h3-fab.png"
magick composite -gravity SouthEast -geometry +50+0 "$TMP/h3-fab.png" "$TMP/h3-graded.png" "$TMP/h3-final.png"
magick "$TMP/h3-final.png" -quality 85 -strip "$IMAGES/hero-slide-3.jpg"
echo "  ✓"

# --- Hero 4: Augusto branded ---
echo "[4/20] hero-slide-4.jpg"
magick -size 1920x1080 xc:"$CHARCOAL" "$TMP/h4-bg.png"
overlay_texture "$TEXTURES/3 6.png" "$TMP/h4-bg.png" 10 "$TMP/h4-tex.png"
magick -size 80x1080 xc:"$GREEN" "$TMP/h4-strip.png"
magick composite -gravity East "$TMP/h4-strip.png" "$TMP/h4-tex.png" "$TMP/h4-stripped.png"
overlay_line "$TEXTURES/Linha Verde 1.png" "$TMP/h4-stripped.png" 500 40 South +0+60 "$TMP/h4-lined.png"
magick "$TMP/src-augusto-cut.png" -resize x1080 "$TMP/h4-aug.png"
magick composite -gravity SouthEast -geometry +100+0 "$TMP/h4-aug.png" "$TMP/h4-lined.png" "$TMP/h4-final.png"
magick "$TMP/h4-final.png" -quality 85 -strip "$IMAGES/hero-slide-4.jpg"
echo "  ✓"

# --- Hero 5: Split diagonal ---
echo "[5/20] hero-slide-5.jpg"
magick -size 1920x1080 xc:"$GREEN" "$TMP/h5-green.png"
magick -size 1920x1080 xc:"$CHARCOAL" "$TMP/h5-char.png"
magick -size 1920x1080 xc:black -fill white -draw "polygon 800,0 1920,0 1920,1080 1120,1080" "$TMP/h5-mask.png"
magick composite -compose CopyOpacity "$TMP/h5-mask.png" "$TMP/h5-char.png" "$TMP/h5-char-m.png"
magick composite "$TMP/h5-char-m.png" "$TMP/h5-green.png" "$TMP/h5-split.png"
overlay_texture "$TEXTURES/4 1.png" "$TMP/h5-split.png" 6 "$TMP/h5-tex.png"
magick "$TMP/src-fabiane-cut.png" -resize x950 "$TMP/h5-fab.png"
magick composite -gravity SouthWest -geometry +100+0 "$TMP/h5-fab.png" "$TMP/h5-tex.png" "$TMP/h5-wf.png"
magick "$TMP/src-augusto-cut.png" -resize x950 "$TMP/h5-aug.png"
magick composite -gravity SouthEast -geometry +100+0 "$TMP/h5-aug.png" "$TMP/h5-wf.png" "$TMP/h5-final.png"
magick "$TMP/h5-final.png" -quality 85 -strip "$IMAGES/hero-slide-5.jpg"
echo "  ✓"

# =============================================================================
# GRUPO 2 — Course Thumbnails (600x400) — ALL PHOTO-BASED
# =============================================================================
echo ""
echo "--- GRUPO 2: Course Thumbnails (photo-based) ---"

# CT1: Formação em sala — green top gradient + charcoal overlay
echo "[6/20] curso-thumb-1.jpg"
photo_base "$IMAGES/acao-formacao-1.jpg" 600 400 "$TMP/ct1-photo.png"
magick -size 600x400 xc:"rgba(64,72,86,0.55)" "$TMP/ct1-ov.png"
magick composite "$TMP/ct1-ov.png" "$TMP/ct1-photo.png" "$TMP/ct1-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.50)" 55 "$TMP/ct1-grad.png"
magick composite "$TMP/ct1-grad.png" "$TMP/ct1-dark.png" "$TMP/ct1-comp.png"
overlay_texture "$TEXTURES/2 1.png" "$TMP/ct1-comp.png" 6 "$TMP/ct1-final.png"
magick "$TMP/ct1-final.png" -quality 85 -strip "$IMAGES/curso-thumb-1.jpg"
echo "  ✓"

# CT2: Formação estudo — charcoal heavy + green bottom glow
echo "[7/20] curso-thumb-2.jpg"
photo_base "$IMAGES/acao-formacao-2.jpg" 600 400 "$TMP/ct2-photo.png"
magick -size 600x400 xc:"rgba(64,72,86,0.75)" "$TMP/ct2-ov.png"
magick composite "$TMP/ct2-ov.png" "$TMP/ct2-photo.png" "$TMP/ct2-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.50)" 55 "$TMP/ct2-grad.png"
magick composite "$TMP/ct2-grad.png" "$TMP/ct2-dark.png" "$TMP/ct2-comp.png"
# Green bottom accent bar
magick -size 600x4 xc:"$GREEN" "$TMP/ct2-bar.png"
magick composite -gravity South "$TMP/ct2-bar.png" "$TMP/ct2-comp.png" "$TMP/ct2-barred.png"
overlay_texture "$TEXTURES/3 6.png" "$TMP/ct2-barred.png" 6 "$TMP/ct2-final.png"
magick "$TMP/ct2-final.png" -quality 85 -strip "$IMAGES/curso-thumb-2.jpg"
echo "  ✓"

# CT3: Formação prática — warm green duotone
echo "[8/20] curso-thumb-3.jpg"
photo_base "$IMAGES/acao-formacao-3.jpg" 600 400 "$TMP/ct3-photo.png"
magick -size 600x400 xc:"rgba(64,72,86,0.55)" "$TMP/ct3-ov.png"
magick composite "$TMP/ct3-ov.png" "$TMP/ct3-photo.png" "$TMP/ct3-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.45)" 60 "$TMP/ct3-grad.png"
magick composite "$TMP/ct3-grad.png" "$TMP/ct3-dark.png" "$TMP/ct3-comp.png"
overlay_line "$TEXTURES/Linha Verde 1.png" "$TMP/ct3-comp.png" 200 30 SouthWest +15+15 "$TMP/ct3-final.png"
magick "$TMP/ct3-final.png" -quality 85 -strip "$IMAGES/curso-thumb-3.jpg"
echo "  ✓"

# CT4: Grupo atividade — photo + charcoal overlay + green gradient bottom
echo "[9/20] curso-thumb-4.jpg"
photo_base "$IMAGES/acao-grupo-3.jpg" 600 400 "$TMP/ct4-photo.png"
magick -size 600x400 xc:"rgba(64,72,86,0.60)" "$TMP/ct4-ov.png"
magick composite "$TMP/ct4-ov.png" "$TMP/ct4-photo.png" "$TMP/ct4-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.55)" 50 "$TMP/ct4-grad.png"
magick composite "$TMP/ct4-grad.png" "$TMP/ct4-dark.png" "$TMP/ct4-comp.png"
overlay_texture "$TEXTURES/4 1.png" "$TMP/ct4-comp.png" 8 "$TMP/ct4-final.png"
magick "$TMP/ct4-final.png" -quality 85 -strip "$IMAGES/curso-thumb-4.jpg"
echo "  ✓"

# CT5: Movimento corpo — green duotone cinematic
echo "[10/20] curso-thumb-5.jpg"
photo_base "$IMAGES/acao-movimento-2.jpg" 600 400 "$TMP/ct5-photo.png"
magick -size 600x400 gradient:"rgba(108,179,80,0.60)"-"rgba(64,72,86,0.75)" "$TMP/ct5-ov.png"
magick composite "$TMP/ct5-ov.png" "$TMP/ct5-photo.png" "$TMP/ct5-comp.png"
overlay_texture "$TEXTURES/2 1.png" "$TMP/ct5-comp.png" 6 "$TMP/ct5-tex.png"
overlay_line "$TEXTURES/Linha Branca 1.png" "$TMP/ct5-tex.png" 140 18 SouthEast +12+12 "$TMP/ct5-final.png"
magick "$TMP/ct5-final.png" -quality 85 -strip "$IMAGES/curso-thumb-5.jpg"
echo "  ✓"

# CT6: Movimento alegre — charcoal + green bottom glow + green left bar
echo "[11/20] curso-thumb-6.jpg"
photo_base "$IMAGES/acao-movimento-5.jpg" 600 400 "$TMP/ct6-photo.png"
magick "$TMP/ct6-photo.png" -fill "rgba(64,72,86,0.65)" -colorize 65% "$TMP/ct6-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.45)" 40 "$TMP/ct6-grad.png"
magick composite "$TMP/ct6-grad.png" "$TMP/ct6-dark.png" "$TMP/ct6-graded.png"
magick -size 5x400 xc:"$GREEN" "$TMP/ct6-bar.png"
magick composite -gravity West "$TMP/ct6-bar.png" "$TMP/ct6-graded.png" "$TMP/ct6-barred.png"
overlay_texture "$TEXTURES/5 61.png" "$TMP/ct6-barred.png" 5 "$TMP/ct6-final.png"
magick "$TMP/ct6-final.png" -quality 85 -strip "$IMAGES/curso-thumb-6.jpg"
echo "  ✓"

# =============================================================================
# GRUPO 3 — Event Thumbnails (600x400) — ALL PHOTO-BASED
# =============================================================================
echo ""
echo "--- GRUPO 3: Event Thumbnails (photo-based) ---"

# ET1: Grande grupo — vibrant green overlay (seminário vibe)
echo "[12/20] evento-thumb-1.jpg"
photo_base "$IMAGES/acao-grupo-5.jpg" 600 400 "$TMP/et1-photo.png"
magick -size 600x400 xc:"rgba(108,179,80,0.65)" "$TMP/et1-ov.png"
magick composite "$TMP/et1-ov.png" "$TMP/et1-photo.png" "$TMP/et1-comp.png"
overlay_texture "$TEXTURES/2 1.png" "$TMP/et1-comp.png" 10 "$TMP/et1-tex.png"
overlay_line "$TEXTURES/Linha Branca 1.png" "$TMP/et1-tex.png" 180 20 NorthEast +12+12 "$TMP/et1-final.png"
magick "$TMP/et1-final.png" -quality 85 -strip "$IMAGES/evento-thumb-1.jpg"
echo "  ✓"

# ET2: Grupo interação — charcoal overlay + green bottom gradient
echo "[13/20] evento-thumb-2.jpg"
photo_base "$IMAGES/acao-grupo-6.jpg" 600 400 "$TMP/et2-photo.png"
magick -size 600x400 xc:"rgba(64,72,86,0.65)" "$TMP/et2-ov.png"
magick composite "$TMP/et2-ov.png" "$TMP/et2-photo.png" "$TMP/et2-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.40)" 50 "$TMP/et2-grad.png"
magick composite "$TMP/et2-grad.png" "$TMP/et2-dark.png" "$TMP/et2-comp.png"
overlay_texture "$TEXTURES/3 6.png" "$TMP/et2-comp.png" 8 "$TMP/et2-tex.png"
overlay_line "$TEXTURES/Linha Branca 1.png" "$TMP/et2-tex.png" 300 22 Center +0+20 "$TMP/et2-final.png"
magick "$TMP/et2-final.png" -quality 85 -strip "$IMAGES/evento-thumb-2.jpg"
echo "  ✓"

# ET3: Movimento dinâmico — green-to-charcoal cinematic
echo "[14/20] evento-thumb-3.jpg"
photo_base "$IMAGES/acao-movimento-6.jpg" 600 400 "$TMP/et3-photo.png"
magick -size 600x400 gradient:"rgba(64,72,86,0.55)"-"rgba(108,179,80,0.50)" -rotate 45 -gravity Center -crop 600x400+0+0 +repage "$TMP/et3-ov.png"
magick composite "$TMP/et3-ov.png" "$TMP/et3-photo.png" "$TMP/et3-comp.png"
overlay_texture "$TEXTURES/4 1.png" "$TMP/et3-comp.png" 6 "$TMP/et3-final.png"
magick "$TMP/et3-final.png" -quality 85 -strip "$IMAGES/evento-thumb-3.jpg"
echo "  ✓"

# ET4: Formação workshop — warm charcoal + green accent bottom
echo "[15/20] evento-thumb-4.jpg"
photo_base "$IMAGES/acao-formacao-4.jpg" 600 400 "$TMP/et4-photo.png"
magick -size 600x400 xc:"rgba(64,72,86,0.60)" "$TMP/et4-ov.png"
magick composite "$TMP/et4-ov.png" "$TMP/et4-photo.png" "$TMP/et4-dark.png"
gradient_bottom 600 400 "rgba(108,179,80,0.55)" 65 "$TMP/et4-grad.png"
magick composite "$TMP/et4-grad.png" "$TMP/et4-dark.png" "$TMP/et4-comp.png"
overlay_line "$TEXTURES/Linha Verde 1.png" "$TMP/et4-comp.png" 220 28 SouthWest +15+15 "$TMP/et4-final.png"
magick "$TMP/et4-final.png" -quality 85 -strip "$IMAGES/evento-thumb-4.jpg"
echo "  ✓"

# ET5: Grupo colaboração — split diagonal photo/green
echo "[16/20] evento-thumb-5.jpg"
photo_base "$IMAGES/acao-grupo-1.jpg" 600 400 "$TMP/et5-photo.png"
magick -size 600x400 xc:"rgba(108,179,80,0.70)" "$TMP/et5-ov.png"
magick composite "$TMP/et5-ov.png" "$TMP/et5-photo.png" "$TMP/et5-comp.png"
# Lighter strip on top for visual interest
magick -size 600x3 xc:"rgba(255,255,255,0.30)" "$TMP/et5-topline.png"
magick composite -gravity North "$TMP/et5-topline.png" "$TMP/et5-comp.png" "$TMP/et5-lined.png"
overlay_texture "$TEXTURES/2 1.png" "$TMP/et5-lined.png" 12 "$TMP/et5-final.png"
magick "$TMP/et5-final.png" -quality 85 -strip "$IMAGES/evento-thumb-5.jpg"
echo "  ✓"

# =============================================================================
# GRUPO 4 — Page Hero Backgrounds (1920x600) — PHOTO-BASED
# =============================================================================
echo ""
echo "--- GRUPO 4: Page Hero Backgrounds (photo-based) ---"

# --- Pesquisa hero: grupo ação + charcoal ---
echo "[17/20] pesquisa-hero-bg.jpg"
photo_base "$IMAGES/acao-grupo-6.jpg" 1920 600 "$TMP/ph-photo.png"
magick -size 1920x600 xc:"rgba(64,72,86,0.80)" "$TMP/ph-ov.png"
magick composite "$TMP/ph-ov.png" "$TMP/ph-photo.png" "$TMP/ph-dark.png"
magick -size 1920x600 gradient:"rgba(108,179,80,0.12)"-"rgba(0,0,0,0)" -rotate 90 "$TMP/ph-grad.png"
magick composite "$TMP/ph-grad.png" "$TMP/ph-dark.png" "$TMP/ph-graded.png"
overlay_line "$TEXTURES/Linha Verde 1.png" "$TMP/ph-graded.png" 300 25 SouthWest +60+30 "$TMP/ph-final.png"
magick "$TMP/ph-final.png" -quality 85 -strip "$IMAGES/pesquisa-hero-bg.jpg"
echo "  ✓"

# --- Eventos hero: grupo grande + green overlay ---
echo "[18/20] eventos-hero-bg.jpg"
photo_base "$IMAGES/acao-grupo-5.jpg" 1920 600 "$TMP/eh-photo.png"
magick -size 1920x600 xc:"rgba(108,179,80,0.70)" "$TMP/eh-ov.png"
magick composite "$TMP/eh-ov.png" "$TMP/eh-photo.png" "$TMP/eh-comp.png"
overlay_texture "$TEXTURES/4 1.png" "$TMP/eh-comp.png" 6 "$TMP/eh-final.png"
magick "$TMP/eh-final.png" -quality 85 -strip "$IMAGES/eventos-hero-bg.jpg"
echo "  ✓"

# --- Cursos hero: movimento + charcoal + green glow ---
echo "[19/20] cursos-hero-bg.jpg"
photo_base "$IMAGES/acao-movimento-1.jpg" 1920 600 "$TMP/ch-photo.png"
magick -size 1920x600 xc:"rgba(64,72,86,0.78)" "$TMP/ch-ov.png"
magick composite "$TMP/ch-ov.png" "$TMP/ch-photo.png" "$TMP/ch-comp.png"
magick -size 1920x600 gradient:"rgba(0,0,0,0)"-"rgba(108,179,80,0.25)" "$TMP/ch-grad.png"
magick composite "$TMP/ch-grad.png" "$TMP/ch-comp.png" "$TMP/ch-final.png"
magick "$TMP/ch-final.png" -quality 85 -strip "$IMAGES/cursos-hero-bg.jpg"
echo "  ✓"

# --- Blog hero: grupo comunidade + charcoal ---
echo "[20/20] blog-hero-bg.jpg"
photo_base "$IMAGES/acao-grupo-2.jpg" 1920 600 "$TMP/bh-photo.png"
magick -size 1920x600 xc:"rgba(64,72,86,0.82)" "$TMP/bh-ov.png"
magick composite "$TMP/bh-ov.png" "$TMP/bh-photo.png" "$TMP/bh-dark.png"
magick -size 1920x600 gradient:"rgba(108,179,80,0.08)"-"rgba(166,209,108,0.10)" -rotate 90 "$TMP/bh-grad.png"
magick composite "$TMP/bh-grad.png" "$TMP/bh-dark.png" "$TMP/bh-graded.png"
overlay_line "$TEXTURES/Linha Branca 1.png" "$TMP/bh-graded.png" 250 20 SouthEast +40+25 "$TMP/bh-final.png"
magick "$TMP/bh-final.png" -quality 85 -strip "$IMAGES/blog-hero-bg.jpg"
echo "  ✓"

# =============================================================================
# Cleanup & Report
# =============================================================================
echo ""
rm -rf "$TMP"
echo "=== COMPLETE ==="
echo ""
for f in hero-slide-{1..5}.jpg curso-thumb-{1..6}.jpg evento-thumb-{1..5}.jpg pesquisa-hero-bg.jpg eventos-hero-bg.jpg cursos-hero-bg.jpg blog-hero-bg.jpg; do
  if [ -f "$IMAGES/$f" ]; then
    SIZE=$(du -k "$IMAGES/$f" | cut -f1)
    DIM=$(magick identify -format "%wx%h" "$IMAGES/$f")
    echo "  ✓ $f — ${SIZE}KB — ${DIM}"
  else
    echo "  ✗ $f — MISSING"
  fi
done
