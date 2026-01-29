# Taxi-application-admin-panel
A Taxi Admin Panel

🛠 TECH STACK

FRONTEND -> 

* HTML5
* Tailwind CSS
* JavaScript
* Blade Templates (Laravel Views)
* Chart.js (for analytics charts)
* Leaflet.js (for map integration)
            
BACKEND->   

* PHP (Laravel Framework)
* Laravel MVC Architecture
* Blade Components
* RESTful Routing & Controllers

DATABASE ->  

* MySQL / MariaDB
* Laravel Migrations & Seeders

DEVELOPMENT TOOLS ->    

* Laravel Herd (local server)
* VS Code
* GitHub (version control)


🧩 PROJECT MODEULES -> 

* Dashboard Overview, 
* Driver Profiles, 
* Vehicle Management, 
* Location Management, 
* Fare Setup, Charts & Statistics, 
* Live Map Integration using Leaflet, 
* Secure Database Operations using Laravel ORM (Eloquent)                       


⚙ INSTALLATION & SETUP (LOCAL)

* PHP
* Composer
* MySQL / MariaDB
* Laravel Herd 


STEPS -> 

git clone https://github.com/dev-rishitha/Taxi-application-admin-panel.git

cd Taxi-application-admin-panel

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

npm install

npm run dev

php artisan serve
