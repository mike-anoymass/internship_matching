<?php 
    class Application extends Dbh{

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

        protected function get($vacancy_id){
            $sql = "SELECT * FROM applications a
                    Inner Join applicants ap on a.applicant=ap.id
                    Inner Join vacancies v on a.vacancy=v.id
                    where a.vacancy=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$vacancy_id]);

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