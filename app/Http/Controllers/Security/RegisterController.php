<?php

declare(strict_types=1);

namespace App\Http\Controllers\Security;

use App\DTO\Security\RegisterUserDTO;
use App\Handlers\Security\RegisterUser;
use App\Http\Controllers\Controller;
use App\Http\Request\Security\RegisterRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(private readonly RegisterUser $registerUser)
    {
    }

    public function showRegistrationForm(): View
    {
        return view('security.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $dto = RegisterUserDto::from($request);

        $user = $this->registerUser->handle($dto);

        Auth::login($user);

        return redirect()->route('app.home');
    }
}
