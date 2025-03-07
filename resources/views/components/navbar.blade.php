<nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <a href="/" class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white"
                           aria-current="page">{{ __('messages.navbar.home') }}</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <div class="relative ml-3">
                    <div class="flex space-x-4">
                        @if(auth()->check())
                            <p class="text-white mt-1">{{ __('messages.navbar.logged_as') }}
                                : {{ auth()->user()->name }}</p>

                            <a href="{{ route('logout') }}"
                               class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">{{ __('messages.navbar.logout') }}</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">{{ __('messages.navbar.login') }}</a>
                            <a href="{{ route('app.security.showRegistrationForm') }}"
                               class="rounded-md bg-gray-900 px-3 py-2 text-sm font-medium text-white">{{ __('messages.navbar.register') }}
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
