<?php

return [
    'attributes' => [
        'email' => 'Email',
        'password' => 'Hasło',
        'name' => 'Imię',
        'due_date' => 'Termin',
    ],
    'min' => [
        'string' => 'Pole :attribute musi mieć co najmniej :min znaków.',
    ],
    'max' => [
        'string' => 'Pole :attribute musi mieć maksymalnie :max znaków.',
    ],
    'required' => 'Pole :attribute jest wymagane.',
    'email' => 'Podaj poprawny adres e-mail.',
    'unique' => 'Ten :attribute już istnieje w bazie danych.',
    'confirmed' => 'Pole nie pasuje do potwierdzenia.',
];
