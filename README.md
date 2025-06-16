
---

# API de Animes em Laravel

Uma API RESTful simples desenvolvida em Laravel para gerenciar e consultar uma base de dados de animes. Este projeto foi criado como um case de estudo para demonstrar as funcionalidades essenciais de uma API, incluindo listagem, consulta por ID e filtragem avançada de recursos.

## ✨ Funcionalidades

- Listagem paginada de animes.
- Consulta de um anime específico por seu ID.
- Sistema de filtragem robusto por:
  - Título (parcial)
  - Ano de lançamento (exato)
  - Gênero
  - Estúdio (parcial)
- Possibilidade de combinar múltiplos filtros em uma única requisição.
- Base de dados inicial com 30 animes para testes.

## 🛠️ Tecnologias Utilizadas

- **Backend:** Laravel 10+
- **Linguagem:** PHP 8.1+
- **Banco de Dados:** SQLite
- **Gerenciador de Dependências:** Composer

## 🚀 Instalação e Setup

Siga os passos abaixo para rodar o projeto em seu ambiente local.

**1. Clonar o Repositório**

```bash
git clone https://github.com/Poliih/api-rest.git
cd api-rest
```

**2. Instalar as Dependências**

Use o Composer para instalar todas as dependências do PHP.

```bash
composer install
```

**3. Configurar o Ambiente**

Copie o arquivo de exemplo de ambiente e gere a chave da aplicação.

```bash
cp .env.example .env
php artisan key:generate
```

**4. Configurar o Banco de Dados (SQLite)**

Este projeto está configurado para usar SQLite por padrão.

a. Garanta que seu arquivo `.env` tenha a seguinte configuração:
```dotenv
DB_CONNECTION=sqlite
```

b. Crie o arquivo do banco de dados na pasta `database/`:
```bash
touch database/database.sqlite
```

**5. Rodar as Migrations e Seeders**

Este comando irá criar a estrutura da tabela `animes` e populá-la com 30 registros para teste.

```bash
php artisan migrate --seed
```

**6. Iniciar o Servidor**

Inicie o servidor de desenvolvimento local do Laravel.

```bash
php artisan serve
```

Pronto! Sua API estará rodando em `http://127.0.0.1:8000`.

---

## 📖 Endpoints da API

A URL base para todos os endpoints é `http://127.0.0.1:8000/api`.

### 1. Listar Animes

Retorna uma lista paginada de todos os animes.

- **Endpoint:** `GET /animes`
- **Exemplo:**
  ```http
  GET http://127.0.0.1:8000/api/animes
  ```
- **Paginação:** Para navegar entre as páginas, use o parâmetro `page`.
  ```http
  GET http://127.0.0.1:8000/api/animes?page=2
  ```

### 2. Buscar Anime por ID

Retorna os detalhes de um anime específico.

- **Endpoint:** `GET /animes/{id}`
- **Exemplo:**
  ```http
  GET http://127.0.0.1:8000/api/animes/7
  ```

### 3. Filtrar Animes

É possível adicionar parâmetros de query no endpoint de listagem (`/animes`) para filtrar os resultados.

#### Parâmetros de Filtro Disponíveis:

- `titulo` (string): Filtra por parte do título do anime.
- `ano` (integer): Filtra pelo ano de lançamento exato.
- `genero` (string): Filtra por um gênero específico (deve ser o nome exato).
- `estudio` (string): Filtra por parte do nome do estúdio.

#### Exemplos de Filtragem:

- **Filtrar por título:**
  ```http
  GET http://127.0.0.1:8000/api/animes?titulo=Titan
  ```

- **Filtrar por gênero:**
  ```http
  GET http://127.0.0.1:8000/api/animes?genero=Psicológico
  ```

- **Filtrar por ano de lançamento:**
  ```http
  GET http://127.0.0.1:8000/api/animes?ano=2022
  ```

- **Combinar filtros:** (Os filtros podem ser usados em conjunto)
  ```http
  GET http://127.0.0.1:8000/api/animes?estudio=Bones&genero=Ação
  ```
