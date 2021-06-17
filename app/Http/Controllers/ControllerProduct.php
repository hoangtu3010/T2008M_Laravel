<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ControllerProduct extends Controller
{
    public function home(){
        return view('home');
    }

    public function listProduct(){
//        $products = DB::table("products")->get();
//        dd($products);

//        $products = Product::all();

        // Nối bảng để lấy tên category
//        $products = Product::leftJoin("categories", "categories_id", "=","products.categories_id")->select("products.*","categories.name as categories_name")->get();


        // dùng relationship
        $products = Product::with("Category", "Brand")->get();
        return view("products.list-product", [
            "products"=>$products
        ]);
    }

    public function addProduct(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('products.add-product', [
            "categories" => $categories,
            "brands" => $brands
        ]);
    }

    public function saveProduct(Request $request){
//        $i = $request->get("image");
//        $n = $request->get("name");
//        $p = $request->get("price");
//        $q = $request->get("qty");
//        $d = $request->get("description");
//        $c = $request->get("categories_id");
//        $now = Carbon::now();
//        DB::table("products")->insert([
//           "image"=>$i,
//           "name"=>$n,
//           "price"=>$p,
//           "qty"=>$q,
//           "description"=>$d,
//           "categories_id"=>$c,
//           "created_at"=>$now,
//           "updated_at"=>$now
//        ]);
        try {
            Product::create([
                "image"=>$request->get("image"),
                "name"=>$request->get("name"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "description"=>$request->get("description"),
                "brands_id"=>$request->get("brands_id"),
                "categories_id"=>$request->get("categories_id")
            ]);
        }catch (\Exception $e){
            abort(404);
        }
        return redirect()->to("list-product");
    }

    public function editProduct($id){
//        $item = DB::table("products")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-product");
        $categories = Category::all();
        $brands = Brand::all();
        $item = Product::findOrFail($id);
        return view("products.edit-product", [
            "item" => $item,
            "categories"=>$categories,
            "brands"=>$brands

        ]);
    }

    public function updateProduct(Request $request, $id){
//        $item = DB::table("products")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-product");
//        DB::table("products")->where("id", $id)->update([
//            "image"=>$request->get("image"),
//            "name"=>$request->get("name"),
//            "price"=>$request->get("price"),
//            "qty"=>$request->get("qty"),
//            "description"=>$request->get("description"),
//            "categories_id"=>$request->get("categories_id"),
//            "updated_at"=>Carbon::now()
//        ]);
        $item = Product::findOrFail($id);
        $item->update([
            "image"=>$request->get("image"),
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "qty"=>$request->get("qty"),
            "description"=>$request->get("description"),
            "brands_id"=>$request->get("brands_id"),
            "categories_id"=>$request->get("categories_id"),
        ]);
        return redirect()->to("list-product");

    }

    public function deleteProduct($id){
//        $item = DB::table("products")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-product");
//        DB::table("products")->where("id", $id)->delete();
        $item = Product::findOrFail($id);
        $item->delete($item);
        return redirect()->to("list-product");
    }



}
