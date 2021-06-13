<?php
    namespace App\Models;

    include_once "../database/databasepc.php";

    use App\Models\Model;

    class Product implements Model {
        private $table = "products";
        private $primarykey = "id";
        protected $fillable = [
            "name",
            "price",
            "painted",
            "ncc"
        ];

        public function allList()
        {
            $sql_txt = "select * from $this->table";
            return queryDB($sql_txt);
        }

        public function add(array $data)
        {
            // TODO: Implement add() method.
        }


        public function save(array $data, $id)
        {
//            if ($id == ""){
//                $arr = [];
//                foreach ($this->fillable as $key){
//                    if ($key == "price"){
//                        $arr[] = $data[$key];
//                    }else{
//                        $arr[] = "'".$data[$key]."'";
//                    }
//                }
//                $txt = implode(",", $arr);
//                $sql_txt = "insert into $this->table (name, price, painted, ncc) values ($txt)";
//                return insertOrUpdateDB($sql_txt);
//            }else{
//                $arr = [];
//                foreach ($this->fillable as $key){
//                    if ($key == "price"){
//                        $arr[] = "price"."=".$data[$key];
//                    }else{
//                        $arr[] = $key."="."'".$data[$key]."'";
//                    }
//                }
//                $txt = implode(",", $arr);
//                $sql_txt = "update $this->table set $txt where id = $id";
////                var_dump($sql_txt);die($sql_txt);
//                return insertOrUpdateDB($sql_txt);
//            }
        }

        public function edit(array $data)
        {
//            if (!isset($_POST[$this->primarykey])){
//                $pr[$this->primarykey] = "";
//                $pr["name"] = "";
//                $pr["price"] = "";
//                $pr["painted"] = "";
//                $pr["ncc"] = "";
//                $title = "Thêm mới";
//                include "../resources/views/edit-product.blade.php";
//            }else{
//                $id = $_POST[$this->primarykey];
//                $sql_txt = "select * from $this->table";
//                $dssp = queryDB($sql_txt);
//                foreach ($dssp as $item){
//                    if ($item[$this->primarykey] == $id){
//                        $pr[$this->primarykey] = $item[$this->primarykey];
//                        $pr["name"] = $item["name"];
//                        $pr["price"] = $item["price"];
//                        $pr["painted"] = $item["painted"];
//                        $pr["ncc"] = $item["ncc"];
//                        $title = "Sửa thông tin";
//                        include "../resources/views/edit-product.blade.php";
//                    }
//                }
//            }
        }

        public function delete($id)
        {
            // TODO: Implement delete() method.
        }

    }
