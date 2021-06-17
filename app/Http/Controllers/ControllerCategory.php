<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ControllerCategory extends Controller {
    public function listCategory(){
//        $categories = DB::table("categories")->get(); // tra ve 1 list object StdClass
        $categories = Category::all(); // trả về 1 array các object Category
//        dd($categories);
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
        return redirect()->to("list-category");
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
        return redirect()->to("list-category");
    }

    public function deleteCategory($id){
//        $item = DB::table("categories")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-category");
//        DB::table("categories")->where("id", $id)->delete();
        $item = Category::findOrFail($id);
        $item->delete([$item]);
        return redirect()->to("list-category");
    }
}
