<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg">

<h1>Документы</h1>

<h2>Установка</h2>
<ul>
    <li>Клонировать репозиторий</li>
    <li>Перейменовать файл .env.example в .env и настроить в нем подключение к базе данных</li>
    <li>Установить composer (composer install)</li>
    <li>Установить ключ для Laravel (php artisan key:generate)</li>
    <li>Запустить миграции (php artisan migrate)</li>
    <li>Установить демо-данные в следующем порядке
        <p>php artisan db:seed --class="RolesTableSeeder"</p>
        <p>php artisan db:seed --class="DocumentsTableSeeder"</p>
        <p>php artisan db:seed --class="UsersTableSeeder"</p>        
    </li>    
</ul>

<span># В демо-данных по умолчанию создаются 2 пользователя admin c доступом (admin@gmail.com:123123) и user с доступом (user@gmail.com:123123)</span>