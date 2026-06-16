# IIBPR — Resumo Completo do Projeto

**Tema WordPress:** Instituto Italo Brasileiro de Psicomotricidade Relacional
**Repo:** `iibpr-wp-theme/theme/`
**Atualizado em:** 15 de Maio de 2026

---

## Timeline de Desenvolvimento

| Data | Commit | O Que Foi Feito |
|------|--------|-----------------|
| 12/05 | `d1aff47` | Tema IIBPR v2.1 — estrutura base |
| 12/05 | `721bc01` | Move PHP para `theme/` subdirectory |
| 12/05 | `64b1451` | Importação do site original |
| 12/05 | `6a6ec14` | Fix hero title + benefits fallback |
| 12/05 | `1571625` | Páginas passam de hardcoded para Customizer-driven |
| 12/05 | `5d32fb5` | .editorconfig, .npmrc, build scripts |
| 13/05 | `b29ce5c` | Implementação completa: 8 cursos, 6 eventos, 65 imagens |
| 13/05 | `6f872d1` | Redesign visual completo (templates SVG da marca) |
| 13/05 | `23ce7b1` | Correções blog, conteúdo real, páginas expandidas |
| 15/05 | *pendente* | **Customizer Visual: live preview + reorganização** |

---

## Estado Atual dos Arquivos (15/05 — Não Commitado)

### Arquivos Novos
| Arquivo | Status | Descrição |
|---------|--------|-----------|
| `js/customize-preview.js` | **NOVO** | ~210 linhas — bindings `postMessage` para live preview no Customizer |

### Arquivos Modificados (Customizer Visual)
| Arquivo | Mudança | Status |
|---------|---------|--------|
| `inc/customizer.php` | Reescrito: painéis por página + `postMessage` + `selective_refresh` | OK |
| `functions.php` | Adicionado enqueue do `customize-preview.js` | OK |
| `template-parts/sections/hero.php` | `data-slide`, `.hero-slide-*`, `.hero-cta-*` | OK |
| `template-parts/sections/about-pillars.php` | `.about-label`, `.about-title`, `.about-text`, `.pillar-N-*` | OK |
| `template-parts/sections/cta.php` | `.cta-title`, `.cta-subtitle`, `.cta-btn-*` | OK |
| `template-parts/sections/research-stats.php` | `.stat-articles`, `.stat-books`, `.stat-congresses` | OK |
| `template-parts/sections/founders.php` | `id="fundadores"` | OK |
| `template-parts/sections/events.php` | `id="eventos-home"` | OK |
| `template-parts/sections/featured-courses.php` | `id="cursos-destaque"` | OK |
| `template-parts/sections/partners.php` | `id="parceiros"` | OK |
| `footer.php` | `.footer-tagline`, `.footer-copyright` | OK |
| `page-sobre.php` | 7 section IDs + classes CSS texto | OK |
| `page-psicomotricidade.php` | 8 section IDs + classes CSS texto | OK |
| `page-eventos.php` | 4 section IDs + classes CSS texto | OK |
| `page-cursos.php` | `id="cursos-hero"` + `.page-hero-*` | OK |
| `page-pesquisa.php` | `id="pesquisa-hero"` + `.page-hero-*` | OK |
| `page-blog.php` | `id="blog-hero"` + `.page-hero-*` | OK |
| `page-contato.php` | `id="contato-hero"`, `id="contato-form"`, `id="contato-info"` | OK |
| `page-aluno.php` | `id="aluno-hero"` + `.page-hero-*` | OK |

### Arquivos Modificados (Commits Anteriores — Já Commitados)
| Arquivo | Commit | Mudança |
|---------|--------|---------|
| `header.php` | 23ce7b1 | Fallback menu, WhatsApp link |
| `archive.php` | 23ce7b1 | Grid layout, paginação styled |
| `style.css` | 6f872d1 | Redesign Tailwind completo |
| `single-iibpr_curso.php` | 23ce7b1 | Template curso individual |
| `template-parts/content/*` | 23ce7b1 | content-single, content-excerpt, content-none |
| `template-parts/cards/*` | 6f872d1 | Course card, team card, testimonial card redesign |
| `images/*` | 6f872d1 | Interest cards fotos reais |

---

## O Que Cada Batch Faz (Customizer Visual)

### Batch 1 — Fundação
- [x] Reorganizar painéis do Customizer por página (não mais por feature)
- [x] Criar `js/customize-preview.js` com helpers `bindText()` e `bindCSSVar()`
- [x] Enqueue no `functions.php` via `customize_preview_init`

### Batch 2 — postMessage (Texto Instantâneo)
- [x] ~80 text settings com `transport => 'postMessage'`
- [x] Classes CSS de targeting nos templates da home
- [x] Bindings JS para home (hero, about, pillars, CTA, stats)

### Batch 3 — selective_refresh (Lápis Clicável)
- [x] IDs em todas seções (`#fundadores`, `#eventos-home`, `#cursos-destaque`, `#parceiros`)
- [x] 11 partials `selective_refresh` registrados no customizer
- [x] Partials: `home_hero`, `home_about_pillars`, `home_featured_courses`, `home_founders`, `home_events`, `home_testimonials`, `home_research_stats`, `home_cta`, `home_partners`, `header_logo`, `footer_social`

### Batch 4 — Páginas Internas
- [x] Página Sobre: 7 section IDs + classes (hero, historia, wwd, mvv, fundadores, stats, cta)
- [x] Página Psicomotricidade: 8 section IDs + classes (hero, conceito, pilares, areas, saude, estrutura, profissoes, cta)
- [x] Página Eventos: 4 section IDs + classes (hero, feat, upcoming, past)
- [x] Páginas simples: Cursos, Pesquisa, Blog, Contato, Aluno — hero IDs + classes
- [x] Footer: `.footer-tagline`, `.footer-copyright`

### Batch 5 — Polish
- [x] Cores live via CSS variables (`--iibpr-green`, `--iibpr-light`)
- [x] Logo via `selective_refresh` no `#masthead .site-branding`
- [ ] **PENDENTE:** Rebuild Tailwind CSS (`npm run development:tailwind:frontend`)

---

## Hierarquia de Painéis do Customizer (Nova)

```
Priority 20 — Global (Logo / Cores)
Priority 30 — Pagina Inicial
                ├── Hero Carrossel (Slides 1-5 + Autoplay)
                ├── Seção Sobre + Pilares
                ├── Cursos Destaque (1-5)
                ├── Eventos (1-3)
                ├── Depoimentos (1-4)
                ├── Pesquisa — Numeros
                └── CTA / Inscrição
Priority 35 — Pagina Sobre
                ├── Hero, Historia, O Que Fazemos
                ├── MVV, Fundadores, Stats, CTA
Priority 40 — Pagina Psicomotricidade
                ├── Hero, Conceito, Pilares, Areas
                ├── Saude, Estrutura, Profissoes, CTA
Priority 45 — Pagina Cursos (hero)
Priority 50 — Pagina Eventos (hero + feat + headings)
Priority 55 — Pagina Pesquisa (hero)
Priority 60 — Pagina Blog (hero)
Priority 65 — Pagina Contato (hero + form + info)
Priority 70 — Pagina Area do Aluno (hero + cards + LMS)
Priority 75 — Fundadores (compartilhado)
Priority 80 — Rodape
```

---

## Conteudo do Site

### CPTs (Custom Post Types)
| CPT | Quantidade | Status |
|-----|-----------|--------|
| Cursos (`iibpr_curso`) | 8 | OK — com fotos reais |
| Eventos (`iibpr_evento`) | 6 | OK — datas 2026-2027 |

### Conteudo via Customizer / Theme Mods
| Item | Quantidade | Status |
|------|-----------|--------|
| Hero Slides | 5 | OK — conteudo real |
| Fundadores | 2 (Fabiane + Augusto) | OK — bio + foto |
| Depoimentos | 4 (Leilah, Leo, Luciana, Juliana) | OK — reais |
| MVV | 3 (Missao, Visao, Valores) | OK — reais |
| Stats Sobre | 4 (420h, +25 anos, +500 prof, 3 paises) | OK |
| Pesquisadores | 2 (perfis detalhados) | OK |
| Parceiros | 3 (IIPR, ABP, IESB) | OK |

### Paginas Implementadas
| Pagina | Template | Estado |
|--------|----------|--------|
| Home | `front-page.php` | OK — hero carousel + 8 seções |
| Sobre | `page-sobre.php` | OK — hero, historia, wwd, mvv, fundadores, stats, cta |
| Psicomotricidade | `page-psicomotricidade.php` | OK — 8 seções completas |
| Cursos | `page-cursos.php` | OK — catalogo com busca e filtros |
| Eventos | `page-eventos.php` | OK — feat + upcoming + past |
| Pesquisa | `page-pesquisa.php` | OK — pesquisadores + stats + publicações |
| Blog | `page-blog.php` | OK — grid + paginação |
| Contato | `page-contato.php` | OK — form + info |
| Area do Aluno | `page-aluno.php` | OK — login + dashboard |

---

## Assets Visuais

### Prontos
- 120+ imagens em `theme/images/`
- Textura fundo: `textura-fundo.jpg` (42KB)
- Fotos fundadores: `fabiane2.png`, `augusto2.jpg`
- Fotos acoes: `acao-movimento-*`, `acao-grupo-*`, `acao-formacao-*`
- Interest cards: `para-quem-educadores.jpg`, `para-quem-saude.jpg`, `para-quem-estudantes.jpg`, `para-quem-pesquisadores.jpg`
- Logo SVG: `iibpr-logo-main.svg`

### Faltando
- Hero slides 1, 3, 4, 5 (1920x1080) — usando fallbacks
- Thumbnails de cursos/eventos individuais (usa fallback course-cover)

---

## Stack Tecnica

| Componente | Tecnologia |
|-----------|-----------|
| CMS | WordPress |
| CSS Framework | Tailwind CSS (compilado) |
| Fontes | Google Fonts (Inter + Playfair Display) |
| JS | Vanilla + jQuery (Customizer) |
| CPTs | Cursos, Eventos (inc/cpt.php) |
| Meta Boxes | inc/meta-boxes.php |
| Customizer | inc/customizer.php (~700 linhas) |
| Live Preview | js/customize-preview.js (~210 linhas) |

---

## Proximos Passos

1. **Rebuild Tailwind CSS** — `cd iibpr-wp-theme && npm run development:tailwind:frontend`
2. **Testar Customizer** — Abrir `/wp-admin/customize.php` e verificar:
   - Paineis organizados por pagina
   - Lapis azul clicavel nas seções
   - Texto atualizando em tempo real (sem reload)
   - Cores mudando instantaneamente
3. **Commit** — Commitar as mudancas do Customizer Visual
4. **Assets faltando** — Criar/coletar hero slides e thumbnails
5. **Testes cross-browser** — Mobile (375px), Tablet (768px), Desktop (1920px)
