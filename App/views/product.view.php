<?php
class ProductView
{
    public function showProductRegister($categories)
    {
        require './Templates/header.phtml';
        require './Templates/RegisterProduct.phtml';
        require './Templates/footer.phtml';
    }
}
