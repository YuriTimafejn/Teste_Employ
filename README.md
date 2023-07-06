# Projeto TO DO List - Afazeres #

Projeto de lista de tarefas (To-Do List) como solicitação de desafio para vaga de Desenvolvedor Fullstack.

O desafio possuia as seguintes restrições:

+ Desenvolva um sistema de gerenciamento de tarefas (to-do list) com as seguintes funcionalidades: criar, visualizar, atualizar e excluir tarefas (CRUD).
+ O sistema deve ter uma interface de usuário simples e intuitiva, que permita as usuário interagir com as tarefas de forma fácil.
+ É **requesito obrigatório** que o sistema seja desenvolvido utilizado: HTML, CSS (sem framework), Javascript, Jquery, Ajax, PHP e MySQL.
+ A única **restrição** é que não deverá ser utilizado framework no front-end ou no Back-end.

## Requisitos para rodar o projeto ##

O projeto foi construido utilizado o PHP na versão 8, o uso do PHP em versões anteriores pode causar problemas na
execução do sistema e é necessário que na configuração do servidor PHP estejam habilitadas as extensões: PDO e o drive do MySQL.

A versão do servidor MySQL foi a versão 8.0, é possível utilizar versões anteriores do banco.

Para verificar as configurações de sistama, utilize:
PHP
````shell
php -v

php -i
````
MySQL
````mysql
SELECT VERSION();
````

Foi utilizado o servidor integrado do PHP, para subir o servidor integrado em seu sistema, rode dentro do 
diretorio raiz do projeto:
````shell
cd [DIRETORIO/DO/PROJETO]

pwd

php -S localhost:8088 -t public
````
O banco de dados foi construido em um container Docker, caso utilize um servidor local crie o banco de dados através do 
comando:
````mysql
CREATE DATABASE IF NOT EXISTS AFAZERES;
USE AFAZERES;
````
e altere no arquivo: '/src/utils/Database.php' os valores padrão das variáveis para criar a conexão com o banco.
No caso de um servidor de produção ele utilizaria as variáveis de ambiente do sistema.

No caso da utilize o Docker, dentro do diretório raiz do projeto rode o comando:
````shell
docker-composer up
````
Será criados dois container, um de banco de dados e um servidor PHPMyAdmin.

Para subir os container, verifique a disponibilidade das portas em seu sistema, havendo necessidade altere a porta
dos serviços no arquivo docker-composer.

No banco de dados, será necessário criar a tabela de controle dos chamados. O script de criação da tabela do sistema
está salvo e pode ser modificado conforme necessidade no diretório: 
````
'/resorces/migrations/V1_criacaoTabela.sql'
````
Crie a tabela para a utilização do sistema.

Para testes, pode-se rodar o script 
````
/resorces/seed/seed_example.sql
````
para dar uma carga de tarefas no banco de dados.

## Regras utilizadas ##

+ Pode-se criar uma nova tarefa a partir do botão 'Novo Afazer'
+ Ao criar uma tarefa está será listada na página _**'Lista de afazeres'**_.
+ Pode-se manipular uma tarefa clicando sobre ela na listagem.
+ Pode-se concluir, excluir e salvar edição de uma tarefa através dos botões 'Marcar como concluida', 'Excluir' e 'Salvar' respectivamente.
+ Pode-se ver em lista todas as tarefas finalizadas através da página _**'Feito'**_
+ Não é feita exclusão lógica da tarefa, uma fez excluida não será possivel reaver a tarefa.

