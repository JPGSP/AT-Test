<?php

namespace App\Entity\Collection;

use App\Entity\Product;

class ProductCollection
{
    /**
     * @var array
     */
    private array $products = [];

    /**
     * @param Product $product
     * @return $this
     */
    public function add(Product $product): self
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * @return bool
     */
    public function hasProducts(): bool
    {
        return count($this->products) > 0;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->products);
    }
}