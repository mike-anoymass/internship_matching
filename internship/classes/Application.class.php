<?php 
    class Application extends Dbh{

        protected function insert($vacancy_id, $applicant_id, $cv){
            $sql = "INSERT INTO applications
                    (vacancy, applicant, cv) 
                    VALUES (?, ?, ?)"; 
   
            $stmt = $this->connect()->prepare($sql);
 
            if($stmt->execute([$vacancy_id, $applicant_id, $cv])){
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

        protected function getApplication($vacancy_id, $applicant_id){
            $sql = "SELECT * FROM applications
                    where vacancy=? and applicant=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$vacancy_id, $applicant_id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch();
            }

            return false;
        }

        protected function getApplicationOnce($id){
            $sql = "SELECT * FROM applications a
                    Inner Join applicants ap on a.applicant=ap.id
                    Inner Join vacancies v on a.vacancy=v.id 
                    Inner Join employer e on e.id=v.employer
                    where a.id=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetch(PDO::FETCH_NAMED);
            }

            return false;
        }

        protected function getApplicationsFor($applicant_id){
            $sql = "SELECT * FROM applications a
                    Inner Join vacancies v on a.vacancy=v.id
                    Inner Join employer e on e.id=v.employer
                    where a.applicant=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$applicant_id]);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_NAMED);
            }

            return false;
        }

        protected function getPendingApplications($company_id){
            $sql = "SELECT * FROM applications a
                    Inner Join vacancies v on a.vacancy=v.id
                    Inner Join employer e on e.id=v.employer
                    where v.employer=? and a.status=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$company_id, "Pending"]);

        
            return $stmt->rowCount();
        }

        protected function update($applicant_id, $status){
            $sql = "UPDATE applications
                    SET status=?, date_responded=NOW()
                    WHERE applicant=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$status, $applicant_id]);
        }

        protected function editStatus($id, $status){
            $sql = "UPDATE applications
                    SET status=?, date_responded=NOW()
                    WHERE id=?";

            $stmt = $this->connect()->prepare($sql);

            $stmt->execute([$status, $id]);
        }

        protected function delete($id){
            $sql = "DELETE FROM applications WHERE id=?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
            return "Deleting Message => ". implode(":",  $stmt->errorInfo() );
        }

        
    }
?>