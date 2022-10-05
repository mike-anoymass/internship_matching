<?php
    $msg = new MessageView;
    $messages = $msg->getMessagesFor(Session::get("userVars", "id"));
?>

<div class="container">
    <div class="row"> 

    <?php if($messages) { 
        foreach($messages as $message) { ?>
            <div class="col-lg-3 col-md-3 col-sm-9 col-10 m-auto">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $message['subject'] ?></h5>
                        <p class="card-text"><?php echo $message['body'] ?></p>
                        <code>To: <?php echo $message['firstname']." ".$message['lastname'] ?></code>
                        <?php if($message['response']){
                            echo "<p>Response: " . $message['response']. "<i> ,$message[response_date]</i></p>";
                        } ?>
                        <a class="delete-message" id="<?php echo $message['id'][0] ?>"><i class="fa fa-trash"></i></a>
                    </div>
                </div>         
            </div>
    <?php }} 
    else {
        echo "<h4 class='text-center'>:You have Zero messages</h4>";
    }
    ?>
    </div>

</div>