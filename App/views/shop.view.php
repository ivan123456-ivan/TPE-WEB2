<?php
class ShopView
{
    public function showShopPage($shops)
    {
        $title = 'Shop Page';
        $showOptions = false;
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
    public function showProductForShop($products)
    {
        $title = 'Products for Shop';

        require './Templates/header.phtml';
        require './Templates/shopPage.phtml';
        require './Templates/footer.phtml';
    }
    public function showEditPage($shop)
    {
        $title = 'Edit Shop';
        require './Templates/header.phtml';
        require './Templates/editShopPage.phtml';
        require './Templates/footer.phtml';
    }
}
