<?php

class Basket implements \Countable {

	private $shelf;
	private $products;
	private $productsPrice = 0;

	public function __construct(Shelf $shelf)
	{
		$this->shelf = $shelf;
	}

	public function addProduct($product)
    {
        $this->products[] = $product;
        $this->productsPrice += $this->shelf->getProductPrice($product);
    }

    public function getTotalPrice()
    {
        return $this->productsPrice
            + ($this->productsPrice * 0.2)
            + ($this->productsPrice > 10 ? 20000 : 30000);
    }

    public function count()
    {
        return count($this->products);
    }
}
