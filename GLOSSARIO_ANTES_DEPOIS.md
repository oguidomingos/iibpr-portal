# 🔄 Glossário — Antes × Depois

**Referência rápida mostrando onde cada conteúdo foi para**

---

## HOME

| Antes | Depois | Localização |
|-------|--------|------------|
| Hero Slider 1 | Slide 1 | `template-parts/sections/hero.php` |
| Hero Slider 2 | Slide 2 | `template-parts/sections/hero.php` |
| "Alcance Saúde" | Benefits Section | `front-page.php` (inline) |
| Cursos listados | Featured Courses CPT | `template-parts/sections/featured-courses.php` |
| Eventos listados | Events CPT | `template-parts/sections/events.php` |
| Depoimentos | Testimonials CPT | `template-parts/sections/testimonials.php` |
| Contato | Footer | `template-parts/footer.php` |

---

## CURSOS (services.html)

| Antes | Depois | Localização |
|-------|--------|------------|
| Card Módulo III | CPT Post | `/cursos/modulo-iii-sensibilizacao/` |
| Card Módulo I | CPT Post | `/cursos/modulo-i/` |
| Card Módulo II | CPT Post | `/cursos/modulo-ii/` |
| Card Módulo IV | CPT Post | `/cursos/modulo-iv/` |
| Card Módulo V | CPT Post | `/cursos/modulo-v/` |
| Card Módulo VIII | CPT Post | `/cursos/modulo-viii/` |
| Card Grafomotricidade | CPT Post | `/cursos/grafomotricidade/` |
| Card Especialização | CPT Post | `/cursos/especializacao-iesb/` |
| Card Seminários | CPT Post | `/cursos/seminarios/` |
| Card Workshops | CPT Post | `/cursos/workshops/` |
| Descrição detalhada | Post Content | CPT Editor |
| Benefícios | Post Meta | Meta Box `_iibpr_course_benefits` |
| Para quem é | Post Meta | Meta Box `_iibpr_course_target` |
| Horas | Post Meta | Meta Box `_iibpr_course_hours` |
| Preço | Post Meta | Meta Box `_iibpr_course_price` |
| Imagem card | Featured Image | WordPress Thumbnail |

---

## EVENTOS (eventos.html)

| Antes | Depois | Localização |
|-------|--------|------------|
| Evento Internacional | CPT Post | `/eventos/evento-internacional/` |
| Palestra Mauro | CPT Post | `/eventos/palestra-jogo-psicomotor/` |
| Curso Psicomotricidade | CPT Post | `/eventos/psicomotricidade-jogo/` |
| Congresso Brasileiro | CPT Post | `/eventos/congresso-brasileiro/` |
| Workshop 21 de Julho | CPT Post | `/eventos/workshop-21-julho/` |
| Workshop 25 de Julho | CPT Post | `/eventos/workshop-25-julho/` |
| Seminários | CPT Post | `/eventos/seminarios/` |
| Data evento | Post Meta | Meta Box `_iibpr_event_date_start` |
| Localização | Post Meta | Meta Box `_iibpr_event_location` |
| Tipo evento | Taxonomy | Taxonomy `tipo_evento` |
| Modalidade | Taxonomy | Taxonomy `modalidade` |
| Bio Mauro (em evento) | Post Content | Event Post Editor |
| Imagem evento | Featured Image | WordPress Thumbnail |

---

## SOBRE (about-us.html)

| Antes | Depois | Localização |
|-------|--------|------------|
| Hero Banner | Hero Section | `page-sobre.php` |
| "Quem somos" | History Section | `page-sobre.php` |
| Descrição IIBPR | Content | WordPress Editor |
| Missão | MVV Card 1 | `Customizer > Sobre - MVV > Missão` |
| Visão | MVV Card 2 | `Customizer > Sobre - MVV > Visão` |
| Valores | Values List | `Customizer > Sobre - MVV > Valores` |
| Foto história | Section Image | `Customizer > Sobre - História > Imagem` |
| Augusto (fundador) | Founder Card 1 | `page-sobre.php > Fundadores` |
| Fabiane (fundador) | Founder Card 2 | `page-sobre.php > Fundadores` |
| Mauro (fundador) | Founder Card 3 | `page-sobre.php > Fundadores` |
| Bio Augusto | Founder Content | `Customizer > Sobre - Fundadores > Bio Augusto` |
| Bio Fabiane | Founder Content | `Customizer > Sobre - Fundadores > Bio Fabiane` |
| Bio Mauro | Founder Content | `Customizer > Sobre - Fundadores > Bio Mauro` |
| O que fazemos | Section Grid | `page-sobre.php > O Que Fazemos` |
| 4 imagens grid | Grid Images | `Customizer > Sobre - O Que Fazemos > Imagens` |
| Stats (120+, 35+, 50+) | Stats Section | `page-sobre.php > Stats` |
| Contato | Footer | `template-parts/footer.php` |

---

## PÁGINAS NOVAS

| Página | Localização | Conteúdo |
|--------|------------|----------|
| Psicomotricidade | `page-psicomotricidade.php` | O que é PRP, 3 pilares, Mauro |
| Pesquisa | `page-pesquisa.php` | Stats, blog posts pesquisa |
| Contato | `page-contato.php` | Formulário, emails, WhatsApp |
| Aluno | `page-aluno.php` | Área restrita (expansível) |

---

## IMAGENS

| Antes | Depois | Arquivo |
|-------|--------|---------|
| iibpr-logo.svg | Logo | `/images/IIBPR-rounded.svg` |
| pos-hero.jpeg | Hero 1 | `mauro-palestra2.png` |
| [5 banners] | Hero carousel | `/images/[various].jpg` |
| Fotos módulos | Course thumbnails | CPT Featured Image |
| Fotos eventos | Event thumbnails | CPT Featured Image |
| augusto2.jpg | Fundador 1 | `/images/augusto2.jpg` |
| fabiane2.png | Fundador 2 | `/images/fabiane2.png` |
| mauro-*.png | Fundador 3 | `/images/mauro-quadrado.jpg` |
| livro-mauro.png | Livro | `/images/livro-mauro.png` |
| [ação fotos] | Grid 2×2 | `/images/acao-*.jpg` |
| [ícones] | Benefits icons | `template-parts/sections/benefits.php` (SVG inline) |
| [logos] | Partners | `/images/[partner-logos]` |

---

## CUSTOMIZER

| Setting | Campo | Local |
|---------|-------|-------|
| Logo | `iibpr_logo` | Identidade Visual |
| Cor Primária | `iibpr_color_primary` | Identidade Visual |
| Cor Secundária | `iibpr_color_secondary` | Identidade Visual |
| Hero Slide 1-5 Title | `iibpr_hero_slide_{1-5}_title` | Hero |
| Hero Slide 1-5 Image | `iibpr_hero_slide_{1-5}_image` | Hero |
| Hero Autoplay | `iibpr_hero_autoplay` | Hero |
| Página Cursos Hero Bg | `iibpr_cursos_hero_bg` | Cursos |
| Página Eventos Hero Bg | `iibpr_eventos_hero_bg` | Eventos |
| Página Sobre Hero Bg | `iibpr_sobre_hero_bg` | Sobre |
| MVV Missão | `iibpr_sobre_mvv_1_text` | Sobre - MVV |
| MVV Visão | `iibpr_sobre_mvv_2_text` | Sobre - MVV |
| MVV Valores | `iibpr_sobre_mvv_3_text` | Sobre - MVV |
| História Texto 1 | `iibpr_sobre_hist_text_1` | Sobre - História |
| História Texto 2 | `iibpr_sobre_hist_text_2` | Sobre - História |
| Fundador Nome | `iibpr_founder_{1-3}_name` | Sobre - Fundadores |
| Fundador Bio | `iibpr_founder_{1-3}_bio_long` | Sobre - Fundadores |
| Stats Number | `iibpr_stats_{articles/books/congresses}` | Pesquisa |

---

## TAXONOMIAS & META

### Cursos (iibpr_curso)
| Meta Field | Chave | Tipo |
|-----------|-------|------|
| Horas | `_iibpr_course_hours` | Text |
| Preço | `_iibpr_course_price` | Text |
| CTA URL | `_iibpr_course_cta_url` | URL |
| Nível | - | Taxonomy |
| Modalidade | - | Taxonomy |
| Área | - | Taxonomy |

### Eventos (iibpr_evento)
| Meta Field | Chave | Tipo |
|-----------|-------|------|
| Data Início | `_iibpr_event_date_start` | Date |
| Data Fim | `_iibpr_event_date_end` | Date |
| Local | `_iibpr_event_location` | Text |
| Modalidade | `_iibpr_event_modality` | Text |
| Tipo | - | Taxonomy |
| CTA URL | `_iibpr_event_cta_url` | URL |

---

## PÁGINAS

| Título | Template | URL |
|--------|----------|-----|
| Home | `front-page.php` | `/` |
| Cursos | `page-cursos.php` | `/cursos/` |
| Eventos | `page-eventos.php` | `/eventos/` |
| Sobre | `page-sobre.php` | `/sobre/` |
| Psicomotricidade | `page-psicomotricidade.php` | `/psicomotricidade/` |
| Pesquisa | `page-pesquisa.php` | `/pesquisa/` |
| Contato | `page-contato.php` | `/contato/` |
| Aluno | `page-aluno.php` | `/aluno/` |

---

## TEMPLATE PARTS

| Arquivo | Uso | Localização |
|---------|-----|-----------|
| `hero.php` | Hero carousel | Home, todas as páginas |
| `featured-courses.php` | Cursos destacados | Home |
| `about-pillars.php` | Os 3 pilares | Home |
| `benefits.php` | 4 benefícios | Home |
| `interest-cards.php` | Para quem é | Home |
| `action-gallery.php` | Galeria ações | Home, Sobre |
| `testimonials.php` | Depoimentos | Home |
| `cta.php` | Call-to-action | Várias páginas |
| `course-card.php` | Card curso | Catálogo cursos |
| `event-card.php` | Card evento | Catálogo eventos |
| `course-cover.php` | Capa curso | Página individual curso |

---

## RESUMO DE MUDANÇAS

### Estrutura

```
ANTES:  HTML estático
├─ index.html (home)
├─ services.html (cursos)
├─ eventos.html (eventos)
├─ about-us.html (sobre)
└─ /images/ (48)

DEPOIS: WordPress CMS
├─ front-page.php (home)
├─ page-*.php (8 páginas)
├─ /cursos/ (10+ posts)
├─ /eventos/ (10+ posts)
├─ Customizer (40+ settings)
└─ /images/ (120+)
```

### Edição

```
ANTES:  Modificar HTML
DEPOIS: WordPress Admin Dashboard
```

### Escalabilidade

```
ANTES:  Limita a 4 páginas, listagens estáticas
DEPOIS: Ilimitadas páginas, CPTs dinâmicos
```

### SEO

```
ANTES:  Não há SEO individual por item
DEPOIS: SEO completo por página/post
```

---

## 📍 COMO LOCALIZAR

### Para encontrar um conteúdo específico:

**1. É texto?**
- Procure no Customizer (settings globais)
- Ou no CPT/página específica (WordPress Editor)

**2. É imagem?**
- Procure em `/theme/images/`
- Ou na Featured Image do CPT

**3. É seção?**
- Procure no template correspondente em `template-parts/sections/`

**4. É meta field?**
- Procure na Meta Box do CPT
- Chave começa com `_iibpr_`

---

## 🎯 CHECKLIST RÁPIDO

- [ ] Todo conteúdo textual foi portado ✅
- [ ] Todas as imagens foram incorporadas ✅
- [ ] Cursos agora são CPT individual ✅
- [ ] Eventos agora são CPT individual ✅
- [ ] Customizer tem 40+ settings ✅
- [ ] Pages são customizáveis ✅
- [ ] Footer tem contato ✅
- [ ] Páginas internas estão prontas ✅

---

**Versão:** 1.0
**Data:** 2026-05-12
**Status:** ✅ Portagem Completa
