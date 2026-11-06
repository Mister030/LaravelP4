# Laravel periode 3 en 4

Laravel- en PHP-projecten van MBO Utrecht (Software Developer niveau 4, periode 3 en 4).

| Map | Wat het is | Stack |
| --- | --- | --- |
| [`Breezedemo`](Breezedemo) | Webapp voor een tandartspraktijk met inloggen, registreren en rollen: patiënt, tandarts, mondhygiënist, assistent en praktijkmanagement. Elke rol heeft een eigen dashboard en een middleware bepaalt wie wat mag zien | Laravel, Breeze, Blade, Tailwind |
| [`Periode 3`](Periode%203) | Eigen MVC-framework in pure PHP met CRUD voor vier onderdelen | PHP, MySQL, PDO |

## Breezedemo starten

```bash
cd Breezedemo
composer install
npm install && npm run build
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```
