<?php 
    class Job extends Dbh{

        protected function insert($company_id, $title, $desc, $location, $category, $type,
         $salary, $duties, $skills, $qualifications, $closing_date, $other_info){
            $sql = "INSERT INTO vacancies
                    (employer, title, description, location, field, type, salary,
                     duties, skills, qualifications, due_date, other_info) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
   
            $stmt = $this->connect()->prepare($sql);
 
            if($stmt->execute([$company_id, $title, $desc, $location, $category, $type,
            $salary, $duties, $skills, $qualifications, $closing_date, $other_info])){
                return true;
            }
 
            return implode(":",  $stmt->errorInfo() );
        }

        protected function get($company_id){
            $sql = "SELECT * FROM vacancies where employer=?";
            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$company_id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }

            return false;
        }

        protected function getJob($id){
            $sql = "SELECT * FROM vacancies where id=?";
            $stmt = $this->connect()->prepare($sql);
            
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }

            return false;
        }

        protected function getAll(){
            $sql = "SELECT * FROM vacancies Order by id desc";
            $stmt = $this->connect()->query($sql);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll();
            }

            return false;
        }

        protected function update($id, $title, $desc, $location, $category, $type,
        $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $status){
            $sql = "UPDATE vacancies
                    SET title=?, description=?, location=?, field=?, type=?, salary=?, duties=?, 
                        skills=?, qualifications=?, due_date=?, other_info=?, status=? 
                    WHERE id=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$title, $desc, $location, $category, $type,
            $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $status, $id]);

            //echo  implode(":",  $stmt->errorInfo() );
        }

        protected function delete($id){
            $sql = "DELETE FROM vacancies WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Message => ". implode(":",  $stmt->errorInfo() );
        }

        
    }
?>