# Teste Prático
Este é um teste técnico, com os principais objetivos:
* Cadastro de Produtos via API do Mercado Livre
* Integração com API do Mercado Livre
## Passos
### Clonar o repositório
* Abra o terminal e execute o comando abaixo para clonar o repositório do GitHub: <br>
```git clone https://github.com/calesj/destak-ferramentas-teste.git```

* Acessar o diretório do projeto
Depois de clonar o repositório, acesse o diretório do projeto: <br>
```cd destak-ferramentas-teste```

* Instalar as dependências
Execute o seguinte comando para instalar as dependências do projeto via Composer: <br>
```composer install```

* Criar o arquivo .env
Copie o arquivo de configuração de exemplo .env.example e renomeie para .env: <br>
```cp .env.example .env```

* Gerar a chave da aplicação
Execute o comando abaixo para gerar a chave da aplicação: <br>
```php artisan key:generate```

* Configurar o banco de dados
Edite o arquivo .env e configure as informações de conexão com o banco de dados: <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=destak_ferramentas
DB_USERNAME=root
DB_PASSWORD=
```

* Rodar as migrações do banco de dados. Execute o seguinte comando para rodar as migrações e criar as tabelas no banco de dados: <br>
```php artisan migrate```

* Executar o servidor de desenvolvimento. Após configurar tudo, inicie o servidor local do Laravel com o comando:
```php artisan serve```

Agora você pode acessar o projeto no seu navegador em [http://localhost:8000](http://127.0.0.1:8000/).
### Integração com o mercado livre
## Passos
* Preencher as informações da sua aplicação do mercado livre no arquivo ```.env ``` : <br>
````
APP_ML_ID=
APP_ML_SECRET_KEY=
APP_ML_CODE=
````
