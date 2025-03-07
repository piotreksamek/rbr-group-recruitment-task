# rbr-group-recruitment-task
## Zadanie rekrutacyjne dla: Grupa RBR.

### Informacje techniczne:
PHP: 8.2  
Laravel: 11.6  
Docker: 27.3.1  
Mysql: 9.2

## Konfiguracja projektu
1. Stworzenie sieci poprzez komendę: docker network create rbr-group-project
2. Stworzenie docker-compose.override.yaml na wzór docker-compose.override.yaml.dist.
3. (Opcjonalnie) Zmienienie portów w docker-compose.override.yaml
4. Uruchomienie komendy ```docker compose build```
5. Uruchomienie komendy ```docker compose up -d```
### Backend 
1. Uruchomienie komendy ```docker compose exec rbr-group-php composer install```
2. Uruchomienie komendy ```docker compose exec rbr-group-php php artisan migrate```
### Frontend
1. Uruchomienie komendy ```docker compose exec rbr-group-php npm install```
2. Uruchomienie komendy ```docker compose exec rbr-group-php npm run dev```

## Testowanie:
1. Dla operacji CRUD, na froncie aplikacji
2. Dla operacji, wysyłania powiadomienia email o końcu terminu zadania:
    - Ustawienie daty zadania na następny dzień
    - Uruchomienie komendy w nowym okienku terminala ```docker compose exec rbr-group-php php artisan schedule:work```
    - Uruchomienie komendy w nowym okienku terminala ```docker compose exec rbr-group-php php artisan queue:work```
3. Testowanie integracji z Google Calendar:
    - W konsoli Google stworzyć nowy projekt lub użyć istniejącego projektu
    - Dodać Google Calendar API do projektu i go włączyć
    - Utworzyć dane logowania - Konto usługi - dodać tylko nazwę konta usługi
    - Wejść w utworzone konto usługi i dodać nowy klucz JSON 
    - Umieszczenie pliku ```service-account-credentials.json``` w ```storage/app/google-calendar```
    - Udostępnienie kalendarza Google dla maila z ```service-account-credentials.json``` (client_email)
    - W widoku zadania kliknąć "Dodaj do kalendarza Google"
