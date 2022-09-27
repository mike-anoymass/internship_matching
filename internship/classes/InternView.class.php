<?php 
    class InternView extends Intern{
        public function get($id){
            return parent::get($id);
        }

        public function getAll(){
            return parent::getAll();
        }

        public function getAttachments($id){
            return parent::getAttachments($id);
        }

        public function getAttachment($id){
            return parent::getAttachment($id);
        }
    }
?>