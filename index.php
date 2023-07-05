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
                    <h1>Hello Borel<i class="fa fa-user"></i></h1>
                </div>
            </div>
        </div>
    </div> 
    
    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });
    </script>                

<?php  include('includes/footer.php'); ?>     