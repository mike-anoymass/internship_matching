<?php
    class ApplicationView extends Application{
        public function getApplication($v_id, $a_id){
            return parent::getApplication($v_id, $a_id);
        }

        public function getApplicationOnce($id){
            return parent::getApplicationOnce($id);
        }

        public function get($id){
            return parent::get($id);
        }

        public function getApplicationsFor($id){
            return parent::getApplicationsFor($id);
        }
    }
?>