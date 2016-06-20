<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    private $shelf;
    private $basket;
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->shelf = new Shelf();
        $this->basket = new Basket($this->shelf);
    }

    /**
     * @Given there is a :arg1, which costs IDR50000
     */
    public function thereIsAWhichCostsIdr($product)
    {
       $this->shelf->setProductPrice($product, (int)50000);
    }

    /**
     * @When I add the :arg1 to the basket
     */
    public function iAddTheToTheBasket($product)
    {
        $this->basket->addProduct($product);
    }

    /**
     * @Then I Should have :arg1 product in the basket
     */
    public function iShouldHaveProductInTheBasket($count)
    {
        PHPUnit_Framework_Assert::assertCount(intval($count), $this->basket);
    }

    /**
     * @Then the overall basket price should be IDR90000
     */
    public function theOverallBasketPriceShouldBeIdr()
    {
        PHPUnit_Framework_Assert::assertSame(
            floatval(90000),
            $this->basket->getTotalPrice()
        );
    }

    /**
     * @Given there is a :arg1, which costs IDR150000
     */
    public function thereIsAWhichCostsIdr2($product)
    {
        $this->shelf->setProductPrice($product, (int) 150000);
    }

    /**
     * @Then I should have :arg1 product in the basket
     */
    public function iShouldHaveProductInTheBasket2($count)
    {
        PHPUnit_Framework_Assert::assertCount(intval($count), $this->basket);
    }

    /**
     * @Then the overall basket price should be IDR200000
     */
    public function theOverallBasketPriceShouldBeIdr2()
    {
        PHPUnit_Framework_Assert::assertSame(
            intval(200000),
            $this->basket->getTotalPrice()
        );
    }

    /**
     * @Given there is a :arg1, which costs IDR100000
     */
    public function thereIsAWhichCostsIdr3($product)
    {
        $this->shelf->setProductPrice($product, (int)100000);
    }

    /**
     * @Then I should have :arg1 products in the basket
     */
    public function iShouldHaveProductsInTheBasket($count)
    {
        PHPUnit_Framework_Assert::assertCount(intval($count), $this->basket);
    }
}
