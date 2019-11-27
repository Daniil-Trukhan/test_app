<?php

declare(strict_types=1);

namespace app;

/**
 * Class ProductRepository
 *
 * @package app
 */
final class ProductRepository
{
    /**
     * @var array<int, Product>
     */
    private $products;

    /**
     * ProductRepository constructor.
     */
    public function __construct()
    {
        $this->products = [
            1 => new Product(1, 'Map', 100),
            2 => new Product(2, 'Book', 200),
            3 => new Product(3, 'Film', 300),
        ];
    }


    /**
     * Добавление товара.
     *
     * @param string $name
     * @param int $price
     * @return Product
     */
    public function add(string $name, int $price): Product
    {
        $nextId = array_key_last($this->products) + 1;
        $product = new Product($nextId, $name, $price);
        $this->products[$nextId] = $product;
        return $product;
    }


    /**
     * Удаление товара по ID.
     *
     * @param int $id
     * @throws \DomainException
     */
    public function deleteById(int $id): void
    {
        $product = $this->getById($id);
        if (!$product instanceof Product) {
            throw new \DomainException('Товар не найден.');
        }
        unset($this->products[$id]);
    }

    /**
     * Получение товара по ID.
     *
     * @param int $id
     * @return Product|null
     */
    public function getById(int $id): ?Product
    {
        if (array_key_exists($id, $this->products)) {
            return $this->products[$id];
        }
        return null;
    }

    /**
     * Обновление  товара.
     *
     * @param int $id
     * @param string $name
     * @param int $price
     */
    public function updateById(int $id, string $name, int $price): void
    {
        $product = $this->getById($id);
        if (!$product instanceof Product) {
            throw new \DomainException('Товар не найден.');
        }
        $product->setName($name);
        $product->setPrice($price);
        $this->products[$id] = $product;
    }
}
