<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ControllerProduct extends Controller
{
    public function home(){
        return view('home');
    }

    public function listProduct(){
        $sp = new Product();
        $dssp = $sp->allList();
        return view('list-product')->with("dssp", $dssp);
    }

    public function addProduct(){
        return view('add-product');
    }

    public function saveProduct(){
//        $sp = new \Product();
//        if ($sp->save($_POST, $_POST["id"])){
//            return view('list-product');
//        }else{
//            echo "ERROR";
//        }
    }

    public function editProduct(){

        return view('edit-product');
    }

}
