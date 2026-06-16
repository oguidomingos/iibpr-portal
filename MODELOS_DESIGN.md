# 🎨 Modelos de Design — Especificações Detalhadas

Guia de criação e especificações para cada tipo de asset visual.

---

## 1️⃣ HERO BANNERS (1920 × 1080)

### Onde aparecem:
- Homepage (carousel com 5 slides)
- Página Sobre
- Página Cursos
- Página Eventos
- Página Psicomotricidade

### Características:
- **Dimensão:** 1920 × 1080px (16:9)
- **Formato:** JPG (qualidade 85-90) ou PNG
- **Peso:** Máx 500KB (comprimido)
- **Conteúdo:** Overlay de gradiente escuro + imagem

### Overlay no Front-End:
```css
linear-gradient(135deg,
  rgba(64,72,86,0.88) 0%,
  rgba(58,90,42,0.82) 100%)
```

### Tipos recomendados:
✅ Pessoas em movimento/ação
✅ Aulas/sessões práticas
✅ Grupo em interação
✅ Ambiente educacional/profissional

❌ Imagens muito genéricas
❌ Fotos muito claras (overlay escurece)
❌ Texto incorporado (sobrescreve)

### Exemplo de composição:

```
┌─────────────────────────────────────────┐
│   [Pessoas em movimento - 60% esquerda] │
│   [Espaço em branco - 40% direita]      │
│                                         │
│   [Overlay escuro reduz claridade]      │
└─────────────────────────────────────────┘
```

### Sugestões de conteúdo para cada slide:

| Slide | Tema | Sugestão |
|-------|------|----------|
| 1 | Pós em Psicomotricidade | Aula prática, pessoas em movimento, ambiente profissional |
| 2 | Especialização IESB | Ambiente acadêmico, sala de aula, interação |
| 3 | Grafomotricidade | Crianças/adultos escrevendo, análise de escrita |
| 4 | Cursos Diversos | Grupo em atividade, diversidade de pessoas |
| 5 | Vivência Corporal | Movimento corporal, bem-estar, energia |

---

## 2️⃣ CARDS (600 × 400)

### 📌 INTEREST CARDS — "Para quem é o IIBPR?"

**Dimensão:** 600 × 400px (3:2)
**Quantidade:** 4 cards
**Formato:** JPG
**Peso:** Máx 150KB por card

#### Card 1: Educadores
- **Imagem:** Professor/a em sala de aula
- **Cores:** Verde complementar
- **Pessoas:** 1-2 educadores
- **Contexto:** Sala de aula, quadro, alunos ao fundo

#### Card 2: Profissionais de Saúde
- **Imagem:** Profissional de saúde (terapeuta, psicólogo, médico)
- **Cores:** Tons profissionais + verde
- **Pessoas:** 1 profissional em contexto de atendimento
- **Contexto:** Consultório, sessão terapêutica

#### Card 3: Pais/Cuidadores
- **Imagem:** Adulto com criança em interação
- **Cores:** Calorosos, aconchego
- **Pessoas:** 1 adulto + 1 criança
- **Contexto:** Brincadeira, movimento, conexão

#### Card 4: Pesquisadores
- **Imagem:** Pessoa em contexto académico/pesquisa
- **Cores:** Tons neutros/azuis
- **Pessoas:** 1-2 pesquisadores
- **Contexto:** Livros, papers, ambiente académico

---

### 📌 COURSE CARDS — Capas de Cursos

**Dimensão:** 600 × 400px (3:2)
**Quantidade:** Mínimo 3, máximo conforme quantidade de cursos
**Formato:** JPG
**Peso:** Máx 150KB por card

#### Opções de design:

**Opção A: Fotos Reais**
```
┌──────────────────────────────────┐
│                                  │
│  [Foto de aula/prática prática]  │
│  [Overlay semi-transparente]     │
│  [Título do curso]               │
│  [Horas/modalidade]              │
└──────────────────────────────────┘
```

**Opção B: Design Gráfico**
```
┌──────────────────────────────────┐
│  [Background gradiente]          │
│  [Ícone/ilustração]              │
│  [Título do curso]               │
│  [Descrição curta]               │
└──────────────────────────────────┘
```

#### Cursos sugeridos:
- Especialização em Psicomotricidade (420h)
- Grafomotricidade (20h)
- Psicomotricidade Relacional Básica
- Formação de Facilitadores
- Workshops especializados

---

### 📌 EVENT CARDS — Capas de Eventos

**Dimensão:** 600 × 400px (3:2)
**Quantidade:** Dinâmica (conforme eventos)
**Formato:** JPG
**Peso:** Máx 150KB por card

#### Layout padrão:
```
┌──────────────────────────────────┐
│  [Data grande no topo]           │
│  [Foto do evento/ambiente]       │
│  [Overlay com tipo evento]       │
│  [Título evento]                 │
│  [Localização/modalidade]        │
└──────────────────────────────────┘
```

#### Tipos de eventos:
- Seminários internacionais
- Palestras
- Workshops
- Encontros de pesquisa
- Formações presenciais

---

## 3️⃣ GRID/MOSAICO (600 × 600)

### 📌 ABOUT PILLARS — Os Três Pilares

**Dimensão:** 600 × 600px (1:1)
**Quantidade:** 3 imagens
**Formato:** JPG
**Peso:** Máx 200KB por imagem

#### Pillar 1: Psicomotricidade
- **Tema:** Movimento do corpo
- **Imagem:** Pessoa em movimento corporal, expressão física
- **Exemplos:** Dança, yoga, movimento consciente
- **Arquivo padrão:** `acao-movimento-1.jpg` ✅

#### Pillar 2: Relacional
- **Tema:** Interação e conexão
- **Imagem:** Grupo em atividade, interação social
- **Exemplos:** Aula em grupo, brincadeira coletiva, roda de conversa
- **Arquivo padrão:** `acao-grupo-2.jpg` ✅

#### Pillar 3: Psicodinâmica
- **Tema:** Processo psíquico, aprendizado
- **Imagem:** Pessoa em reflexão, aprendizado, transformação
- **Exemplos:** Aula teórica, discussão, momento de insight
- **Arquivo padrão:** `acao-formacao-1.jpg` ✅

---

### 📌 ACTION GALLERY — Galeria de Ações

**Dimensão:** 600 × 600px (1:1)
**Quantidade:** 6-8 imagens
**Formato:** JPG
**Peso:** Máx 200KB por imagem

#### Tipos de fotos recomendadas:

| Foto 1 | Movimento corporal | Pessoa em movimento |
| Foto 2 | Grupo em ação | Pessoas interagindo |
| Foto 3 | Crianças | Crianças em atividade |
| Foto 4 | Formação/Aula | Aula ou apresentação |
| Foto 5 | Vivência | Momento de experiência |
| Foto 6 | Diversidade | Pessoas diferentes |
| Foto 7 | Ambiente | Espaço de trabalho |
| Foto 8 | Celebração | Momento de conquista |

---

## 4️⃣ FOTOS DE PESSOAS (400 × 500)

### 📌 FOUNDER PHOTOS — Fundadores

**Dimensão:** 400 × 500px (4:5)
**Formato:** JPG
**Peso:** Máx 150KB
**Estilo:** Portrait profissional

#### Recomendações:
- Fundo neutro (branco ou desfocado)
- Iluminação profissional
- Roupas profissionais
- Expressão amigável e confiante
- Sem acessórios distraindo
- Foto até a cintura ou busto

#### Exemplo:
```
┌──────────────┐
│              │
│  [Cabeça]    │
│  [Ombros]    │
│  [Peito]     │
│              │
└──────────────┘
```

---

## 5️⃣ LOGO

### 📌 IIBPR LOGO

**Dimensão:** 300 × 100px (3:1) — mínimo recomendado
**Formato:** PNG com transparência
**Peso:** Máx 50KB
**Variações:**

#### Logo Horizontal (para header)
```
┌────────────────────────────┐
│  [Logo] IIBPR              │
│        Psicomotricidade    │
└────────────────────────────┘
```

#### Logo Vertical (para footer)
```
┌──────────┐
│ [Logo]   │
│ IIBPR    │
│ Psicomo- │
│ tricidade│
└──────────┘
```

#### Cores:
- **Verde primário:** #6CB350
- **Branco:** #FFFFFF (fundo)
- **Preto:** #1F2937 (texto)

---

## 6️⃣ BACKGROUNDS ESPECIAIS

### 📌 STATS BACKGROUND

**Dimensão:** 1920 × 600px (mínimo)
**Formato:** JPG
**Peso:** Máx 400KB
**Características:**
- Imagem com overlay escuro
- Transmita: profissionalismo, crescimento, pesquisa
- Arquivo padrão: `acao-grupo-4.jpg` ✅

---

## 📋 CHECKLIST DE QUALIDADE

Antes de fazer upload, verifique:

### Qualidade Geral
- [ ] Imagem está em alta resolução (não pixelada)
- [ ] Cores são vibrantes e precisas
- [ ] Sem deformação ou distorção
- [ ] Sem efeitos Photoshop exagerados
- [ ] Pessoas com expressões naturais

### Dimensões
- [ ] Imagem está nas dimensões corretas
- [ ] Proporção está correta (não achatada)
- [ ] Não está muito zoom (parte cortada)
- [ ] Não está muito afastado (muito espaço vazio)

### Conteúdo
- [ ] Transmite a mensagem correta
- [ ] Diversidade representada
- [ ] Nenhuma marca de água visível
- [ ] Sem textos que conflitem com overlay
- [ ] Sem objetos distraindo foco

### Arquivo
- [ ] Peso está otimizado (<500KB)
- [ ] Formato correto (JPG para fotos, PNG para logos)
- [ ] Nome descritivo (ex: `hero-cursos.jpg`)
- [ ] Sem caracteres especiais ou acentos no nome

---

## 🎯 PRIORIDADES DE CRIAÇÃO

### 🔴 Crítico (Fazendo site ficar completo):
1. Logo do Instituto
2. Hero carousel (5 slides)
3. Interest cards (4)
4. Featured courses (3)

### 🟡 Importante (Melhorando visual):
5. Capas de todos os cursos
6. Capas de eventos criados
7. Action gallery completa

### 🟢 Opcional (Refinamento):
8. Backgrounds customizados para páginas internas
9. Variações de layouts

---

## 💾 COMO SALVAR ARQUIVOS

### Nomenclatura recomendada:
```
hero-homepage-slide-1.jpg
hero-cursos.jpg
card-interest-educators.jpg
card-course-especializacao.jpg
card-event-seminario-2026.jpg
pillar-psicomotricidade.jpg
founder-fabiane.jpg
logo-iibpr.png
```

### Evite:
```
IMG_1234.jpg
Sem título.png
Imagem (1).jpg
Banner azul verde.jpg
```

---

## 🔗 FERRAMENTAS RECOMENDADAS

### Design/Edição:
- **Canva Pro** — templates prontos
- **Figma** — design profissional
- **Adobe Creative Cloud** — máxima qualidade
- **Photoshop** — ajustes finos

### Compressão:
- **TinyPNG** — JPG/PNG
- **ImageOptim** — Mac
- **OptiPNG** — PNG

### Stock Photos:
- **Unsplash** — grátis, alta qualidade
- **Pexels** — grátis
- **Pixabay** — grátis
- **Shutterstock** — premium
- **iStock** — premium

### Fotografa:
- **Contratar fotógrafo** — resultado melhor
- **Foto de aulas reais** — mais autêntico
- **Misturar estilos** — profissional + real

---

## 📐 GUIA RÁPIDO DE DIMENSÕES

| Uso | Dimensão | Proporção | Arquivo |
|-----|----------|-----------|---------|
| Hero/Banner | 1920×1080 | 16:9 | JPG |
| Card Horizontal | 600×400 | 3:2 | JPG |
| Card Quadrado | 600×600 | 1:1 | JPG |
| Foto Pessoa | 400×500 | 4:5 | JPG |
| Logo | 300×100 | 3:1 | PNG |
| Logo Quadrado | 200×200 | 1:1 | PNG |

---

**Última atualização:** 2026-05-12
**Versão:** 1.0
