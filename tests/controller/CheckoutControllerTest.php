<?php

    namespace tests\controller;

    use App\controller\CheckoutController;
    use PHPUnit\Framework\TestCase;


    class CheckoutControllerTest extends TestCase
    {

        public function setUp(): void
        {

        }


        public function testConstruct()
        {
            $checkoutController = new CheckoutController();
            $this->assertInstanceOf(CheckoutController::class, $checkoutController);
        }

        public function testIndex()
        {
            $checkoutController = new CheckoutController();
            $this->assertEquals('Checkout', $checkoutController->index());
        }

        public function testGetCheckout()
        {
            $checkoutController = new CheckoutController();
            $this->assertEquals('Checkout', $checkoutController->getCheckout());
        }


    }
