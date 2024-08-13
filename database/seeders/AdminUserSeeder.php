<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criação do usuário
        $user = User::create([
            'name' => 'Admin',
            'email' => 'walterrjr.86@gmail.com',
            'password' => Hash::make('pmprparana'),
            'email_verified_at' => now(),
        ]);

        // Aqui estamos pulando a geração de token se o client não for encontrado
        $client = \Laravel\Passport\Client::where('personal_access_client', true)->first();

        if ($client) {
            $token = $user->createToken('Admin Access Token')->accessToken;
            $this->command->info('Admin access token: ' . $token);
        } else {
            $this->command->error('Personal access client not found. Token not generated.');
        }
    }
}




