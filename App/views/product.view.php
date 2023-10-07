<?php
class ProductView
{
    public function showProductRegister($categories)
    {
        $title = 'Add Product';
        require './Templates/header.phtml';
        require './Templates/RegisterProduct.phtml';
        require './Templates/footer.phtml';
    }
}
