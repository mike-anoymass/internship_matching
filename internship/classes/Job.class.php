<?php 
    class Job extends Dbh{
        protected function getAll(){
            $sql = "SELECT * FROM vacancies ORDER BY id DESC";
            $stmt = $this->connect()->query($sql);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }

            return false;
        }

        
    }
?>