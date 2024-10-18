
# Teste Prático

Este repositório contém um teste técnico com os seguintes objetivos:

- Cadastro de Produtos via API do Mercado Livre
- Integração com API do Mercado Livre

## Requerimentos
- Docker
  
## Passos

### 1. Clonar o repositório

Abra o terminal e execute o comando abaixo para clonar o repositório do GitHub:  
```bash
git clone https://github.com/calesj/destak-ferramentas-teste.git
```

### 2. Acessar o diretório do projeto

Após clonar o repositório, acesse o diretório do projeto:  
```bash
cd destak-ferramentas
```

### 3. Criar o arquivo `.env`

Copie o arquivo de configuração de exemplo `.env.example` e renomeie-o para `.env`:  
```bash
cp .env.example .env
```

### 4. Configurar o banco de dados e porta local que será utilizada para rodar o projeto:
```env (Coloque uma porta que não esteja sendo utilizada) caso contrário dará erro
APP_PORT=8080
```
No `.env` setei essas parâmetrizações, para o docker automaticamente lidar com o banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=user
DB_PASSWORD=password
```

### 5. Integração com o Mercado Livre

#### Preencher as informações da aplicação

No arquivo `.env`, adicione as credenciais da sua aplicação do Mercado Livre:

```env
ML_CLIENT_ID=
ML_CLIENT_SECRET=

# URL de Redirecionamento
ML_REDIRECT_URI=https://www.google.com.br
```

**Observação:** Optei por utilizar a URL do Google como redirect URI, já que o Mercado Livre não aceita `localhost` como parâmetro na criação da aplicação.

### 6. Buildar imagem docker

Execute o seguinte comando para buildar imagem docker:  
```bash
docker compose up -d --build
```

### 7. Instalar as dependências

Execute o seguinte comando para instalar as dependências do projeto via Composer:  
```bash
docker compose exec application composer install
```

### 8. Gerar a chave da aplicação

Execute o comando abaixo para gerar a chave da aplicação:  
```bash
docker compose exec application php artisan key:generate
```

### 9. Rodar as migrações do banco de dados

Execute o seguinte comando para rodar as migrações e criar as tabelas no banco de dados:  
```bash
docker compose exec application php artisan migrate
```

### 10. Acessar o projeto

Após configurar tudo, basta acessar o projeto no navegador em [http://localhost:8000](http://127.0.0.1:8000/). ou na porta que você estiver utilizando.

### 11. Login ou Cadastro

Faça login ou cadastre seu usuário. Para agilizar o processo, já configurei um usuário padrão criado nas migrations. Basta clicar em **Login**.

![Login](https://github.com/user-attachments/assets/b15eee4d-920e-4126-8500-8a6585bebc30)

### 12. Autenticação OAuth

Ao entrar, a primeira tela solicitará a autenticação via OAuth no Mercado Livre.

![Autenticação OAuth](https://github.com/user-attachments/assets/8a87f1d4-ebdd-405b-b13c-38e5804e29cd)

Clique no botão para acessar sua conta no Mercado Livre (caso não esteja logado) e autorizar a aplicação a ter acesso à sua conta.

### 13. Obter o código de autenticação

Após autorizar, você será redirecionado para o Google com um **código** na URL. Esse código é necessário para concluir a autenticação na aplicação. Copie o código conforme mostrado abaixo:

![Código de Autenticação](https://github.com/user-attachments/assets/7e70bd34-515a-4c99-abc2-0ffbda6b3e6a)

### 14. Trocar o código pelo Access Token

Agora, acesse a seguinte rota para trocar o código pelo **Access Token**:  
```http
http://destak-ferramentas.test/ml/access-token/{COLOQUE_O_CODIGO_AQUI}
```

Exemplo:  
```http
http://destak-ferramentas.test/ml/access-token/TG-67119f3b298fae0001f70a17-169590539
```

**Observação:** Caso demore muito, o código pode expirar, e você verá um erro. Nesse caso, será necessário repetir o processo de autenticação.

### 15. Publicar um produto

Se tudo ocorrer bem, você será redirecionado para o **Dashboard**. Clique em:  
**Produtos > Publicar Produto**

![Publicar Produto](https://github.com/user-attachments/assets/a71383bf-7e0f-4ed0-9d8c-fbdcd44a4265)

**Observação:** Preconfigurei um produto que certamente será publicado com sucesso. Caso altere algum campo, pode haver erros. Coloquei validações para exibir esses erros, mas vale lembrar que cada categoria pode exigir campos adicionais, dependendo do título que você escolher. A API do Mercado Livre utiliza o título como parâmetro e sugere uma categoria adequada automaticamente.

**Bonus:** Incluí a listagem de anúncios como um recurso adicional para o teste.
