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
    public function showProductPage($products){
        $title = 'Product Page';

        require './Templates/header.phtml';
        require './Templates/productPage.phtml';
        for ($i = 0; $i < count($products); $i++){
            
            require './Templates/product.phtml';
        
        }   
        require './Templates/footer.phtml';   

    //    'https://s3.abcstatics.com/media/gurme/2023/08/31/s/smash-burger.jpg-kbOC--940x529@abc.jpg'



    }
    public function showProductPageAdministration()
    {
        $title = 'Products Administration';
        require './Templates/header.phtml';
        require './Templates/RegisterProduct.phtml';
        require './Templates/footer.phtml';
    }
}
