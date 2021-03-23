# Uniasselvi - Cadastro de pedidos

### Instruções de como rodar a aplicação
### Pré-requisitos

Certifique-se de que você possui os seguintes serviços/softwares disponíveis no seu computador:

* PHP 7.0+;
* Composer;
* Apache;
* MySQL;
* Git;

### Configurando o banco de dados

Nesse projeto, existe um arquivo de nome `dump_tables.sql` com a estrutura das tabelas necessárias para rodar a aplicação. Faça o download desse arquivo em um local de fácil acesso, por exemplo na pasta `downloads`. Pelo terminal, acesse o MySQL e crie um banco de dados novo. O nome aqui é de escolha sua, podemos utilizar, por exemplo, `uniasselvi`. Após criar o banco de dados, saia do MySQL e faça a importação do arquivo `dump_tables.sql`. Vou deixar aqui abaixo o comando para fazer essa importação.
<br /><br />

```mysql -h HOST -u USUARIO -p BANCO_DE_DADOS < /caminho/ate/o/arquivo/dump.tables.sql```

Após realizar o comando acima, as tabelas serão importadas com êxito no banco de dados informado. Lembrando apenas que <b>HOST</b>, <b>USUARIO</b> e <b>BANCO_DE_DADOS</b> você precisará alterar de acordo como está configurado no seu MySQL, ok?

### Clonando o repositório

* Faça o clone desse repositório para uma pasta do seu computador utilizando o `git` com o comando `git clone git@github.com:gustakoch/uniasselvi-cadastro-de-pedidos.git`;
* Faça uma cópia do arquivo .env.example e renomeie para .env;
* Configure as variáveis ambiente de conexão ao banco de dados;
* No terminal, digite o comando `composer install` para instalar todas as dependências;
* Ainda no terminal, digite `php artisan key:generate`. O Laravel necessita de uma chave de registro única para rodar sua aplicação com mais segurança;
* E por fim, digite no terminal o comando `php artisan serve` para subir o servidor da aplicação. Provavelmente o endereço será algo como `http://localhost:8000`
* Acesse essa url no seu navegador para iniciar a aplicação;

### Usando a aplicação

Nesta aplicação você pode:
* Registrar um novo usuário;
* Fazer login na aplicação;
* Cadastrar clientes e produtos;
* Fazer pedidos vinculando 'n' produtos a um determinado cliente;
* Remover clientes, produtos e pedidos;
* Listagem de páginas na lista de produtos;

### Obrigado

Qualquer dúvida, estou à disposição.
