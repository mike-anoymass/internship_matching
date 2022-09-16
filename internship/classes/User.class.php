<?php 
    class User extends Dbh{
        protected function checkuser($email, $password){
            $sql = "SELECT * from users 
            where email=? and password=?";

            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email, $password]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }
            return false;
        }
    }

?>