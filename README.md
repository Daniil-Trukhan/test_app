<p align="center">    
    <h1 align="center">Test APP</h1>
    <br>
</p>

REQUIREMENTS
------------

The minimum requirement by this project that your Web server supports PHP 7.3.0.

Для товаров возможности следующие:

1. GET /products/{id} — Получение информации о товаре
2. POST /products — Добавление нового товара
3. PUT /products/{id} — Редактирование товара
4. PATCH /products/{id} — Редактирование некоторых параметров товара
5. DELETE /products/{id} — Удаление товара

INSTALLATION
------------

docker-compose up -d

docker-compose run --rm php-fpm composer install

USAGE
------------

<a href="http://app.localhost">http:://app.localhost</a>