<?php

/*
 * This file has been created by developers from BitBag.
 * Feel free to contact us once you face any issues or want to start
 * You can find more information about us on https://bitbag.io and write us
 * an email on hello@bitbag.io.
 */

declare(strict_types=1);

namespace Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Context\Shop;

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Sylius\Behat\Service\SharedStorageInterface;
use Tests\BitBag\SyliusMultiVendorMarketplacePlugin\Behat\Page\ShowProductPage;
use Webmozart\Assert\Assert;

class OrderContext extends RawMinkContext implements Context
{
    private ShowProductPage $productPage;

    private SharedStorageInterface $sharedStorage;

    public function __construct(
        ShowProductPage $productPage,
        SharedStorageInterface $sharedStorage,
    ) {
        $this->productPage = $productPage;
        $this->sharedStorage = $sharedStorage;
    }

    /**
     * @Then I should see :count orders
     */
    public function iShouldSeeOrders($count)
    {
        $page = $this->getSession()->getPage();
        $tableWrapper = $page->find('css', 'table');
        $orders = $tableWrapper->findAll('css', '.item');
        Assert::eq(count($orders), $count);
    }

    /**
     * @Given I complete checkout
     */
    public function iCompleteCheckout()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', 'button')->press();
    }

    /**
     * @Given I submit form
     */
    public function iSubmitForm()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I choose shipment
     */
    public function iChooseShipment()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I choose payment
     */
    public function iChoosePayment()
    {
        $page = $this->getSession()->getPage();
        $page->find('css', '.ui.large.primary.icon.labeled.button')->press();
    }

    /**
     * @Given I have :count products in cart
     */
    public function iHaveProductsInCart($count)
    {
        $products = $this->sharedStorage->get('products');
        for ($i = 1; $i <= $count; ++$i) {
            $slug = $products[$i]->getSlug();
            $this->productPage->open(['slug' => $slug]);
            $this->productPage->addToCart();
        }
        $this->sharedStorage->set('products', $products);
    }

    /**
     * @Given I click :button
     */
    public function iClickButton($button)
    {
        $this->getSession()->getPage()->pressButton($button);
    }
}