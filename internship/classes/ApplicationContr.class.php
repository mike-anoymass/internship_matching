<?php 

    class ApplicationContr extends Application{
        public function insert($v_id, $a_id, $cv){
            return parent::insert($v_id, $a_id, $cv);
        }

        public function update($a_id, $status){
            parent::update($a_id, $status);
        }

        public function editStatus($id, $status){
            parent::editStatus($id, $status);
        }

        public function delete($id){
            return parent::delete($id);
        }
    }

?>