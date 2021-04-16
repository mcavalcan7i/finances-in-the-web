<h1 align="center">Finances in the Web</h1>

<hr>

<p align="center">
 <a href="#">Sobre esse projeto</a> •
 <a href="#">Tecnologias utilizadas</a> • 
 <a href="#">Funcionalidades</a> • 
 <a href="#">Sobre mim</a> •
 <a href="#">Execute na sua máquina</a>
</p>

<hr>

#### Sobre esse projeto

Esse projeto foi desenvolvido para a disciplina de Projeto de Banco de Dados da minha faculdade e possui fins unicamente acadêmicos. Eu aproveitei a necessidade de ter que desenvolver um projeto, para colocar em pratica a linguagem PHP e o Laravel que eu já vinha estudando a um tempo. A ideia desse projeto é ser um sistema web para a gestão de renda, aonde o usuário poderá cadastrar movimentações para ter um controle de seus gastos e seus ganhos.

<hr>

####  Tecnologias usadas nesse projeto

##### Front End

<ul>
    <li>HTML</li>
    <li>CSS</li>
    <li>Bootstrap</li>
    <li>Blade</li>
</ul>

##### Back end

<ul>
    <li>PHP</li>
    <li>Composer</li>
    <li>Laravel</li>
    <li>Laravel Excel</li>
    <li>MySQL</li>
</ul>

<hr>

#### Funcionalidades 

- [x] Enviar um formulário de pergunta (Entrar em contato)
- [x] Cadastrar-se
- [x] Logar-se
- [x] Cadastrar uma movimentação (Renda ou Despesa)
- [x] Cadastro um criptoinvestimento 
- [x] Visualizar movimentações
- [x] Exportar as movimentações para uma planilha no Excel
- [x] Visualizar Criptoinvestimentos

#### Sobre mim

Me chamo Mateus Cavalcanti, sou um aspirante a desenvolvedor web (Ou até já seja, não tenho certeza).  Sou acadêmico em análise e desenvolvimento de sistema e esse aqui é um dos projetos que eu desenvolvi, fique a vontade.

#### Execute na sua máquina

Gostou do projeto? Quer executar na sua máquina? 
É tranquilo!

Você só vai precisar ter o PHP na versão 7.4 ou superior
Laravel 8.0
Composer 
MySQL 

Instale as dependências com o comando:
> php composer.json install

Para a conexão com o banco de dados, clone o .env.example e altere as credenciais de conexão, feito isso crie um banco de dados com o nome 'finances-in-the-web' e execute todas as migrações com o comando:
>php artisan migrate

Depois levante o servidor através do comando:
>php artisan serve

Finalizado basta acessar a url: localhost:8000 e pronto, o projeto estará rodando em sua máquina \o