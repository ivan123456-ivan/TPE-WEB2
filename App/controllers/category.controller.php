<?php
require_once './App/models/category.model.php';
require_once './App/views/product.view.php';
require_once './App/views/category.view.php';
require_once './App/views/generic.view.php';
require_once './App/controllers/product.controller.php';
class CategoryController
{
    private $model, $viewProduct, $view, $genericView;

    public function __construct()
    {
        $this->genericView = new GenericView();
        $this->view = new CategoryView();
        $this->model = new CategoryModel();
        $this->viewProduct = new ProductView();
    }

    public function showCategories()
    {
        $categories = $this->model->getAllCategories();
        $this->viewProduct->showProductRegister($categories);
    }

    public function showCategoriesAdministration()
    {
        $categories = $this->model->getAllCategories();
        $this->view->showCategoriesAdministration($categories);
    }

    public function showEditCategory($id)
    {
        $categories = $this->model->getAllCategories();
        $this->view->showCategoriesAdministration($categories, $id);
    }

    public function updateCategory($id)
    {
        if ($_POST) {
            $name = $_POST['categoryName'];
            if (isset($name) && !empty($name)) {
                $this->model->updateCategory($name, $id);
                $this->genericView->showSuccess('category edited successfully');
                header('Refresh: 3; URL=' . BASE_URL . 'adminCategories');
            } else {
                $this->genericView->showError("could not edit category");
                header('Refresh: 5; URL=' . BASE_URL . 'adminCategories');
            }
        }
    }

    public function deleteCategory($id)
    {
        if ($id) {
            $this->model->deleteCategory($id);
            $this->genericView->showSuccess('category deleted successfully');
            header('Refresh: 3; URL=' . BASE_URL . 'adminCategories');
        } else {
            $this->genericView->showError("could not delete category");
            header('Refresh: 5; URL=' . BASE_URL . 'adminCategories');
        }
    }

    public function insertCategory()
    {
        if ($_POST) {
            $name = $_POST['categoryName'];
            if (isset($name) && !empty($name)) {
                $id = $this->model->insertCategory($name);
                if ($id) {
                    $this->genericView->showSuccess('category added successfully');
                    header('Refresh: 3; URL=' . BASE_URL . 'adminCategories');
                } else {
                    $this->genericView->showError("could not add category to the data base");
                    header('Refresh: 5; URL=' . BASE_URL . 'adminCategories');
                }
            } else {
                $this->genericView->showError('the fields were not completed correctly.');
                header('Refresh: 5; URL=' . BASE_URL . 'adminCategories');
            }
        }
    }
}
