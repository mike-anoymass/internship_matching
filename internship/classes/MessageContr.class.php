<?php
    class MessageContr extends Message{
        public function insert($sender, $receiver, $subject, $body){
            return parent::insert($sender, $receiver, $subject, $body);
        }

        public function delete($id){
            parent::delete($id);
        }
    }
?>