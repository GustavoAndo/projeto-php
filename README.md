# Projeto PHP

Este projeto foi criado durante minha aprendizagem da tecnologia PHP e MySQL.

***

## 🎯 Objetivo

Criar um site em PHP com CRUD de usuários e projetos e criar uma forma de autenticação do usuário (login).

Nele é pretendido realizar os seguintes requisitos:
- [x] CRUD de usuários:
  - [x] Tabela usuários - com os campos: matricula (chave primária), nome, email (chave única), senha e id do projeto (chave estrangeira);
  - [x] Cadastro de usuários - com validação de campos;
  - [x] Edição de usuários;
  - [x] Exclusão de usuários - com modal de confirmação.
- [x] CRUD de projetos:
  - [x] Tabela projetos - com os campos: id (chave primária), nome, orçamento, data de início, data de fim e descrição;
  - [x] Cadastro de projetos - com validação de campos;
  - [x] Edição de projetos;
  - [x] Exclusão de projetos - com modal de confirmação.
- [x] Login:
  - [x] Mecânica de Logar através de email e senha no banco de dados;
  - [x] Mecânica de Deslogar;
  - [x] Proteção das páginas para impedir de serem acessadas por usuários não logados.

***

## 📌 Manual de Instalação

1. Baixe e instale o [WAMP SERVER](https://www.wampserver.com/en/#download-wrapper);
2. Baixe (e descompacte, caso tenha baixado em zip) este projeto e coloque na pasta: `C:\wamp64\www`;
3. Entre em `http://localhost/phpmyadmin`;
4. Entre como usuário `root` e senha vazia;
5. Clique em `Novo` e crie um banco de dados com o nome `crud`;
6. Vá na aba importar e clique em escolher arquivo: importe o arquivo sql na pasta database deste projeto;
7. Por fim, abra no seu navegador `http://localhost/[nome-da-pasta-do-projeto]` e o projeto estará funcionando.

***

## ⚙️ Tecnologias: 
<p>
  <img alt="PHP" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" height="40px">
  <img alt="MySQL" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" height="40px">
  <img alt="HTML5" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" height="40px">
  <img alt="CSS3" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg" height="40px">   
  <img alt="JavaScript" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/javascript/javascript-original.svg" height="40px">
  <img alt="Bootstrap" src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" height="40px">
</p>
