<?php

namespace Tests;

use App\Infrastructure\Database\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\DB;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        //$this->setTestingConnection();
    }

    protected function setTestingConnection()
    {
        if (app()->environment('testing')) {
            DB::connection('testing')->setAsDefault();
        }
    }

    public function login(User $user)
    {
        $this->actingAs($user);
    }

    public function getAccessToken(User $user): string
    {
        return $user->createToken('test-token')->plainTextToken;
    }
}
