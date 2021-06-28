<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ControllerCategory extends Controller {
    public function listCategory(){
//        $categories = DB::table("categories")->get(); // tra ve 1 list object StdClass
//        $categories = Category::all(); // trả về 1 array các object Category
//        $categories = Category::with("Product")
//        $categories = Category::withCount("Product")
//            ->where("category_id", "=", 1)
//            ->whereDate("created_at", "2021-06-18")
//            ->whereMonth("created_at", "6")
//            ->whereMonth("price", ">", 500)
//            ->where("name", "LIKE", "%Rolex%")
//            ->oderBy("price", "asc")
//            ->limit(1) // số lượng lấy
//            ->skip(1) // số lượng bỏ qua

        //Phân trang
        $categories = Category::with("Product")->paginate(10);
        return view("categories.list-category", [
            'categories' => $categories
        ]);
    }

    public function addCategory(){
        return view("categories.add-category");
    }

    public function saveCategory(Request $request){
        $n = $request->get("name");
//        $now = Carbon::now();
//        DB::table("categories")->insert([
//            "name" => $n,
//            "created_at" => $now,
//            "updated_at" => $now
//        ]);
        Category::create([
           "name"=>$n
        ]);
        return redirect()->to("/admin/list-category");
    }

    public function editCategory($id){
//        $item = DB::table("categories")->where("id", $id)->first(); // trả về null nếu không có
//        if ($item == null) return redirect()->to("list-category");
        $item = Category::findOrFail($id); // trả về 1 object Category, nếu ko tìm thấy sẽ sang trang 404
        return view("categories.edit-category", [
            "item" => $item
        ]);
    }

    public function updateCategory(Request $request, $id){
//        $item = DB::table("categories")->where("id", $id)->first(); // trả về null nếu không có
//        if ($item == null) return redirect()->to("list-category");
//        DB::table("categories")->where("id", $id)->update([
//           "name"=>$request->get("name"),
//            "updated_at"=>Carbon::now()
//        ]);
        $item = Category::findOrFail($id);
        $item->update([
           "name" => $request->get("name")
        ]);
        return redirect()->to("/admin/list-category");
    }

    public function deleteCategory($id){
//        $item = DB::table("categories")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-category");
//        DB::table("categories")->where("id", $id)->delete();
        $item = Category::findOrFail($id);
        $item->delete([$item]);
        return redirect()->to("/admin/list-category");
    }
}
