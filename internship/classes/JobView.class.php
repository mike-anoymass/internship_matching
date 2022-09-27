<?php
    class JobView extends Job{
        public function getAll(){
            return parent::getAll();
        }

        public function get($id){
            return parent::get($id);
        }

        public function getJob($id){
            return parent::getJob($id);
        }

        public function getJobForThisCategory($field){
           return parent::getJobForThisCategory($field);
        }
    }
?>