### API cadastro de endereços

# Requerimentos
* PHP 7.4
* Composer (https://getcomposer.org/)
* MySQL

# Instalação

1. Instalar as dependências do projeto
```
composer install
```
2. Renomear o arquivo `.env.example` para `.env` no diretório raiz do projeto
```
cp .env.example .env
```
3. Gerar uma chave para a aplicação laravel
```
php artisan key:generate
```
4. Criar o banco de dados `laravel` e o banco de dados `laravel_test` utilizando o MySQL CLI
```
CREATE DATABASE laravel;
CREATE DATABASE laravel_test;
```

5. Verificar as credenciais do banco de dados nos arquivos `.env` e `.env.testing`
```
DB_CONNECTION=
DB_HOST=
DB_PORT=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

6. Execute as migrações do projeto
```
php artisan migrate
```

7. Iniciar o servidor
```
php artisan serve
```
# Documentação

1. Para gerar a documentação do projeto utilize o comando
```
php artisan scribe:generate
```

2. Acesse a documentação em
```
http://localhost:8000/docs
```

## Importando as cidades do estado

Para importar as cidades do estado para o banco de dados utilize o comando
```
php artisan cidades:importar
```
>**OBS**: Para escolher um estado especifico, informe a sigla do estado no comando, caso contrario, as cidades do estado de MG serão importadas.
```
php artisan cidades:importar SP
```

## Testes
1. Verifique se o banco de dados de testes está configurado corretamente em `.env.testing`

1. Para executar os testes utilize o comando
```
php artisan test --env=testing
```
