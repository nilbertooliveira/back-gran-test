<?php

namespace App\Application\Services;

use App\Domains\Interfaces\Repositories\IUserRepository;
use App\Domains\Interfaces\Services\IUserService;
use App\Infrastructure\Database\Models\User;
use Illuminate\Http\Request;

class UserService implements IUserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function store(Request $request): ResponseService
    {
        try {
            $user = $this->userRepository->store($request);

            $result = new ResponseService($user);
        } catch (\Throwable $e) {
            $result = new ResponseService($e->getMessage(), false);
        }
        return $result;
    }
}
