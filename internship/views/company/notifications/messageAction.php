<?php
    require_once "classAutoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../../inc/PHPMailer.php';
    require '../../../inc/SMTP.php';
    require '../../../inc/Exception.php';

    Session::start();

    if (isset($_POST['action']) && $_POST['action'] == "create") {
        insert();
    }

    if (isset($_POST['action']) && $_POST['action'] == "update") {
        update();
    }

    function update(){
        global $id,  $title, $desc, $location, $category, $type, $positions,
        $salary, $duties, $skills, $qualifications, $closing_date,  $other_info, $status;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $controller;

        $results = $controller->update($id, $title, $desc, $location, $category, $type,
                    $salary, $duties, $skills, $qualifications, $closing_date,  $other_info, $status, $positions);
       
        echo 1;
    }

    function insert()
    {
        global $applicant, $subject, $body, $sender;
        //to initialize the objects used to inserting data and
        // variables for getting submitted data from the insert form
        initializeVars();

        global $controller;

        $results = $controller->insert($sender, $applicant, $subject, $body);
        sendEmail();

        if($results){
            echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
            <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
                '. $results.
            '</div>';
        }
       

    }




    function initializeVars(){
        global $applicant, $subject, $body, $sender;

        //this objects will be used to insert and update user data
        global $controller;
        $controller = new MessageContr();

        //These literal variables wll be used get data from the insert and update form
        $applicant = $_POST['applicant'];
        $sender = Session::get('userVars', 'id');
        $subject = $_POST['subject'];
        $body = $_POST['body'];
    }


    function  sendEmail(){
        global $applicant, $sender, $subject, $body;
        
        $appl = new InternView();
        $receiver = $appl->get($applicant);

        $emp = new CompanyView;
        $employer = $emp->get($sender);

       // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = 'internshipmatching@gmail.com'; // YOUR gmail email
            $mail->Password = 'sfhvkciduaefluct'; // YOUR gmail password

            // Sender and recipient settings
            $mail->setFrom($employer['email'], $employer['name']);
            $mail->addAddress($receiver['email'], $receiver['firstname'] .' '. $receiver['lastname']);
            $mail->addReplyTo($employer['email'], $employer['name']); // to set the reply to

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = $subject;
            $mail->Body = $body; 

            $mail->send();
            //echo "Email message sent.";
        } catch (Exception $e) {
            //echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }


    }


?>
