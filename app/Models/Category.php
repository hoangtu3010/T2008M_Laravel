<?php

namespace App\Models;

include_once "../database/databasepc.php";

use App\Models\Model;

class Category implements Model {
    public function allList()
    {
        $sql_txt = "select * from categories";
        return queryDB($sql_txt);
    }

    public function save(array $data, $id)
    {
        // TODO: Implement save() method.
    }

    public function add(array $data)
    {
        // TODO: Implement add() method.
    }

    public function edit(array $data)
    {
        // TODO: Implement edit() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

}
