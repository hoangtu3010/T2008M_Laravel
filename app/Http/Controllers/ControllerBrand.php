<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class ControllerBrand extends Controller
{
    public function listBrand(){
//        $brands = DB::table("brands")->get();
//        $brands = Brand::all();
        $brands = Brand::with("Product")->get();
        return view("brands.list-brand", [
            "brands"=>$brands
        ]);
    }

    public function addBrand(){
        return view("brands.add-brand");
    }

    public function saveBrand(Request $request){
//        $n = $request->get("name");
//        $now = Carbon::now();
//        DB::table("brands")->insert([
//            "name"=>$n,
//            "created_at"=>$now,
//            "updated_at"=>$now
//        ]);
        $n = $request->get("name");
        Brand::create([
           "name"=>$n
        ]);
        return redirect()->to("/admin/list-brand");
    }

    public function editBrand($id){
//        $item = DB::table("brands")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-brand");
        $item = Brand::findOrFail($id);
        return view("brands.edit-brand", [
            "item"=>$item
        ]);
    }

    public function updateBrand(Request $request, $id){
//        $item = DB::table("brands")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-brand");
//        DB::table("brands")->where("id", $id)->update([
//            "name"=>$request->get("name"),
//            "updated_at"=>Carbon::now()
//        ]);
        $item = Brand::findOrFail($id);
        $item->update([
            "name"=>$request->get("name")
        ]);
        return redirect()->to("/admin/list-brand");
    }

    public function deleteBrand($id){
//        $item = DB::table("brands")->where("id", $id)->first();
//        if ($item == null) return redirect()->to("list-brand");
//        DB::table("brands")->where("id", $id)->delete();
        $item = Brand::findOrFail($id);
        $item->delete();
        return redirect()->to("/admin/list-brand");
    }


}
