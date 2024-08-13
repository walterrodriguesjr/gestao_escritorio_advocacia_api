
# Setup Docker Laravel 11 com PHP 8.3
[Assine a Academy, e Seja VIP!](https://academy.especializati.com.br)

### Passo a passo
Clone Repositório
```sh
git clone -b laravel-11-with-php-8.3 https://github.com/especializati/setup-docker-laravel.git app-laravel
```
```sh
cd app-laravel
```

Suba os containers do projeto
```sh
docker-compose up -d
```


Crie o Arquivo .env
```sh
cp .env.example .env
```

Acesse o container app
```sh
docker-compose exec app bash
```


Instale as dependências do projeto
```sh
composer install
```

Gere a key do projeto Laravel
```sh
php artisan key:generate
```

OPCIONAL: Gere o banco SQLite (caso não use o banco MySQL)
```sh
touch database/database.sqlite
```

Rodar as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://localhost:8000](http://localhost:8000)


CRIANDO USUARIO ADMINISTRADOR COM TOKEN
Configuração do Passport
Rode o comando para criar um cliente de acesso pessoal:

```sh
php artisan passport:client --personal
```

Acesse o Tinker:
```sh
php artisan tinker
```
Execute o comando dentro do Tinker:
```sh
$user = \App\Models\User::where('email', 'walterrjr.86@gmail.com')->first();
$client = \Laravel\Passport\Client::where('password_client', false)->first();
$token = $user->createToken('Admin Access Token', [], $client)->accessToken;
echo $token;
```


