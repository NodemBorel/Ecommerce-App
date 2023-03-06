<?php
session_start();

include('../config/dbcon.php');

if(isset($_POST['register_btn']))
{
    //mysqli_real_escape_string(); is for security (to prevent sql injection)
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    //check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email' ";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "email already registered";
        header('Location: ../register.php');
    }
    else
    {
        if($password == $cpassword){
            //insert user data
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name', '$email', '$phone', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);
    
            if($insert_query_run){
                $_SESSION['message'] = "registered successfully";
                header('Location: ../login.php');
            }
            else{
                $_SESSION['message'] = "something went wrong";
                header('Location: ../register.php');
            }
        }
        else{
            //we use session to display th message
            $_SESSION['message'] = "password do not match";
            header('Location: ../register.php');
        }
    }

    
}

?>