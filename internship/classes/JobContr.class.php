<?php
    class JobContr extends Job{
        public function insert($company_id, $title, $desc, $location, $category, $type,
         $salary, $duties, $skills, $qualifications, $closing_date,  $other_info){
            return parent::insert($company_id, $title, $desc, $location, $category, $type,
                                  $salary, $duties, $skills, $qualifications, $closing_date,  $other_info);
         }

         public function delete($id){
            return parent::delete($id);
         }

         public function update($id, $title, $desc, $location, $category, $type,
         $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $status){
            parent::update($id, $title, $desc, $location, $category, $type,
            $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $status);
         }
    }
?>