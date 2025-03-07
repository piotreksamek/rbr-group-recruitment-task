# rbr-group-recruitment-task
Zadanie rekrutacyjne dla Grupa RBR.

Informacje techniczne:
PHP: 8.2
Laravel: 11.6
Docker: 27.3.1
Mysql: 9.2

## Konfiguracja projektu
1. Stworzenie sieci poprzez komendę: docker network create rbr-group-project
2. Stworzenie docker-compose.override.yaml na wzór docker-compose.override.yaml.dist.
3. (Opcjonalnie) Zmienienie portów w docker-compose.override.yaml
4. Uruchomienie komendy docker compose build
5. Uruchomienie komendy docker compose up -d
6. Uruchomienie komendy docker compose exec rbr-group-php composer install
7. Uruchomienie komendy docker compose exec rbr-group-php php artisan migrate
