# SISTEMA_CADASTRO_PRODUTOS

Sistema de Cadastro de Produtos
Este é um sistema simples de cadastro de produtos desenvolvido em PHP, utilizando MySQL como banco de dados. O sistema permite realizar as operações básicas de um CRUD (Create, Read, Update, Delete) para gerenciar um inventário de produtos.

Funcionalidades
Cadastrar Produtos: Permite o cadastro de novos produtos, incluindo nome, descrição, preço e quantidade em estoque.
Listar Produtos: Exibe uma lista de todos os produtos cadastrados no sistema.
Editar Produtos: Permite a edição dos dados de um produto já cadastrado.
Excluir Produtos: Exclui um produto do sistema de forma segura.
Tecnologias Utilizadas
PHP: Linguagem de programação utilizada para o desenvolvimento do sistema.
MySQL: Banco de dados relacional utilizado para armazenar as informações dos produtos.
HTML/CSS: Para a estrutura e estilização das páginas do sistema.
Requisitos
Antes de rodar o sistema, certifique-se de ter os seguintes pré-requisitos instalados:

PHP (versão 7.0 ou superior)
MySQL (versão 5.7 ou superior)
Servidor Web como o XAMPP ou WAMP (caso esteja utilizando um ambiente local)
Como Usar
1. Configurar o Banco de Dados
Primeiro, crie um banco de dados no MySQL. Utilize o seguinte comando SQL para criar o banco e a tabela de produtos:

sql
Copiar
Editar
CREATE DATABASE seu_banco;

USE seu_banco;

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
2. Configurar a Conexão com o Banco de Dados
No arquivo db/conexao.php, substitua os valores de seu_banco, seu_usuario e sua_senha pelas credenciais do seu banco de dados MySQL.

php
Copiar
Editar
$host = 'localhost';
$dbname = 'seu_banco';
$username = 'seu_usuario';
$password = 'sua_senha';
3. Rodar o Sistema
Coloque todos os arquivos do sistema em uma pasta dentro da sua raiz do servidor web (por exemplo, htdocs no XAMPP).
Acesse o sistema através do navegador, digitando http://localhost/seu_sistema/.
Você verá a interface onde poderá cadastrar, editar, listar e excluir produtos.
Estrutura de Diretórios
bash
Copiar
Editar
/seu_sistema
    /db
        conexao.php
    /includes
        header.php
        footer.php
    /actions
        cadastrar.php
        editar.php
        excluir.php
    /css
        style.css
    index.php
    editar.php
