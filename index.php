<?php 
session_start();
include('includes/header.php');  
?>

    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php 
                        if(isset($_SESSION['message']))
                        { 
                            ?>
                            <!-- Alert -->
                            <div class="alert alert-warning alert-dismissible fade show shadow" role="alert">
                                <strong>Hey!</strong> <?= $_SESSION['message']; ?>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <!-- End -->
                            <?php
                            //we unset th session
                            unset($_SESSION['message']);
                        }
                    ?>  
                </div>
            </div>
        </div>
    </div>                 

<?php  include('includes/footer.php'); ?>     