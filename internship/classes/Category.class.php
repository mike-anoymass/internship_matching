<?php
    class Category extends Dbh{
        protected function getAll(){
            $sql = "SELECT * FROM field";
            $stmt = $this->connect()->query($sql);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }

            return false;
        }
    }
?>