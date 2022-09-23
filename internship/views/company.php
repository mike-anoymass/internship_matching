<?php 
    $comp = new CompanyView();
    $companies = $comp->getAll();
?>
    <section id="content">
        <?php if($companies) { ?>
            <div class="container content">     
            <!-- Service Blcoks -->  
            <div class="row">
                <?php 
                    foreach ($companies as $company ) { 
                ?>
                        <div class="col-sm-4 info-blocks">
                            <i class="icon-info-blocks fa fa-building-o"></i>
                            <div class="info-blocks-in">
                                <h3>
                                    <?php echo '<a
                                     href="index.php?q=hiring&search='.$company['id'].'&company='.$company['name'].'">'
                                    .$company['name'].'</a>';?>
                                </h3>
                                <p><?php echo $company['profile'];?></p>
                                <p>Address :<?php echo $company['postal_address'] ?></p>
                                <p>Email Address. :<?php echo $company['email']; ?></p>
                                <p>Contact No. :<?php echo $company['phone']; ?></p>
                            </div>
                        </div>

                <?php } ?>

    
    
            </div> 
            </div>
        <?php }else{ echo "<h3>:Companies are not available</h3>"; } ?>
    </section>