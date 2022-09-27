<?php 
    class Intern extends Dbh{
        protected function insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv){
            $id = $this->insertUser($email, $passwd, $type);
            if(is_numeric($id)){
                $sql = "INSERT INTO applicants
                    (id, firstname, lastname, gender , phone, program, graduation_year, 
                     about, email, field, cv) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
   
                $stmt = $this->connect()->prepare($sql);
    
                if($stmt->execute([$id, $fname, $lname, $gender, $phone, $prg, $year,
                $bio, $email, $category, $cv])){
                    return true;
                }

                $sql = "DELETE FROM users where id = ?";
                $stmt2 = $this->connect()->prepare($sql);
                $stmt2->execute([$id]);

                return implode(":",  $stmt->errorInfo() );
    
            }else{
                return $id;
            }

        }
 
        function insertUser($email, $password, $type){
             $sql = "INSERT INTO users
                     (email, password, type) 
                     VALUES (?, ?, ?)";
 
             $stmt = $this->connect()->prepare($sql);
             
             if($stmt->execute([$email, $password, $type])){
                 $sql = "select max(id) as max from users";
                 $stmt = $this->connect()->query($sql);
                 $data = $stmt->fetch();
                 return $data['max'];
             }
                     
             return implode(":",  $stmt->errorInfo() );;
        }

        protected function get($id){
            $sql = "SELECT * from applicants
            where id=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;
        }

        protected function getAll(){
            $sql = "SELECT * from applicants
            where status=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute(["not working"]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }
            return false;
        }

        protected function uploadImage($id, $img){
            $sql = "UPDATE applicants SET picture=? where id=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$img, $id]);
        }

        protected function uploadDoc($id, $name, $document){
            $sql = "INSERT INTO attachments
                    (applicant, name, document) 
                    VALUES (?, ?, ?)"; 
   
                $stmt = $this->connect()->prepare($sql);
    
                if($stmt->execute([$id, $name, $document])){
                    return true;
                }

                return implode(":",  $stmt->errorInfo() );
        }


        protected function getAttachments($id){
            $sql = "SELECT * from attachments
            where applicant=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }
            return false;
        }

        protected function getAttachment($id){
            $sql = "SELECT * from attachments
            where id=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;
        }


        protected function deleteAttachment($id){
            $sql = "DELETE FROM attachments where id=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }

        
    }
?>