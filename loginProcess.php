<?php 
session_start();
require "db.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    echo $role;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if ($role == 'mentor') {
            $query = "SELECT * FROM mentor_details WHERE email = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $mentor = $result->fetch_assoc(); 

                if (password_verify($password, $mentor['password'])) {
                    $_SESSION['first_name'] = $mentor['first_name'];
                    $_SESSION['last_name'] = $mentor['last_name'];
                    $_SESSION['college'] = $mentor['college'];
                    $_SESSION['mobile'] = $mentor['mobile'];
                    $_SESSION['email'] = $mentor['email'];
                    $_SESSION['id'] = $mentor['id'];
                    $_SESSION['mentor_logged_in'] = true;
                    echo '<script>alert("Login successful!"); window.location.href = "mentor_dashboard.php";</script>';
                } else {
                    echo '<script>alert("Invalid password. Please try again."); window.location.href = "loginPage.php";</script>';
                }
            } else {
                echo '<script>alert("No user found with that email."); window.location.href = "loginPage.php";</script>';
            }
        } else 
        if(($role == 'super-admin')){
            echo '<script>alert("Work in Progress"); window.location.href = "loginPage.php";</script>';
        }
        else{
            echo '<script>alert("Invalid Role"); window.location.href = "loginPage.php";</script>';
        }
    } else {
        if(($role == 'super-admin')){
            $query = "SELECT * FROM admin_details WHERE username = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s', $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $admin = $result->fetch_assoc(); 

                if ($password == $admin['password']) {
                    $_SESSION['admin_logged_in'] = true;
                    echo '<script>alert("Login successful!"); window.location.href = "admin_dashboard.php";</script>';
                } else {
                    echo '<script>alert("Invalid password. Please try again."); window.location.href = "loginPage.php";</script>';
                }
            } else {
                echo '<script>alert("No user found with that email."); window.location.href = "loginPage.php";</script>';
            }
        }
        echo '<script>alert("Invalid email Address"); window.location.href = "loginPage.php";</script>';
    }
}
