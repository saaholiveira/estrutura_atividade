# Atividade PHP — Implementação da Edição

Projeto baseado em `estrutura-php-backend`, adaptado para a atividade de implementação da edição.

## Integrantes
- Pedro Henrique
- Sarah Olivatto
- Giovanna Barbosa

## Funcionalidades
- Cadastro e listagem de Clientes.
- Edição de Clientes.
- Cadastro e listagem de Fornecedores.
- Edição de Fornecedores.
- Persistência usando MySQL e PDO.
- Formulários com validação básica e consultas preparadas.

## Requisitos
- XAMPP (Apache + MySQL) ou ambiente PHP equivalente.
- PHP 7.4+.
- MySQL/MariaDB.

## Como executar
1. Copie a pasta do projeto para `C:\xampp\htdocs\`.
2. Abra o XAMPP e inicie **Apache** e **MySQL**.
3. Abra o phpMyAdmin e importe o arquivo `sql/database.sql`.
4. Confira `config/database.php`. O padrão é:
   - banco: `estrutura_php`
   - usuário: `root`
   - senha: vazia
5. Acesse:
   `http://localhost/estrutura-php-backend-main/views/`

## Demonstração da edição
1. Acesse Clientes.
2. Cadastre um cliente.
3. Na listagem, clique em **Editar**.
4. Altere nome, e-mail ou telefone.
5. Clique em **Salvar alterações**.
6. Confira a alteração na listagem.
7. Repita o processo em Fornecedores.

## Estrutura da edição
A edição recebe o `id` pela URL, busca o registro no banco, exibe os dados no formulário e, ao enviar o formulário, executa um `UPDATE` usando PDO e parâmetros preparados.
