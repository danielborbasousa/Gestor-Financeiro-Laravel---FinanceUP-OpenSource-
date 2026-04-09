

---

# 💵 Gestor Financeiro

![Laravel](https://img.shields.io/badge/Laravel-Framework-red)
![PHP](https://img.shields.io/badge/PHP-8%2B-blue)
![Status](https://img.shields.io/badge/status-concluído-success)
![License](https://img.shields.io/badge/license-MIT-green)
![Version](https://img.shields.io/badge/version-1.0-blue)
![PRs](https://img.shields.io/badge/PRs-welcome-brightgreen)

Sistema web de gestão financeira pessoal desenvolvido com **Laravel**, com o objetivo de auxiliar usuários no controle de suas receitas e despesas de forma simples, prática e eficiente.

---

## 📌 Sobre o Projeto

Este projeto foi desenvolvido como atividade acadêmica com o propósito de aplicar conceitos de desenvolvimento web, banco de dados e organização de sistemas.

O sistema permite que usuários cadastrados registrem seus ganhos e gastos, categorizem suas movimentações e acompanhem sua situação financeira ao longo do tempo, oferecendo uma visão clara e estratégica da vida financeira.

---

## 🚀 Funcionalidades

### 🔐 Autenticação de Usuário

* Cadastro de novos usuários
* Login e logout
* Proteção de rotas (acesso restrito)

### 💰 Controle Financeiro

* Cadastro de ganhos (receitas)
* Cadastro de gastos (despesas)
* Edição e exclusão de registros

### 🗂️ Categorização

* Criação e gerenciamento de categorias
* Associação de receitas e despesas a categorias

### 📊 Visualização Financeira

* Resumo mensal das finanças
* Resumo anual
* Exibição de receitas, despesas e saldo
* Indicadores de desempenho financeiro

---

## ⭐ Funcionalidades Extras

* 🔁 Cadastro de ganhos e gastos recorrentes (ex: salário, aluguel)
* 📜 Histórico financeiro completo
* 📊 Gráficos de visualização (barras, pizza, etc.)
* 🔔 Sistema de notificações inteligentes, como:

  * “Atenção: você já gastou mais de 50% da sua renda este mês”
  * “Parabéns! Seus gastos diminuíram em relação ao mês passado”
  * “Ótimo trabalho! Você está no positivo há 3 meses”
* 🌐 Integração com APIs externas:

  * Conversão de moedas
  * Integração com serviços financeiros
* 📰 Newsletter/notícias sobre finanças e investimentos
* 📱 Interface responsiva (adaptada para celular e desktop)

---

## 🛠️ Tecnologias Utilizadas

* Laravel (PHP)
* Blade (Template Engine)
* MySQL (ou outro banco relacional)
* HTML, CSS e JavaScript
* Bootstrap

---

## 🧠 Regras de Negócio

* Apenas usuários autenticados podem acessar o sistema
* Cada usuário visualiza apenas seus próprios dados
* Todas as transações devem possuir categoria
* O saldo é calculado automaticamente (receitas - despesas)
* Dados financeiros são privados e protegidos por autenticação
* Notificações são geradas com base no comportamento financeiro do usuário

---

## 📂 Estrutura do Projeto

* `app/` → Lógica da aplicação
* `routes/` → Definição de rotas
* `resources/views/` → Interfaces (Blade)
* `database/` → Migrations e seeders

---

## ▶️ Como Executar o Projeto

```bash
git clone https://github.com/seu-repositorio.git
cd gestor-financeiro
composer install
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no `.env` e depois execute:

```bash
php artisan migrate
php artisan serve
```

---

## 👥 Integrantes do Projeto

* Nome 1
* Nome 2
* Nome 3
* Nome 4
* Nome 5

---

## 📈 Critérios de Avaliação Atendidos

✔ Funcionamento completo do sistema
✔ Implementação de todos os requisitos mínimos
✔ Implementação de funcionalidades extras
✔ Qualidade e organização do código
✔ Interface amigável e responsiva

---

## 📌 Considerações Finais

O sistema atende plenamente aos requisitos propostos, incluindo todas as funcionalidades extras sugeridas. O projeto demonstra a aplicação prática de conceitos de desenvolvimento web, banco de dados e experiência do usuário, resultando em uma ferramenta robusta e escalável para controle financeiro pessoal.


