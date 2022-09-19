<?php
    class JobView extends Job{
        public function getAll(){
            return parent::getAll();
        }

        public function get($id){
            return parent::get($id);
        }
    }
?>