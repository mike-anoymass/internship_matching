<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../../../inc/PHPMailer.php';
    require '../../../inc/SMTP.php';
    require '../../../inc/Exception.php';

    

    require_once "classAutoload.php";
    Session::start();

    if (isset($_POST)) {
        insert();
    }

    function insert()
    {
        $contr = new InterviewContr;
        $application = $_POST['application'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $remarks = $_POST['remarks'];

        $results = $contr->insert($application, $date, $time, $remarks);

        editApplication();

        sendEmail($application, $date, $time, $remarks);

        if($results) {
           echo $results;
        }else{
            echo '<div class="alert alert-danger alert-dismissible">
                        <a  href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
                $results . '</div>';
        }

    }

    function editApplication(){
        $contr = new ApplicationContr;
        $application = $_POST['application'];

        $contr->editStatus($application, "Accepted");
    }

    function  sendEmail($application, $date, $time, $remarks){
        
        $appl = new ApplicationView();
        $application = $appl->getApplicationOnce($application);
       // passing true in constructor enables exceptions in PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug output
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->Username = 'internshipmatching@gmail.com'; // YOUR gmail email
            $mail->Password = 'sfhvkciduaefluct'; // YOUR gmail password

            // Sender and recipient settings
            $mail->setFrom($application['email'][1], $application['name']);
            $mail->addAddress($application['email'][0], $application['firstname'] .' '. $application['lastname']);
            $mail->addReplyTo($application['email'][1], $application['name']); // to set the reply to

            // Setting the email content
            $mail->IsHTML(true);
            $mail->Subject = "Interview Invitation";
            $mail->Body = '<p>Hello <i>'.$application['firstname'] .' '. $application['lastname']. '</i></p>'.
                            '<p>Your application for the post of <b>'.$application['title'].'</b> that you applied on <i>'.
                            $application['date'][0]. '</i> has been accepted. </p>'.
                            '<p>Therefore, you are being invited to interviews that are scheduled to happen on <b>'.
                            $date. '</b> at <b>' . $time . '</b> </p>'.
                            '<p><i>'.$remarks.'</i></p><hr>
                            <code>Please Login to Internship Matching system inorder 
                              to see full details about this Interview Schedule or email '.
                            $application['name']. ' on '. $application['email'][1].'</code>'
                            ; 

            $mail->send();
            //echo "Email message sent.";
        } catch (Exception $e) {
            //echo "Error in sending email. Mailer Error: {$mail->ErrorInfo}";
        }


    }
?>
