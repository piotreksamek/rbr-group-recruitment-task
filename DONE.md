# Dokumentacja – Zarządzanie Zadaniami

Moduł umożliwia zarządzanie zadaniami, ich udostępnianie, automatyczne powiadamianie o terminach oraz integrację z Google Calendar.

## Funkcjonalności
1. CRUD dla zadań 
   - Umożliwia tworzenie, edycję, usuwanie oraz wyświetlanie zadań.

2. Udostępnianie zadań
   - Możliwość udostępniania zadania osobom posiadającym specjalny token dostępu.

3. Automatyczne przypomnienia o terminie zadania
   - Wysyłka e-mail przypominającego o upływie terminu zadania.
   Mechanizm oparty na komendzie uruchamianej poprzez Scheduler, a następnie wrzucanej na kolejkę.

3. Historia zmian w zadaniach
   - Rejestrowanie zmian w zadaniach.
   - Możliwość przeglądania listy zmian oraz szczegółowego podglądu.
   Integracja z Google Calendar

4. Możliwość dodawania zadań do kalendarza Google użytkownika.

Dodatkowe informacje
Moduł wykorzystuje mechanizm kolejek oraz harmonogramowania zadań, zapewniając efektywne przetwarzanie operacji asynchronicznych.
