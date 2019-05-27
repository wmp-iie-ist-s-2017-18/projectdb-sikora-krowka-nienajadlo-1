# Project Manager

# Opis projektu:

### Cel projektu:

- Aplikacja służy do zarządzania projektami w danej firmie. Manager projektu w firmie może zarządzać projektem przez dodanie nowego projektu do realizacji, tworzenie grup pracowników, którzy będą realizować konkretny projekt. Manager może także dodawać nowe wiadomości jako informacje dotyczące firmy.

### Część logiczna po stronie bazy danych:

##### Fragment części logicznej został wyniesiony na bazę danych poprzez stworzenie odpowiednio:

- Funkcji __checkState__, która weryfikuje czy termin zakończenia projektu już minął. Funkcja:

> BEGIN
> RETURN IF(DATE(now())>(SELECT finish FROM project Where project.project_ID = ID_Project), "Closed", "Active");
> END

- Procedury __updateStates__, która nadaje projektowi nowy status - zależnie od tego czy termin minął czy nie. Jeżeli upłynie termin zakończenia projektu, to procedura ta nadaje status _Finished_. W przeciwnym wypadku procedura nadaje każdemu projektowi, którego termin realizacji nie minął status __Active__. Procedure: 

> BEGIN
> DECLARE x int DEFAULT 0;
> DECLARE y int DEFAULT 0;
> SET x = (SELECT MAX(project.project_ID) From project);
> WHILE x >= y DO
> UPDATE `project` SET `state`=stateCheck(y) WHERE project.project_ID =y;
> SET y = y + 1;
> END WHILE;
> END

### Działanie projektu:

- Podczas procesu rejestracji po prawidłowym skonfigurowaniu serwera pocztowego wysyłana jest na podany przy rejestracji adres email wiadomość zawierająca kod aktywacyjny, który umożliwa prawidłową aktywację konta. Skrypt zajmujący się wysłaniem wiadomości aktywacyjnej znajduje się w lokalizacji _PHP/addEmployee.php_.

- Podczas prawidłowego procesu rejestracji do bazy zostają dodane odpowiednie dane użytkownika wraz z hasłem, które szyfrowane jest szyfrem jednostronnym o bardzo wysokim poziomie bezpieczeństwa **BCRYPT**.

- W przypadku zapomnienia przez użytkownika hasła jest możliwe nadanie nowego hasła dla konta. Aby to zrobić należy przejść do zakładki _Sign in_ a następnie użyć opcji _Reset Password_. W formularzu należy podać adres email do konta, na który zostanie wysłany kod, który następnie należy podać w formularzu służącym do nadania nowego hasła. Jeżeli w bazie nie zostanie znaleziony adres email użytkownik zostanie o tym poinformowany i email z kodem nie zostanie wysłany.

- Wszystkie wiadomości email zostały odpowiednio ostylowane z użyciem **CSS** dla lepszej prezentacji wizualnej.

- Przeprowadzona została odpowiednia walidacja formularzy logowania oraz rejestracji w celu zabezpieczenia przed atakiem **_SQL Injection_**.

- Responsive Web Design zrealizowany został przy pomocy **_Bootstrap Grid System_**.

- Użyty system kontroli wersji - **GIT**.

### Licencje:

- Wykorzystane w projekcie pliki graficzne pochodzą z serwisu **_pixabay.com_**, będące na licencji **_Creative Commons 0_**. Są one zatem przeznaczone do ogólnego użytku, także komercyjnego. Nie jest przy tym wymagane podawanie autora ani umieszczanie informacji licencyjnej.

# Użyte technologie:

- **HTML 5**,
- **CSS 3**,
- **Preprocesor SASS**,
- **Bootstrap Framework**,
- **JavaScript**,
- **JQuery Framework**,
- **PHP**,
- **PDO Framework**,
- **MySQL**,
- **GIT**,

# Konto administratora:

- **Email**: _admin@gmail.com_
- **Hasło**: _zaq1@WSX_

# Konfiguracja serwera pocztowego:

### Do prawidłowego funkcjonowania serwera SMTP należy:

- Zainstalować najnowszą wersję **XAMPP**,

- Przejść do folderu _smtp-config_,

- Skopiować plik php.ini i podmienić orginalny plik w folderze xampp\php,

- Skopiować plik sendemail.ini i podmienić orginalny plik w folderze xampp\sendemail,

- Zrestartować Apache Server w panelu administracyjnym Xampp.

# Import bazy danych

Do prawidłowego działania aplikacji potrzebne jest zaimportowanie bazy danych. Aby to zrobic należy:

- Uruchomić w przeglądarce _localhost_ a następnie _phpMyAdmin_,
- Stworzyć nową bazę daych o nazwie **_projectmanager_**,
- Przejść do nowo utworzonej bazy danych a następnie do zakładki **_Import_**,
- W zakładce **_Import_** należy uruchomić okno do wybierania plików (przycisk _Wybierz plik_),
- W nowo otawrtym oknie należy przejść do folderu **_DATABASE_** i wybrać plik _projectmanager.sql_,
- Wybrać kodowanie **_UTF-8_** jeżeli domyślnie ustawione jest inne,
- Jeżeli okno dialogowe zamknie się należy kliknąć na przycisku _Wykonaj_.

##### Procedury i funkcje zawarte są w zakładkach Procedury lub Funkcje w pasku nawigacyjnym po lewej stronie w phpMyAdmin.
