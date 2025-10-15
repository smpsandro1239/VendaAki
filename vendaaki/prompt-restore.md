# 📁 Projeto: VendaAki
## 🎯 Objetivo do Site
Plataforma de classificados/compra e venda local com autenticação de utilizadores, gestão de anúncios, imagens e lances (bids).

---

## 🧱 Tecnologias Usadas
### Frontend
- Framework: Blade (Laravel views) com Vite
- Estilização: TailwindCSS
- Estado: Server-rendered (Blade) + JavaScript leve (Axios para requests)
- Roteamento: Roteamento do Laravel (routes/web.php)

### Backend
- Runtime: PHP 8.2+
- Framework: Laravel 11
- Autenticação: (Planejado) Laravel Breeze (configuração listada no README)
- API: REST endpoints via controllers (app/Http/Controllers)

### Base de Dados
- Tipo: MySQL (configuração padrão no `.env` sugerida no README)
- Localização: Local (dev), configurável via `.env`
- Schema atual: migrations em `database/migrations` (veja arquivos com timestamps para `categories`, `ads`, `ad_images`, `bids`)

---

## 📂 Estrutura do Projeto (Local)
- Repositório: local em `C:\laragon\www\VendaAki\VendaAki`
- Branch atual: main
- Último commit: (preencher manualmente: ver `git log` localmente)
- Pasta raiz: `C:\laragon\www\VendaAki\VendaAki`

---

## ✅ O que está implementado
- [x] Estrutura base Laravel 11
- [x] Migrations para `users`, `categories`, `ads`, `ad_images`, `bids` incluídas
- [x] Modelos Eloquent básicos: `User.php`, `Category.php`, `Ad.php`, `AdImage.php`, `Bid.php`
- [x] Rota principal `/` retornando a view `welcome`
- [x] Vite + Tailwind configurados (`package.json`, `vite.config.js`, `tailwind.config.js` presentes)

---

## ❗ O que falta implementar
- [ ] Implementar autenticação (Laravel Breeze ou outro)
- [ ] Implementar CRUD completo de anúncios com upload de imagens
- [ ] Integração de pagamentos (se aplicável)
- [ ] Implementar UI (views Blade) para dashboard de utilizador
- [ ] Testes automatizados
- [ ] Configurar deploy/CI (opcional)

---

## 🧪 Ambiente de Desenvolvimento
### Requisitos
- PHP: ^8.2 (conforme `composer.json`)
- Composer instalado
- Node.js + npm (para Vite/Tailwind)
- MySQL (ou MariaDB) rodando localmente
- Variáveis de ambiente: use `.env.example` como base e configure `DB_*` e `APP_KEY`

### Comandos para rodar o projeto (local - Laragon)
```bash
# Instalar dependências PHP
composer install

# Copiar env e gerar app key
cp .env.example .env
php artisan key:generate

# Instalar dependências JavaScript
npm install

# Rodar migrations
php artisan migrate

# Rodar o servidor (opcional: usar Laragon ou php artisan serve)
php artisan serve

# Rodar Vite (assets)
npm run dev
```

---

## 📦 Ficheiros-chave
- `README.md`: documentação inicial (contém instruções de setup)
- `composer.json`: dependências PHP e scripts (inclui scripts `dev` com `concurrently`)
- `package.json`: devDependencies e scripts para Vite
- `database/migrations`: contém migrations para `categories`, `ads`, `ad_images`, `bids`
- `.env.example`: copiar e preencher para ambiente local

---

## 🧠 Instrução Final para a IA
> Assim que este prompt for carregado, por favor:
> 1. Verifica se o repositório está acessível.
> 2. Confirma que o `.env` está devidamente configurado.
> 3. Lista os ficheiros mais recentes e confirma o estado do projeto.
> 4. Sugere o próximo passo lógico com base no que falta fazer.
> 5. Se for um novo computador, guia-me na instalação do ambiente completo.

---

## Notas adicionais
- Para obter a informação do último commit ou branch active, executar `git status --porcelain` e `git log -1 --oneline` na pasta do projeto.
- Se pretenderes, posso commitar este ficheiro `prompt-restore.md` no repositório e criar um small README adicional com passos rápidos.
