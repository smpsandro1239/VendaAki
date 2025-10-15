# Quickstart — VendaAki (Laragon)

Este ficheiro descreve passos rápidos para configurar e arrancar o projecto VendaAki num ambiente Windows com Laragon.

Pré-requisitos
- Laragon instalado (https://laragon.org)
- MySQL (vem com Laragon)
- PHP >= 8.2 (garantido pelo Laragon configurado)
- Composer (pode usar o Composer do Laragon ou global)
- Node.js + npm (instalar via instalador oficial ou usar o Node do Laragon)

Configuração rápida
1. Abra o Laragon e defina a pasta do projecto em `C:/laragon/www/VendaAki` (ou clone o repositório lá).
2. Abra um terminal (Terminal -> Bash) na pasta `C:/laragon/www/VendaAki/VendaAki`.

Comandos básicos
```bash
# 1. Instalar dependências PHP
composer install

# 2. Copiar .env e gerar APP_KEY
cp .env.example .env
php artisan key:generate

# 3. Criar base de dados (no Laragon: menu -> MySQL -> Adminer/HeidiSQL)
# Ou via terminal (ajusta user/password conforme Laragon):
# mysql -u root -p -e "CREATE DATABASE vendaaki_db;"

# 4. Instalar dependências JS
npm install

# 5. Executar migrations
php artisan migrate

# 6. Rodar Vite (em background) e servidor artisan
npm run dev &
php artisan serve --host=127.0.0.1 --port=8000
```

Notas específicas para Laragon
- Se usares o virtual host do Laragon, podes aceder via `http://vendaaki.test` (adiciona host no Laragon se preferires).
- Para MySQL local, normalmente o utilizador é `root` sem password; ajusta `DB_USERNAME` e `DB_PASSWORD` no `.env` conforme o Laragon.

Debug / troubleshooting
- Logs: `storage/logs/laravel.log`
- Verifica permissões na pasta `storage/` e `bootstrap/cache/` se receberes erros de escrita.

Se quiseres, posso adicionar um `Makefile` ou `scripts` no `package.json` para automatizar estes passos.
