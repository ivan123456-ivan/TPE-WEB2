<?php
class ShopView
{
    public function showShopPage($shops)
    {
        $title = 'Shop Page';
        require './Templates/header.phtml';
        require './Templates/shop.phtml';
        require './Templates/footer.phtml';
    }

    public function showShopPageAdministration()
    {
        $title = 'Shops Administration';
        require './Templates/header.phtml';
        require './Templates/registerShop.phtml';
        require './Templates/footer.phtml';
    }
}
