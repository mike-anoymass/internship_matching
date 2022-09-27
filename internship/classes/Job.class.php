<?php 
    class Job extends Dbh{

        protected function insert($company_id, $title, $desc, $location, $category, $type,
         $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $positions){
            $sql = "INSERT INTO vacancies
                    (employer, title, description, location, field, type, salary,
                     duties, skills, qualifications, due_date, other_info, positions) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"; 
   
            $stmt = $this->connect()->prepare($sql);
 
            if($stmt->execute([$company_id, $title, $desc, $location, $category, $type,
            $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $positions])){
                return true;
            }
 
            return implode(":",  $stmt->errorInfo() );
        }

        protected function get($company_id){
            $sql = "SELECT * FROM vacancies v
                    Inner Join employer e on e.id=v.employer 
                    where v.employer=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$company_id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_NAMED);
            }

            return false;
        }

        protected function getJob($id){
            $sql = "SELECT * FROM vacancies v
                    Inner Join employer e on e.id=v.employer
                    where v.id=?";

            $stmt = $this->connect()->prepare($sql);
            
            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch(PDO::FETCH_NAMED);
            }

            return implode(":",$stmt->errorInfo());
        }

        protected function getAll(){
            $sql = "SELECT * FROM vacancies v
                    Inner Join employer e on e.id=v.employer
                    Order by v.id desc";
            $stmt = $this->connect()->query($sql);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_NAMED);
            }

            return false;
        }

        protected function update($id, $title, $desc, $location, $category, $type,
        $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $status, $positions){
            $sql = "UPDATE vacancies
                    SET title=?, description=?, location=?, field=?, type=?, salary=?, duties=?, 
                        skills=?, qualifications=?, due_date=?, other_info=?, status=?, positions=? 
                    WHERE id=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$title, $desc, $location, $category, $type,
            $salary, $duties, $skills, $qualifications, $closing_date, $other_info, $status, $positions, $id]);

            //echo  implode(":",  $stmt->errorInfo() );
        }

        protected function delete($id){
            $sql = "DELETE FROM vacancies WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Message => ". implode(":",  $stmt->errorInfo() );
        }

        protected function getJobForThisCategory($field){
            $sql = "SELECT * FROM vacancies v
            Inner Join employer e on e.id=v.employer 
            where v.field=?";

            $stmt = $this->connect()->prepare($sql);
            

            $stmt->execute([$field]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_NAMED);
            }

            return false;
        }

    }
?>