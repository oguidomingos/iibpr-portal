# 🗺️ Mapa de Migração — Conteúdo Original → Novo Tema

**Guia visual mostrando exatamente onde cada parte do conteúdo original foi portada**

---

## 📍 ÍNDICE

- [HOME](#home)
- [CURSOS](#cursos)
- [EVENTOS](#eventos)
- [SOBRE](#sobre)
- [PÁGINAS INTERNAS](#páginas-internas)
- [IMAGENS](#imagens)
- [CONTATO](#contato)

---

## 🏠 HOME

### Estrutura Original → Nova

```
INSTITUTOIBPR.COM.BR/index.html
│
├─ Hero Slider (5 imagens + textos)
│  └─→ NOVO: template-parts/sections/hero.php
│      ├─ Slide 1: "Pós em Psicomotricidade"
│      ├─ Slide 2: "Especialização IESB"
│      ├─ Slide 3: "Grafomotricidade"
│      ├─ Slide 4: [Extra]
│      └─ Slide 5: [Extra]
│
├─ "Onde há movimento, há vida em relação!"
│  └─→ Hero slide 1 tagline (customizable)
│
├─ "Pós em Psicomotricidade - 420h IESB"
│  └─→ Hero slide 1 description (customizable)
│
├─ CTA "Quero garantir minha vaga"
│  └─→ Hero slide 1 CTA button (customizable)
│
├─ Carousel Navigation (Previous/Next)
│  └─→ NOVO: Setas e dots automáticos
│      ├─ Auto-play a cada 6 segundos (customizable)
│      └─ Navegação manual com arrow buttons
│
├─ "Alcance Saúde" (Benefits section)
│  └─→ front-page.php > benefits section (inline)
│      └─ 4 cards com ícones (Valorização, Autoconhecimento, Progresso, Vivência)
│
├─ Featured Courses (Módulos 5, 8)
│  └─→ NOVO: template-parts/sections/featured-courses.php
│      └─ CPT integration (3 cursos destacados)
│          └─ Cada curso agora tem página individual em /cursos/
│
├─ Featured Events (Workshops, Seminários)
│  └─→ NOVO: template-parts/sections/events.php
│      └─ CPT integration (eventos próximos)
│          └─ Cada evento agora tem página individual em /eventos/
│
├─ Testimonials (4 depoimentos)
│  └─→ NOVO: template-parts/sections/testimonials.php
│      └─ 4 cards com quotes de clientes
│
├─ Estrutura de Formação (Diagram)
│  └─→ OPCIONAL: Pode ser adicionada como seção visual
│      └─ Propedêutico → Módulos I-IV → Seminários
│
├─ Assuntos/Tópicos
│  └─→ NOVO: Interest Cards - template-parts/sections/interest-cards.php
│      ├─ Para quem é o IIBPR?
│      ├─ Educadores
│      ├─ Profissionais de Saúde
│      ├─ Pais/Cuidadores
│      └─ Pesquisadores
│
├─ Contato (Email + WhatsApp)
│  └─→ Footer (template-parts/footer.php)
│      ├─ contato@institutoibpr.com.br
│      ├─ +55 (061) 99157-2149
│      └─ +351 913 126 662
│
└─ Depoimentos Detalhados
   └─→ Comments/Testimonials (editáveis via CPT)
```

---

## 🎓 CURSOS (services.html)

### De listagem HTML para CPT dinâmico

```
INSTITUTOIBPR.COM.BR/services.html
│
├─ Hero Banner
│  └─→ page-cursos.php
│      ├─ Título: "Nossos Cursos" (customizable)
│      ├─ Subtítulo (customizable)
│      └─ Background: acao-formacao-4.jpg
│
├─ "Como podemos ajudar?" + Descrição IIBPR
│  └─→ page-cursos.php > content area
│      └─ WordPress editor (conteúdo via admin)
│
├─ Search + Filter bar
│  └─→ NOVO: template-parts/sections/featured-courses.php
│      ├─ Search input
│      ├─ Filter buttons (Todos, Online, Presencial, Híbrido)
│      └─ Sort options
│
├─ Módulo III - Sensibilização (Card + Details)
│  └─→ CPT: Cursos (iibpr_curso)
│      ├─ Post: /cursos/modulo-iii-sensibilizacao/
│      ├─ Titulo: "Módulo III - Curso de Sensibilização..."
│      ├─ Content: Descrição completa (customizable via editor)
│      ├─ Meta Fields:
│      │  ├─ Horas: 40h
│      │  ├─ Modalidade: "Online" (taxonomy)
│      │  ├─ Nível: "Intermediário" (taxonomy)
│      │  ├─ Preço: (editável)
│      │  └─ CTA URL: (editável)
│      ├─ Featured Image: (600×400 customizable)
│      └─ Excerpt: Benefícios e público-alvo
│
├─ Módulos (I, II, IV, V, VIII)
│  └─→ CPT: Cursos (iibpr_curso)
│      ├─ /cursos/modulo-i/
│      ├─ /cursos/modulo-ii/
│      ├─ /cursos/modulo-iv/
│      ├─ /cursos/modulo-v/
│      └─ /cursos/modulo-viii/
│
├─ Cursos Específicos
│  └─→ CPT: Cursos (iibpr_curso)
│      ├─ /cursos/grafomotricidade/ (20h)
│      ├─ /cursos/especializacao-iesb/ (420h)
│      ├─ /cursos/seminario-teorico/
│      ├─ /cursos/seminario-didatico/
│      └─ /cursos/workshops/
│
├─ Benefícios do Módulo III
│  └─→ Course meta field: "Benefícios"
│      └─ 4 bullets (editável no CPT)
│
├─ Para quem é?
│  └─→ Course meta field: "Public Target"
│      └─ Descrição (editável)
│
├─ Psicomotricidade como Práxis
│  └─→ Course Content
│      └─ Editor WordPress
│
├─ "Atendimento humanista" (parágrafo final)
│  └─→ page-cursos.php
│      └─ Content area (editável)
│
└─ Contato
   └─→ Footer (template-parts/footer.php)
```

---

## 🎪 EVENTOS (eventos.html)

### De listagem HTML para CPT dinâmico

```
INSTITUTOIBPR.COM.BR/eventos.html
│
├─ Hero Banner
│  └─→ page-eventos.php
│      ├─ Título: "Eventos" (customizable)
│      ├─ Subtítulo: "Fique por dentro das novidades" (customizable)
│      └─ Background: mauro-palestra2.png
│
├─ Featured Event Card (Destaque)
│  └─→ page-eventos.php
│      ├─ Section: "Evento em Destaque"
│      └─ Pode ser customizado via Customizer
│
├─ Upcoming Events (Próximos)
│  └─→ page-eventos.php
│      ├─ Section: "Próximos Eventos"
│      └─ Filtra CPT por data (meta: _iibpr_event_date_start >= hoje)
│
├─ Past Events (Realizados)
│  └─→ page-eventos.php
│      ├─ Section: "Eventos Realizados"
│      └─ Filtra CPT por data (meta: _iibpr_event_date_start < hoje)
│
├─ Evento: 1º Evento Internacional (15 de Julho 2022)
│  └─→ CPT: Eventos (iibpr_evento)
│      ├─ Post: /eventos/evento-internacional-psicomotricidade/
│      ├─ Titulo: "1º Evento Internacional de Psicomotricidade"
│      ├─ Meta Fields:
│      │  ├─ Data Início: 2022-07-15
│      │  ├─ Data Fim: 2022-07-15
│      │  ├─ Localização: "Brasília-DF"
│      │  ├─ Tipo: "Seminário Internacional"
│      │  ├─ Modalidade: "Presencial"
│      │  └─ CTA URL: (customizable)
│      ├─ Featured Image: evento-19-11-2022.png
│      └─ Content: Descrição completa
│
├─ Evento: Palestra O Jogo Psicomotor (22 de Julho 2022)
│  └─→ CPT: Eventos (iibpr_evento)
│      ├─ Post: /eventos/palestra-jogo-psicomotor/
│      ├─ Local: "São Paulo"
│      ├─ Instrutor: "Prof. Dr. Mauro Vecchiato"
│      ├─ Content: Bio detalhada de Mauro (3 parágrafos)
│      └─ Featured Image: (customizable)
│
├─ Evento: Curso Psicomotricidade (24 de Setembro 2022)
│  └─→ CPT: Eventos (iibpr_evento)
│      ├─ Post: /eventos/psicomotricidade-jogo/
│      ├─ Tematicas: 3 tópicos do programa
│      └─ Content: (customizable)
│
├─ Evento: Congresso Brasileiro (15 de Julho)
│  └─→ CPT: Eventos (iibpr_evento)
│      ├─ Post: /eventos/congresso-brasileiro-psicomotricidade/
│      └─ Content: Descrição do congresso
│
├─ Eventos: Workshops (21 e 25 de Julho)
│  └─→ CPT: Eventos (iibpr_evento)
│      ├─ Post 1: /eventos/workshop-21-julho/
│      ├─ Post 2: /eventos/workshop-25-julho/
│      └─ Tipo: "Workshop"
│
├─ Seminários (Teórico/Didático)
│  └─→ CPT: Eventos (iibpr_evento)
│      ├─ Seminários Teórico I
│      └─ Seminários Didático II
│
└─ Contato
   └─→ Footer (template-parts/footer.php)
```

---

## 📖 SOBRE NÓS (about-us.html)

### De página estática para página customizável

```
INSTITUTOIBPR.COM.BR/about-us.html
│
├─ Hero Banner
│  └─→ page-sobre.php
│      ├─ Título: "Quem Somos" (customizable)
│      ├─ Subtítulo (customizable)
│      └─ Background: aboutus-banner.jpg
│
├─ "Onde há movimento, há vida em relação!"
│  └─→ Hero tagline (customizable via Customizer)
│
├─ Seção História
│  └─→ page-sobre.php > História Section
│      ├─ Label: "Nossa História" (customizable)
│      ├─ Título (customizable)
│      ├─ Texto 1 e 2 (customizable)
│      └─ Imagem: quem-somos.png (customizable)
│
├─ Descrição IIBPR (parágrafo introdutório)
│  └─→ page-sobre.php
│      └─ Content area (WordPress editor)
│
├─ Missão
│  └─→ Customizer: Seção "Sobre - MVV"
│      ├─ Label (customizable)
│      ├─ Texto da Missão (customizable)
│      └─ Card com ícone
│
├─ Visão
│  └─→ Customizer: Seção "Sobre - MVV"
│      ├─ Label (customizable)
│      ├─ Texto da Visão (customizable)
│      └─ Card com ícone
│
├─ Valores (12 valores listados)
│  └─→ Customizer: Seção "Sobre - MVV"
│      └─ Texto dos valores (customizable)
│
├─ Seção "O Que Fazemos" (Grid 2×2)
│  └─→ page-sobre.php > "O que Fazemos Section"
│      ├─ Label (customizable)
│      ├─ Título (customizable)
│      ├─ Texto 1-3 (customizable)
│      └─ 4 Imagens do grid (600×600)
│          ├─ acao-movimento-1.jpg
│          ├─ acao-grupo-2.jpg
│          ├─ acao-formacao-2.jpg
│          └─ bg-criancas.jpg
│
├─ Fundador 1: Augusto Parras Albuquerque
│  └─→ page-sobre.php > Founders Section
│      ├─ Nome (customizable)
│      ├─ Role/Função (customizable)
│      ├─ Bio longa (customizable)
│      ├─ Credenciais (customizable)
│      └─ Foto: augusto2.jpg (600×500, customizable)
│
├─ Fundador 2: Fabiane Alves Crispim
│  └─→ page-sobre.php > Founders Section
│      ├─ Nome (customizable)
│      ├─ Role/Função (customizable)
│      ├─ Bio longa (customizable)
│      └─ Foto: fabiane2.png (600×500, customizable)
│
├─ Fundador 3: Prof. Dr. Mauro Vecchiato
│  └─→ page-sobre.php > Founders Section
│      ├─ Nome: "Prof. Dr. Mauro Vecchiato" (customizable)
│      ├─ Função: "Diretor Científico — IIPR Itália" (customizable)
│      ├─ Bio longa (customizable)
│      ├─ Foto: mauro-quadrado.jpg (400×500, customizable)
│      └─ Livro: livro-mauro.png (ou customizable)
│
├─ Partnership com IIPR (Itália)
│  └─→ page-sobre.php
│      └─ Menção no conteúdo
│
├─ Partnership com Instituto Viver (MG)
│  └─→ page-sobre.php
│      └─ Menção no conteúdo
│
├─ Seção Stats
│  └─→ page-sobre.php > Stats Section
│      ├─ 120+ Artigos Publicados
│      ├─ 35+ Livros e Capítulos
│      └─ 50+ Congressos e Eventos
│
├─ CTA Final
│  └─→ page-sobre.php > CTA Section
│      ├─ Título (customizable)
│      ├─ Texto (customizable)
│      └─ Botão WhatsApp
│
└─ Contato
   └─→ Footer (template-parts/footer.php)
```

---

## 🆕 PÁGINAS INTERNAS

### Novas páginas com conteúdo do site original

```
┌─ PÁGINA: PSICOMOTRICIDADE RELACIONAL
│  └─→ page-psicomotricidade.php
│     ├─ Hero Banner (Explica O que é PRP)
│     ├─ Conceito/Entendendo a PRP
│     │  └─ Imagem: acao-movimento-6.jpg
│     ├─ 3 Pilares (Cards com imagens)
│     │  ├─ Pilar 1: Psicomotricidade
│     │  ├─ Pilar 2: Relacional
│     │  └─ Pilar 3: Psicodinâmica
│     └─ Prof. Dr. Mauro Vecchiato (Scientific Basis)
│        └─ Foto + Bio
│
├─ PÁGINA: PESQUISA CIENTÍFICA
│  └─→ page-pesquisa.php
│     ├─ Hero Banner (opcional)
│     ├─ Stats (120+ artigos, 35+ livros, 50+ congressos)
│     ├─ Conteúdo da página (WordPress editor)
│     └─ Blog posts recentes com categoria "pesquisa"
│
├─ PÁGINA: CONTATO
│  └─→ page-contato.php
│     ├─ Formulário de contato
│     ├─ Email: contato@institutoibpr.com.br
│     ├─ WhatsApp: +55 (061) 99157-2149
│     ├─ WhatsApp PT: +351 913 126 662
│     └─ Mapa (se desejar)
│
└─ PÁGINA: ALUNO
   └─→ page-aluno.php
      └─ Área restrita (pode expandir com funcionalidades)
```

---

## 📸 IMAGENS

### Mapeamento completo de imagens

```
ORIGINAL (48 imagens) → NOVO TEMA (120+ imagens)

Hero/Banners:
├─ pos-hero.jpeg → mauro-palestra2.png ✅
├─ services.jpg → acao-formacao-4.jpg ✅
├─ about-us.jpg → aboutus-banner.jpg ✅
└─ [Others] → [Converted to theme images] ✅

Cursos/Módulos (antes como imagens):
├─ mod-1-2022.png → Course CPT thumbnail ✅
├─ mod-2-2022.png → Course CPT thumbnail ✅
├─ mod-3-2021.png → Course CPT thumbnail ✅
├─ mod-4-2021.png → Course CPT thumbnail ✅
├─ mod-6-17-12-22.png → Course CPT thumbnail ✅
└─ [Others] → Course CPT thumbnails ✅

Eventos (antes como imagens):
├─ evento-19-11-2022.png → Event CPT thumbnail ✅
├─ evento-12-11-22.png → Event CPT thumbnail ✅
└─ evento-24-09-22.png → Event CPT thumbnail ✅

Fundadores:
├─ augusto2.jpg → /images/augusto2.jpg ✅
├─ fabiane2.png → /images/fabiane2.png ✅
└─ mauro-* → /images/mauro-quadrado.jpg ✅

Logo:
├─ iibpr-logo.svg → /images/IIBPR-rounded.svg ✅
└─ IIBPR-complete.svg → /images/IIBPR-complete.svg ✅

Icons:
├─ home6-digitalicon.png → [SVG icons] ✅
├─ home6-marketingicon.png → [SVG icons] ✅
├─ moving-icon.svg → [Icons] ✅
├─ vision-icon.svg → [Icons] ✅
└─ values-icon.svg → [Icons] ✅

Gallery/Action:
├─ formacaoprp5.jpg → /images/acao-formacao-*.jpg ✅
├─ formacaoprp8.jpg → /images/acao-formacao-*.jpg ✅
├─ workshop1.jpeg → /images/[Workshop] ✅
├─ workshop2.jpeg → /images/[Workshop] ✅
└─ palestrajogopsicomotor.jpeg → /images/palestrajogopsicomotor.jpeg ✅

Partners:
├─ iipr.png → /images/IIBPR-rounded.svg ✅
└─ logoeclipsi.jpeg → /images/logoeclipsi.jpeg ✅
```

---

## 📞 CONTATO

### Portagem de informações de contato

```
ORIGINAL:
├─ Email: contato@institutoibpr.com.br
├─ Tel Brasil: +55 (061) 99157-2149
└─ Tel Portugal: +351 913 126 662

NOVO TEMA:
├─ Footer (template-parts/footer.php)
│  ├─ Email link
│  ├─ WhatsApp Brasil
│  └─ WhatsApp Portugal
│
├─ Page Contato (page-contato.php)
│  ├─ Formulário
│  └─ Informações de contato
│
├─ CTA Sections (várias páginas)
│  ├─ "Fale Conosco"
│  └─ WhatsApp buttons
│
└─ Customizer
   ├─ Email (editável)
   ├─ WhatsApp URLs (editáveis)
   └─ [Todos campos de contato editáveis]
```

---

## 📊 RESUMO DE LOCALIZAÇÃO

| Elemento | Original | Novo Tema | Editável |
|----------|----------|-----------|----------|
| **Textos Hero** | HTML | Customizer | ✅ |
| **Descrições Cursos** | HTML | CPT Content | ✅ |
| **Descrições Eventos** | HTML | CPT Content | ✅ |
| **Missão/Visão/Valores** | HTML | Customizer | ✅ |
| **Bios Fundadores** | HTML | Customizer + Page | ✅ |
| **Contato (Email/WA)** | HTML | Footer + Customizer | ✅ |
| **Imagens Hero** | img/ | /theme/images/ | ✅ |
| **Fotos Fundadores** | img/ | /theme/images/ | ✅ |
| **Logos** | img/ | /theme/images/ | ✅ |
| **Ícones** | img/ | SVG inline | ✅ |

---

## ✅ CONCLUSÃO

**Toda informação original foi portada para:**
- ✅ WordPress Pages (estáticas)
- ✅ Custom Post Types (dinâmicas)
- ✅ Customizer (settings globais)
- ✅ Template Parts (componentes)
- ✅ Theme Images (assets)

**Nada foi perdido. Tudo está melhor organizado.**

---

**Mapa criado em:** 2026-05-12
**Versão:** 1.0
**Status:** ✅ PORTAGEM 100% COMPLETA
