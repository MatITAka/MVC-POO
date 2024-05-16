<?php

    namespace App\controller;
    use App\model\ProductModel;

    class ProductController
    {
        private ProductModel $productModel;

        public function __construct(ProductModel $productModel)
        {
            $this->productModel = $productModel;
        }

        public function productList(): void
        {
            $products = $this->productModel->getProducts();


            $content = __DIR__ . '/../view/products.php';
            include __DIR__ . '/../view/layout.php';
        }

        /**
         * @throws \Exception
         */
        public function addProducts() :void {

            if (!isset($_SESSION['username'])){
                header('Location: /login');
            }
            else {
                $content = __DIR__ . '/../view/addProducts.php';
                include __DIR__ . '/../view/layout.php';

            }



            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
                $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
                $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
                $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);

                // Call the addProducts method on the ProductModel instance
                $this->productModel->addProducts($name, $price, $description, $type);

                header('Location: /addProducts');
            }
        }



    }
