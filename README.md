# 💪 AlwaysFit API - Laravel 12 + Sanctum + Docker

Este projeto é uma API RESTful desenvolvida com **Laravel 12**, utilizando **Laravel Sanctum** para autenticação e **Laravel Sail** com Docker para ambiente de desenvolvimento. A API é voltada para controle de **usuários**, **treinos**, **planos nutricionais** e **progresso físico**.

## 🚀 Funcionalidades

### 🧑‍💼 usuários

| Método | Rota                    | Ação                   |
| ------ | ----------------------- | ---------------------- |
| POST   | `/api/v1/users`         | Registrar novo usuário |
| GET    | `/api/v1/users/profile` | Ver perfil do usuário  |

### 🏋️‍♀️ treinos

| Método    | Rota                                    | Ação                         |
| --------- | --------------------------------------- | ---------------------------- |
| GET       | `/api/v1/trainings`                     | Listar treinos               |
| POST      | `/api/v1/trainings`                     | Criar novo treino            |
| PUT/PATCH | `/api/v1/trainings/{training}`          | Atualizar treino             |
| DELETE    | `/api/v1/trainings/{training}`          | Deletar treino               |
| POST      | `/api/v1/trainings/{training}/complete` | Marcar treino como concluído |

### 🍽️ Planos nutricionais

| Método    | Rota                                       | Ação             |
| --------- | ------------------------------------------ | ---------------- |
| GET       | `/api/v1/nutrition-plans`                  | Listar planos    |
| POST      | `/api/v1/nutrition-plans`                  | Criar novo plano |
| PUT/PATCH | `/api/v1/nutrition-plans/{nutrition_plan}` | Atualizar plano  |
| DELETE    | `/api/v1/nutrition-plans/{nutrition_plan}` | Deletar plano    |

### 📈 Progresso

| Método | Rota               | Ação                      |
| ------ | ------------------ | ------------------------- |
| GET    | `/api/v1/progress` | Listar treinos concluídos |

## 🔐 Autenticação

| Método | Rota                   | Ação              |
| ------ | ---------------------- | ----------------- |
| POST   | `/api/v1/auth/sign-in` | Login do usuário  |
| POST   | `/api/v1/auth/logout`  | Logout do usuário |

A autenticação é feita com **Laravel Sanctum**, protegendo as rotas privadas com middleware de autenticação.

## 🗂️ Estrutura do Banco de Dados

Utiliza **migrations** e **seeders** para criar as seguintes tabelas:

-   `users`
-   `trainings`
-   `nutrition_plans`
-   `progress_logs`

## ✅ Validações e Regras

-   Todas as requisições passam por validações com mensagens claras.
-   Relacionamentos corretamente definidos entre os modelos (ex: `User hasMany Trainings`).
-   Responses e utilizando Resources consistentes com status HTTP apropriados.

## 🧪 Testes

```bash
sail pest
```

## 🐳 Docker com Laravel Sail

Este projeto está pronto para rodar com Laravel Sail. Basta ter Docker instalado.

```bash
# Clonar o repositório
git clone https://github.com/seu-usuario/fitness-api.git
cd fitness-api

# Instalar dependências
./vendor/bin/sail up -d
```

## 📬 Collection do Postman

Para facilitar os testes, incluímos uma collection do Postman com todos os endpoints documentados.

-   🔗 [Download da Collection](./docs/alwaysfit-api.postman_collection.json)

### Como usar:

1. Baixe o arquivo acima.
2. Abra o Postman.
3. Vá em **"Import"** e selecione o arquivo `.json`.
4. Pronto! Todos os endpoints estarão disponíveis para testar.
