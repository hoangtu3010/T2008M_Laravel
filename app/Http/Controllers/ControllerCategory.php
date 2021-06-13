<?php

namespace App\Http\Controllers;

use App\Models\Category;

class ControllerCategory extends Controller {
    public function listCategory(){
        $c = new Category();
        $dscategory = $c->allList();
        return view("list-category")->with("dscategory", $dscategory);
    }

    public function addCategory(){
        return view("add-category");
    }

    public function editCategory(){
        return view("edit-category");
    }
}
