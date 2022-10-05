<?php
    class MessageView extends Message{
        public function getMessagesFor($sender){
            return parent::getMessagesFor($sender);
        }
    }
?>