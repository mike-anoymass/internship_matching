<?php 
    class InternContr extends Intern{
        function insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv){
            return parent::insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
            $email, $passwd, $cv);
        }

        public function uploadImage($id, $img){
            parent::uploadImage($id, $img);
        }

        public function uploadDoc($id, $name, $document){
            return parent::uploadDoc($id, $name, $document);
        }

        public function deleteAttachment($id){
            parent::deleteAttachment($id);
        }

        public function update($id, $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv){
            return parent::update($id, $fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
            $email, $passwd, $cv);
        }
    }
?>