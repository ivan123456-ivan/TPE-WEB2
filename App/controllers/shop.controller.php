<?php
require_once './App/models/shop.model.php';
require_once './App/views/shop.view.php';
require_once './App/models/product.model.php';
class ShopController
{
    private $model, $view, $genericView, $modelProduct;

    public function __construct()
    {
        $this->model = new ShopModel();
        $this->view = new ShopView();
        $this->genericView = new GenericView();
        $this->modelProduct = new ProductModel();
    }

    public function showShopPage()
    {
        $shops = $this->model->getAllShops();
        $this->view->showShopPage($shops);
    }

    public function showSpecificShop($product){
        $products = $this->modelProduct->getAllProductsForShop($product);
        $this->view->showProductForShop($products);
    }

    public function showShopPageAdministration()
    {
        AuthHelper::verify();
        if ($_POST) {
            GenericController::checkValuesPost();
            $nombre = $_POST['shopName'];
            $address = $_POST['shopAddress'];
            $shopImage = $_POST['shopImage'];
            $id = $this->model->insertShop($nombre, $address, $shopImage, $_SESSION['USER_ID']);
            if ($id) {
                $this->genericView->showSuccess('successful operation');
                header('Refresh: 5; URL=' . BASE_URL . 'shopPage');
            }
        } else {
            $this->view->showShopPageAdministration();
        }
    }

    public function deleteShop($id)
    {
        AuthHelper::verify();
        if ($id) {
            $this->model->deleteShop($id);
            $this->genericView->showSuccess('shop deleted successfully');
            header('Refresh: 3; URL=' . BASE_URL . 'dashboard');
        } else {
            $this->genericView->showError("could not delete shop");
            header('Refresh: 5; URL=' . BASE_URL . 'dashboard');
        }
    }

    public function editShop($id)
    {
        AuthHelper::verify();
        if ($id) {
            $shop = $this->model->getDataShop($id);
            $this->view->showEditPage($shop);
        }
    }

    public function updateShop($id)
    {
        if ($_POST) {
            GenericController::checkValuesPost();
            $name = $_POST['shopName'];
            $address = $_POST['shopAddress'];
            $image = $_POST['shopImage'];
            $this->model->updateShop($id, $name, $address, $image);
            $this->genericView->showSuccess('shop edited successfully');
            header('Refresh: 3; URL=' . BASE_URL . 'dashboard');
        }
    }
}
