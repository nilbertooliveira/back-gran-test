<?php

namespace App\Application\Commands;

use App\Infrastructure\Database\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create User';

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => 'Qual o nome do usuario desejado?',
            'email' => 'Qual o email desejado?',
            'password' => 'Qual a senha desejada?',
        ];
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $email = $this->argument('email');
        $password = $this->argument('password');

        $model = User::create(
            [
                "name" => $name,
                "email" => $email,
                "password" => Hash::make($password)
            ]);

        $this->info('User create was successful!');

    }
}
