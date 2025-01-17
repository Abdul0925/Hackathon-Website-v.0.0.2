<?php
require 'db.php';
$result2 = mysqli_query($conn, "SELECT * FROM notifications ORDER BY id DESC");
?>

<?php 
session_start();
//require "db.php";
if ($_SESSION['admin_logged_in'] != true) {
    header("location:loginPage.php");
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Admin Dashboard</title>
        <link rel="stylesheet" href="admin_dash_style.css">
        <style>

        .btn-primary {
            color: white;
            width: 80px;
            height: 40px;
            background-color: rgb(47, 141, 70);
            border-radius: 5px;
            border: none;
            margin-top: 10px;
            font-size: 15px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: rgb(31, 91, 46);
            color: white;
        }

        .btn-primary:active {
            box-shadow: 2px 2px 5px #fc894d;
            background-color: rgb(47, 141, 70);
        }
        
        .report-body .form-body .form-label{
            display: flex;
            flex-direction: column;
            margin-bottom: 10px;
        }

        .report-body .form-body .form-control{
            border-radius: 5px;
            width: 100%;
            height: 150px;
            padding-left: 10px;
            padding-top: 10px;
        }

        </style>
        
    </head>

    <body>
    
        <!-- for header part -->
        <header>

            <div class="logosec">
                <div class="logo">Admin</div>
                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">
            </div>

            <div>
                <H1>Add Notification</H1>
            </div>

            <div class="message">
                <div class="circle"></div>
                    <a href="show_notifications.php"><img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183322/8.png" class="icn" alt=""></a>
                <div class="dp">
                    <a href=""><img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp"></a>
                </div>
            </div>

        </header>

        <div class="main-container">
            <div class="navcontainer">
                <nav class="nav">
                    <div class="nav-upper-options">
                        <div class="nav-option option1">
                            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
                            <h3> Dashboard</h3>
                        </div>

                        <a href="" style="text-decoration: none;">
                            <div class="nav-option option2" style="color: black;">
                                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183323/10.png" class="nav-img" alt="blog">
                                <h3> Profile</h3>
                            </div>
                        </a>

                        <a href="logout.php" style="text-decoration: none;">
                            <div class="nav-option logout" style="color: black;">
                                <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210183321/7.png" class="nav-img" alt="logout">
                                <h3>Logout</h3>
                            </div>
                        </a>

                    </div>
                </nav>
            </div>

            <div class="main">
                <div class="report-container">
                    <div class="report-header">
                        <h1 class="recent-Articles">Add New Notifications</h1>
                    </div>

                    <div class="report-body">
                        <form action="add_noti_process.php" method="POST">
                            <div class="form-body">
                                <label for="notification" class="form-label">Enter New Notification:</label>
                                <textarea name="notification" id="notification" class="form-control" rows="4" placeholder="Type your notification here..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let menuicn = document.querySelector(".menuicn");
            let nav = document.querySelector(".navcontainer");

            menuicn.addEventListener("click", () => {
            nav.classList.toggle("navclose");
            })
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // When 'View Details' button is clicked
                $('.view-details-btn').click(function() {
                    var team_id = $(this).data('id'); // Get student ID from button data attribute
                    console.log(team_id)
                    // Make an AJAX request to fetch additional student details
                    $.ajax({
                        url: 'fetch_team_details.php',
                        type: 'POST',
                        data: {
                            id: team_id
                        },
                        success: function(data) {
                            // console.log(data);
                            // Insert student details into the modal
                            $('#student-details').html(data);

                            // Show the modal
                            $('#teamDetailsModal').modal('show');
                        }
                    });

                    // Set the delete button with the student ID
                    // $('#delete-btn').data('email', student-details);
                });
            });
        </script>
    </body>
</html>