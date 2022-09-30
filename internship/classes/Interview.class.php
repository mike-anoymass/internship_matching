<?php 

    class Interview extends Dbh{
        protected function insert($application, $date, $time, $remarks){
           $sql = "INSERT INTO interviews
                   (application, dateOfInterview, time, remark) 
                   VALUES (?, ?, ?, ?)"; 
  
           $stmt = $this->connect()->prepare($sql);

           if($stmt->execute([$application, $date, $time, $remarks])){
               return true;
           }

           return implode(":",  $stmt->errorInfo() );
       }

       protected function get($application_id){
           $sql = "SELECT * FROM interviews
                   where application=?";

           $stmt = $this->connect()->prepare($sql);

           $stmt->execute([$application_id]);

           if($stmt->rowCount() > 0){
               return $stmt->fetch();
           }

           return false;
       }
    }

?>