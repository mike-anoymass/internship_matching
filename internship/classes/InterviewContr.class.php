<?php 

    class InterviewContr extends Interview{
        public function insert($application, $date, $time, $remarks){
            return parent::insert($application, $date, $time, $remarks);
        }
    }

?>