<?php
class ProductView
{
    public function showProductRegister($categories)
    {
        $title = 'Add Product';
        require './Templates/header.phtml';
        require './Templates/registerProduct.phtml';
        require './Templates/footer.phtml';
    }
    public function showProductPage($products, $categories)
    {
        $title = 'Product Page';

        require './Templates/header.phtml';
        require './Templates/productPage.phtml';
        require './Templates/footer.phtml';
    }
    public function showProductPageAdministration($products, $categories, $shops)
    {
        $title = 'Products Administration';
        require './Templates/header.phtml';
        require './Templates/registerProduct.phtml';
        require './Templates/footer.phtml';
    }
}
