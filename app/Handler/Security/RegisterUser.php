<?php

declare(strict_types=1);

namespace App\Handler\Security;

use App\DTO\Security\RegisterUserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterUser
{
    public function handle(RegisterUserDTO $dto): User
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
        ]);
    }
}
