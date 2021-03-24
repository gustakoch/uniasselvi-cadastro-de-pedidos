# Uniasselvi - Cadastro de pedidos

### Instruções de como rodar a aplicação
### Pré-requisitos

Certifique-se de que você possui os seguintes serviços/softwares disponíveis no seu computador:

* PHP 7.0+;
* Composer;
* MySQL;
* Git;

### Configurando o banco de dados

Nesse projeto, existe um arquivo de nome `dump_tables.sql` com a estrutura das tabelas necessárias para rodar a aplicação. Faça o download desse arquivo em um local de fácil acesso, por exemplo na pasta `downloads`. Pelo terminal, acesse o MySQL e crie um banco de dados novo. O nome aqui é de escolha sua, podemos utilizar, por exemplo, `uniasselvi`. Após criar o banco de dados, saia do MySQL e faça a importação do arquivo `dump_tables.sql`. Vou deixar aqui abaixo o comando para fazer essa importação.
<br /><br />

```mysql -h HOST -u USUARIO -p BANCO_DE_DADOS < /caminho/ate/o/arquivo/dump_tables.sql```

Após realizar o comando acima, as tabelas serão importadas com êxito no banco de dados informado. Lembrando apenas que <b>HOST</b>, <b>USUARIO</b> e <b>BANCO_DE_DADOS</b> você precisará alterar de acordo como está configurado no seu MySQL, ok?

### Clonando o repositório

* Faça o clone desse repositório para uma pasta do seu computador utilizando o `git` com o comando `git clone git@github.com:gustakoch/uniasselvi-cadastro-de-pedidos.git`;
* Faça uma cópia do arquivo .env.example e renomeie para .env;
* Configure as variáveis ambiente de conexão ao banco de dados;
* No terminal, digite o comando `composer install` para instalar todas as dependências;
* Ainda no terminal, digite `php artisan key:generate`. O Laravel necessita de uma chave de registro única para rodar sua aplicação com mais segurança;
* E por fim, digite no terminal o comando `php artisan serve` para subir o servidor da aplicação. Provavelmente o endereço será algo como `http://localhost:8000`
* Acesse a url gerada no seu navegador, crie um novo usuário e depois faça login.

### Recursos a aplicação

Você pode:
* Registrar um novo usuário;
* Fazer login;
* Cadastrar clientes e produtos;
* Fazer pedidos vinculando 'n' produtos a um determinado cliente;
* Editar clientes, produtos e pedidos (este último somente o 'status');
* Remover clientes, produtos e pedidos;

### Obrigado

Qualquer dúvida, estou à disposição.
