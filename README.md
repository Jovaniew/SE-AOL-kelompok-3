## Build Instructions

1. Install [XAMPP](https://www.apachefriends.org/).

2. Move the project folder to:
C:\xampp\htdocs\aol-se-kel3

3. Start Apache and MySQL from the XAMPP Control Panel.

4. Open http://localhost/phpmyadmin, create a database, and import phpprofilebodyguard.sql.

5. Edit `koneksi.php` with:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "aol_kel3";

Run the website with:
http://localhost/aol-se-kel3/
