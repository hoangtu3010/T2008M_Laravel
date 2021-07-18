<?php
namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PHPUnit\Exception;

class ControllerProduct extends Controller
{
    public function home(){
        return view('home');
    }

    public function productList(){
        $products = Product::with("Category")->get();
        return response()->json([
            "status"=>true,
            "message"=>"Success",
            "products"=>$products
        ]);
    }


    public function listProduct(){
//        $products = DB::table("products")->get();
//        dd($products);

//        $products = Product::all();

        // Nối bảng để lấy tên category
//        $products = Product::leftJoin("categories", "categories_id", "=","products.category_id")->select("products.*","category.name as category_name")->get();


        // dùng relationship
        $products = Product::with("Category", "Brand")->simplePaginate(20);
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
//        $c = $request->get("category_id");
//        $now = Carbon::now();
//        DB::table("products")->insert([
//           "image"=>$i,
//           "name"=>$n,
//           "price"=>$p,
//           "qty"=>$q,
//           "description"=>$d,
//           "category_id"=>$c,
//           "created_at"=>$now,
//           "updated_at"=>$now
//        ]);
        $image = null;
        if ($request->has("image")){
            $file = $request->file("image");
//            $fileName = $file->getClientOriginalName(); // lấy tên file
            $exName = $file->getClientOriginalExtension(); // lấy đuôi file (vd: png, jpg, ...)
            $fileName = time().".".$exName;
            $fileSize = $file->getSize(); // lấy kích thước file
            $allow = ["png", "jpg", "jpeg", "gif"]; // chỉ cho phép những file này up lên
            if (in_array($exName, $allow)){ // nếu đuôi file trong danh sách cho phép
                if ($fileSize < 10000000){ // kích thước nhỏ hơn 10MB
                    try {
                        $file->move("upload", $fileName); // up file lên host
                        $image = $fileName;
                    }catch (\Exception $e){}
                }
            }
        }

        try {
            Product::create([
                "image"=>$image,
                "name"=>$request->get("name"),
                "price"=>$request->get("price"),
                "qty"=>$request->get("qty"),
                "description"=>$request->get("description"),
                "brand_id"=>$request->get("brand_id"),
                "category_id"=>$request->get("category_id")
            ]);
        }catch (\Exception $e){
            abort(404);
        }
        return redirect()->to("/admin/list-product");
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
//            "category_id"=>$request->get("category_id"),
//            "updated_at"=>Carbon::now()
//        ]);
        $item = Product::findOrFail($id);
        $item->update([
            "image"=>$request->get("image"),
            "name"=>$request->get("name"),
            "price"=>$request->get("price"),
            "qty"=>$request->get("qty"),
            "description"=>$request->get("description"),
            "brand_id"=>$request->get("brand_id"),
            "category_id"=>$request->get("category_id"),
        ]);
        return redirect()->to("/admin/list-product");

    }

    public function deleteProduct($id){
//        $item = DB::table("products")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-product");
//        DB::table("products")->where("id", $id)->delete();
        $item = Product::findOrFail($id);
        $item->delete($item);
        return redirect()->to("/admin/list-product");
    }

    public function addToCart($id){
        $product = Product::findOrFail($id);
        $cart = []; // mang trong gio hang
        if (Session::has("cart")){
            $cart = Session::get("cart");
        }

        if (!$this->checkCart($cart, $product)){ // sp chua co trong gio hang
            $product->cart_qty = 1; // them 1 thuoc tinh ngoai le de bieu thi so luong trong gio hang
            $cart[] = $product;
        }else{
            for ($i=0; $i<count($cart); $i++){
                if ($cart[$i]->id == $product->id){
                    $cart[$i]->cart_qty = $cart[$i]->cart_qty+1;
                }
            }
        }
        Session::put("cart",$cart);
        return redirect()->to("cart");
    }

    private function checkCart($cart, $p){
        foreach ($cart as $item){
            if ($item->id == $p->id){
                return true;
            }
        }
        return false;
    }
}
