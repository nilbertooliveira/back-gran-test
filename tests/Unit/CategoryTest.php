<?php

namespace Tests\Unit;

use App\Domains\Interfaces\Repositories\IUserRepository;
use App\Infrastructure\Database\Models\User;


use Tests\TestCase;


class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {

        /**
         * @var IUserRepository $userRepository
         */
        $userRepository = app(IUserRepository::class);


        $user = $userRepository->findByEmail('administrator@test.com.br');

        //$token = $user->createToken('token')->plainTextToken;

        $this->login($user);

        $token = $this->getAccessToken($user);

        $data = [
            'name' => 'Automoveis' . random_int(1, 9),
            'description' => 'Veiculos automotores'
        ];

        $response = $this->postJson('api/v1/category', $data, ['Authorization' => "Bearer $token"]);

        $response->assertJson([
            'success' => true
        ]);
    }
}
