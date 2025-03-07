<?php

declare(strict_types=1);

namespace App\DTO\Security;

use App\Http\Request\Security\RegisterRequest;

readonly class RegisterUserDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }

    public static function from(RegisterRequest $request): self
    {
        return new self(
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );
    }
}
