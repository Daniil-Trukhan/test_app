<?php

declare(strict_types=1);

namespace app;

/**
 * Class Product
 *
 * @package app
 */
final class Product
{
    /**
     * @var int ID товара
     */
    private $id;
    /**
     * @var string Наименование
     */
    private $name;
    /**
     * @var int Цена товара.
     */
    private $price;

    /**
     * Product constructor.
     * @param int $id
     * @param string $name
     * @param int $price
     */
    public function __construct(int $id, string $name, int $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price)
    {
        $this->price = $price;
    }
}
