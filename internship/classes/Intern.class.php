<?php 
    class Intern extends Dbh{
        protected function insert($fname, $lname, $gender, $phone, $prg, $year, $category, $bio, $type,
        $email, $passwd, $cv){
            $id = $this->insertUser($email, $passwd, $type);
            
            $sql = "INSERT INTO applicants
                    (id, firstname, lastname, gender, program, graduation_year, 
                    phone, email, field, about, cv) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
   
            $stmt = $this->connect()->prepare($sql);
 
            if($stmt->execute([$id, $fname, $lname, $gender, $phone, $prg, $year,
             $phone, $email, $category, $bio, $cv])){
                return true;
            }
 
            return implode(":",  $stmt->errorInfo() );
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
                     
             return 0;
        }
    }
?>