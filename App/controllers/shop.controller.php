<?php
require_once './App/models/shop.model.php';
require_once './App/views/shop.view.php';
class ShopController
{
    private $model, $view, $genericView;

    public function __construct()
    {
        $this->model = new ShopModel();
        $this->view = new ShopView();
        $this->genericView = new GenericView();
    }

    public function showShopPage()
    {
        $shops = $this->model->getAllShops();
        $this->view->showShopPage($shops);
    }

    public function showShopPageAdministration()
    {
        AuthHelper::verify();
        if ($_POST) {
            foreach ($_POST as $value) {
                if (!isset($value) || empty($value)) {
                    $this->genericView->showError('the fields were not completed correctly');
                    header('Refresh: 5; URL=' . BASE_URL . 'addShop');
                    die();
                }
            }
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
}
