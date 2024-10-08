
# Setup Docker Laravel 11 com PHP 8.3

### Passo a passo
Clone Repositório
```sh
git clone https://github.com/walterrodriguesjr/gestao_escritorio_advocacia_api.git
```
```sh
cd gestao_escritorio_advocacia_api.git
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


Rodar as migrations
```sh
php artisan migrate
```

Acesse o projeto
[http://127.0.0.1:8000]

Instalando o laravel passport
```sh
php artisan passport:install
```

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


