<?php
session_start();

if(isset($_SESSION['auth'])){

    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

 include('includes/header.php'); 
?>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if(isset($_SESSION['message']))
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
                    <div class="card shadow-lg">
                        <div class="card-header">
                            <h2>Login Form</h2>
                        </div>
                        <div class="card-body">
                        <form action="functions/authcode.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">                      
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <p></p>
                            <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                        </form>
                        </div>
                    </div>
                
                </div>
            </div>
    </div>
    </div>


<?php  include('includes/footer.php'); ?>     