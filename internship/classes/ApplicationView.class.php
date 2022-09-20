<?php
    class ApplicationView extends Application{
        public function getAll(){
            return parent::getAll();
        }

        public function get($id){
            return parent::get($id);
        }

        public function getJob($id){
            return parent::getJob($id);
        }
    }
?>