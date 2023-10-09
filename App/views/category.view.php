<?php
class CategoryView
{
    public function showCategoriesAdministration($categories, $wantEdit = null)
    {
        $title = 'Categories Administration';
        require './Templates/header.phtml';
        require './Templates/categoryAdministration.phtml';
        require './Templates/footer.phtml';
    }
}
