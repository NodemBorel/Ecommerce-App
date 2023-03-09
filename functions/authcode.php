<?php
session_start();

include('myfunctions.php');

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
else if(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0){
        //used for authentification
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        //store user data in session variable
        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1){
            $_SESSION['message'] = 'Welcomw to admin Dashboard';
            header('Location: ../admin/index.php');
        }
        else{
            redirect("../index.php", "Logged In Successfully");
        }
    }
    else{
        $_SESSION['message'] = 'invalid Credential';
        header('Location: ../login.php');
    }
}


?>