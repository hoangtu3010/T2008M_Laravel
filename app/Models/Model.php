<?php
    namespace App\Models;

    interface Model{
        public function allList();
        public function save(array $data, $id);
        public function add(array $data);
        public function edit(array $data);
        public function delete($id);
    }
