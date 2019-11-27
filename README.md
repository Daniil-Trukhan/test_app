<p align="center">    
    <h1 align="center">Test APP</h1>
    <br>
</p>

REQUIREMENTS
------------

Для товаров возможности следующие:

1. GET /product/{id} — Получение информации о товаре
2. POST /product — Добавление нового товара
3. PUT /product/{id} — Редактирование товара
4. DELETE /product/{id} — Удаление товара

INSTALLATION
------------

docker-compose up -d

docker-compose run --rm php-fpm composer install

USAGE
------------

<a href="http://app.localhost">http:://app.localhost</a>