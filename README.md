# Project Manager

- Opis projektu:

  - - Projekt służy do zarządzania projektami w danej firmie. Manager projektu w firmie może zarządzać projektem przez dodanie dowego projektu, tworzenie grup pracowników, którzy będą realizować konkretny projekt. Manager może także dodawać nowe wiadomości jako informacje dotyczące firmy.

  - - Podczas procesu rejestracji po prawidłowym skonfigurowaniu serwera pocztowego wysyłana jest na podany przy rejestracji adres email wiadomość zawierająca kod aktywacyjny, który umożliwa prawidłową aktywację konta. Skrypt zajmujący się wysłaniem wiadomości aktywacyjnej znajduje się w lokalizacji PHP/addEmployee.php.

  - - Podczas prawidłowego procesu rejestracji do bazy zostają dodane odpowiednie dane użytkownika wraz z hasłem, które szyfrowane jest szyfrem jednostronnym o bardzo wysokim poziomie bezpieczeństwa BCRYPT.

  - - W przypadku zapomnienia przez użytkownika hasła jest możliwe nadanie nowego hasła dla konta. Aby to zrobić należy przejść do zakładki Sign in a następnie użyć opcji Reset Password. W formularzu należy podać adres email do konta, na który zostanie wysłany kod, który następnie należy podać w formularzu służącym do nadania nowego hasła. Jeżeli w bazie nie zostanie znaleziony adres email użytkownik zostanie o tym poinformowany i email z kodem nie zostanie wysłany.

  - - Wszystkie wiadomości email zostały odpowiednio ostylowane z użyciem CSS dla lepszej prezentacji wizualnej.

  - - Przeprowadzona została odpowiednia walidacja formularzy logowania oraz rejestracji w celu zabezpieczenia przed SQL Injection.

  - - Użyty system kontroli wersji - GIT.

- Użyte technologie:

- - HTML 5,
- - CSS 3,
- - Preprocesor SASS,
- - Bootstrap Framework,
- - JavaScript,
- - JQuery Framework,
- - PHP,
- - PDO Framework,
- - MySQL,
- - GIT,

- Konto administratora:

  - - Email: admin@gmail.com
  - - Hasło: zaq1@WSX

- Konfiguracja serwera pocztowego należy:

- - Zainstalować najnowszą wersję XAMPP,

- - Przejść do folderu smtp_config,

- - Otworzyć plik readme.txt,

- - Postępować zgodnie z instrukcją zawartą w powyższym pliku.
