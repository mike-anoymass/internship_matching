<?php 
    class CompanyView extends Company{
        public function get($id){
            return parent::get($id);
        }

        public function getAll(){
            return parent::getAll();
        }
    }
?>