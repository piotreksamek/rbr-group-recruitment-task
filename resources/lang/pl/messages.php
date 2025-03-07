<?php

return [
    'actions' => [
        'back' => 'Wróć',
        'save' => 'Zapisz',
        'view' => 'Podgląd',
        'update' => 'Zaktualizuj',
        'edit' => 'Edytuj',
        'delete' => 'Usuń',
        'filter' => 'Filtruj',
        'delete_filters' => 'Usuń filtry',
    ],
    'dashboard' => [
        'title' => 'Strona główna',
        'login' => 'Zaloguj się, aby zarządzać zadaniami',
        'hello' => 'Cześć',
    ],
    'navbar' => [
        'home' => 'Strona główna',
        'logged_as' => 'Zalogowany jako',
        'logout' => 'Wyloguj',
        'login' => 'Zaloguj',
        'register' => 'Zarejestruj',
        'tasks' => 'Zadania',
    ],
    'security' => [
        'login' => [
            'form' => [
                'label' => 'Zaloguj się',
                'email' => 'Email',
                'password' => 'Hasło',
            ],
        ],
        'register' => [
            'form' => [
                'label' => 'Zarejestruj się',
                'name' => 'Nazwa',
                'email' => 'Email',
                'password' => 'Hasło',
                'confirm_password' => 'Powtórz hasło',
            ]
        ]
    ],
    'task' => [
        'list' => [
            'title' => 'Lista zadań',
            'add' => 'Dodaj zadanie',
            'table' => [
                'name' => 'Nazwa',
                'description' => 'Opis',
                'priority' => 'Priorytet',
                'status' => 'Status',
                'due_date' => 'Termin',
                'actions' => 'Akcje',
            ],
        ],
        'history' => [
            'title' => 'Historia',
            'old_values' => 'Stare wartości',
            'new_values' => 'Nowe wartości',
            'table' => [
                'version' => 'Wersja',
                'show' => 'Pokaż',
            ],
        ],
        'filters' => [
            'priority' => 'Wybierz priorytet',
            'status' => 'Wbyierz status',
        ],
        'create' => [
            'title' => 'Dodaj zadanie',
            'form' => [
                'name' => 'Nazwa',
                'description' => 'Opis',
                'priority' => 'Priorytet',
                'status' => 'Status',
                'due_date' => 'Termin',
            ]
        ],
        'update' => [
            'title' => 'Edytuj zadanie',
        ],
        'view' => [
            'title' => 'Podgląd zadania',
            'generate_access_link' => 'Wygeneruj link dostępu',
            'access_link' => 'Link dostępu',
        ],
        'status' => [
            'label' => 'Status',
            'to_do' => 'Do zrobienia',
            'in_progress' => 'W trakcie',
            'done' => 'Zrobione',
        ],
        'priority' => [
            'label' => 'Priorytet',
            'low' => 'Niski',
            'medium' => 'Średni',
            'high' => 'Wysoki',
        ],
    ],
];
