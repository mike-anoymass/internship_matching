<?php

    class Message extends Dbh{
        protected function insert($sender, $receiver, $subject, $body){
            $sql = "INSERT INTO messages 
                    (sender, receiver, subject, body)
                    VALUES 
                    (?, ?, ?, ?)";

            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$sender, $receiver, $subject, $body])){
                return true;
            }

            return implode(":",  $stmt->errorInfo() );
        }

        protected function getMessagesFor($company_id){
            $sql = 
                "SELECT * FROM messages m
                Inner join applicants a on m.receiver=a.id 
                WHERE sender=?
                ";

            $stmt = $this->connect()->prepare($sql);

            if($stmt->execute([$company_id])){
                return $stmt->fetchAll(PDO::FETCH_NAMED);
            }

            return false;
        }

        protected function delete($id){
            $sql = "DELETE FROM messages WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Message => ". implode(":",  $stmt->errorInfo() );
        }
    }

?>