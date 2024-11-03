<?php
session_start();
require 'db.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files for sending emails
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';



// Handle form submission for OTP sending
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['sendOtp'])) {
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $college = $_POST['college'];

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Generate OTP
        $otp = rand(100000, 999999);

        // Store OTP in session for verification later
        $_SESSION['otp'] = $otp;
        $_SESSION['email'] = $email;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['college'] = $college;
        $_SESSION['role'] = 'Mentor';

        $query = "SELECT * FROM mentor_details WHERE email = '$email'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo '<script> alert("User Already Exist Try Again!"); window.location.href = "registerPage.php"; </script>';
        } else {


            $email = $_POST['email'];
            $mail = new PHPMailer(true);

            // Configure the mail server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';           // SMTP server address
            $mail->SMTPAuth = true;
            $mail->Username = 'abdulrahim74264@gmail.com'; // Your email username
            $mail->Password = 'iotg jqut wkks sjrt';       // Your email password (use an app-specific password if needed)
            $mail->SMTPSecure = 'ssl';                // Enable SSL encryption
            $mail->Port = 465;                        // Port for SSL

            // Set the sender's email and name
            $mail->setFrom('abdulrahim74264@gmail.com', 'Abdul Rahim');

            // Add the recipient's email (student's email)
            $mail->addAddress($email);

            // Set the email format to HTML
            $mail->isHTML(true);

            // Set the email subject
            $mail->Subject = "OTP for Registration";

            // Construct the email body with the student's login details
            $msg = 'Dear ' . strtoupper($first_name) . '<p> your one time password for registraion process is:</p>' .
                '<p>OTP: ' . $_SESSION['otp'] . '</p>';

            // Set the email message content
            $mail->Body = $msg;

            // Send the email

            // Send OTP
            if ($mail->send()) {
                $otp_sent = true;
                $message = "OTP sent successfully to " . $email;
            } else {
                $otp_sent = false;
                $message = "Failed to send OTP. Please try again.";
            }
        }
    } else {
        $otp_sent = false;
        $message = "Invalid email address.";
    }
}

function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}



// Handle OTP verification and form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verifyOtp'])) {
    $entered_otp = $_POST['otpInput'];

    $email = $_SESSION['email'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $mobile = $_SESSION['mobile'];
    $college = $_SESSION['college'];
    $role = "Mentor";
    $no_of_teams = 0;

    // Check if entered OTP matches the session OTP
    if ($entered_otp == $_SESSION['otp']) {
        // OTP is valid

        $registration_success = true;
        $message = "Registration successful! Wait we are redirecting to you on Login Page";


        // Clear session OTP after successful verification
        unset($_SESSION['otp']);
        $password = randomPassword();

        $mail = new PHPMailer(true);

        // Configure the mail server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';           // SMTP server address
        $mail->SMTPAuth = true;
        $mail->Username = 'abdulrahim74264@gmail.com'; // Your email username
        $mail->Password = 'iotg jqut wkks sjrt';       // Your email password (use an app-specific password if needed)
        $mail->SMTPSecure = 'ssl';                // Enable SSL encryption
        $mail->Port = 465;                        // Port for SSL
        $mail->setFrom('abdulrahim74264@gmail.com', 'Abdul Rahim');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = "Login Credentials";

        // Construct the email body with the student's login details
        $msg = 'Dear ' . strtoupper($first_name) . '<p> your one time password for registraion process is:</p>' .
            '<p>Username: ' . $email . '</p>' .
            '<p>Password: ' . $password . '</p>';

        // Set the email message content
        $mail->Body = $msg;


        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO mentor_details(email, first_name, last_name, mobile, college, role, password, no_of_teams) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssisssi', $email, $first_name, $last_name, $mobile, $college, $role, $hashedPassword, $no_of_teams);
        if ($stmt->execute()) {
            if ($mail->Send()) {
                echo '<script> alert("Registration successful!"); window.location.href = "loginPage.php"; </script>';
            }
        } else {

            echo '<script> alert("Error in Registration Try Again!"); window.location.href = "loginPage.php"; </script>';
        }
    } else {
        // OTP is invalid
        $registration_success = false;
        $message = "Invalid OTP. Please try again.";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .heading-font {
            font-family: "Playwrite GB S", cursive;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .font-style-text {
            font-family: "Oxanium", sans-serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }

        .register-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #efe4ff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .c-black {
            color: black;
        }

        .warning {
            background-color: #ffc107;
            padding: 15px;
            border-radius: 5px;
            color: #856404;
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            
        }

        .register-container h3 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <nav class="navbar" style="background-color: #5C0F8B;">
        <div class="container-fluid">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="https://ghrstu.edu.in/">
                <img src="https://ghrstu.edu.in/assets/images/ghru-nagpur.png" alt="" height="" width="100px">
            </a>

            <div class="d-flex">
                <a class="navbar-brand" href="index.php">
                    <img src="./picture/encarta-logo.png" alt="" height="" width="150px">
                    <!-- <img src="uploads\images\671fd3dce42cb1.48550005.png" alt="" height="50px" width="100px"> -->
                </a>
            </div>
        </div>
    </nav>

    <div style="background-color: #5C0F8B;">
        <nav class="navbar navbar-expand-lg " style="background-color: rgb(255, 251, 221); border:0px solid black; border-radius:23px 0px 23px 0px">
            <div class="container-fluid font-style-text">
                <!-- Left: Logo -->
                <a class="navbar-brand" href="index.php">
                    <span class="heading-font">Raisoni Junior Hackfest</span>
                </a>

                <!-- Toggle Button for Mobile View (Right aligned) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Center: Links with Dropdowns and Login/Register Button -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav c-black">
                        <!-- Dropdown: About RJH -->
                        <li class="nav-item dropdown">
                            <a class="nav-link c-black dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About RJH
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                <li><a class="dropdown-item" href="processFlow.php">RJH Process Flow</a></li>
                                <li><a class="dropdown-item" href="themes.php">RJH Themes</a></li>
                                <li><a class="dropdown-item" href="implementationTeam.php">Implementation Team</a></li>
                                <li><a class="dropdown-item" href="pastHackathons.php">Our Past Hackathons</a></li>
                            </ul>
                        </li>

                        <!-- Dropdown: Guidelines -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle c-black" href="#" id="guidelinesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Guidelines
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="guidelinesDropdown">
                                <li><a class="dropdown-item" href="./downloadable/Hackfest Booklet.pdf" target="_blank">For Institutes</a></li>
                                <li><a class="dropdown-item" href="./downloadable/Idea-Presentation-Format-SIH2023-College[1].pptx" target="_blank" rel="noopener noreferrer">Idea PPT</a></li>
                                <li><a class="dropdown-item" href="hackProcess.php">Hackathon Process</a></li>
                                <li><a class="dropdown-item" href="hackTimeline.php">Hackathon Timeline</a></li>
                            </ul>
                        </li>

                        <!-- Other Links -->
                        <li class="nav-item">
                            <a class="nav-link c-black" href="problemStatements.php">Problem Statements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-black" href="contactUs.php">Contact Us</a>
                        </li>
                    </ul>

                    <!-- Login/Register Button inside collapsible section -->
                    <div class="d-lg-none mt-2">
                        <!-- Hidden on larger screens, visible on mobile within collapsible area -->
                        <a href="loginPage.php" class="btn my-primary-btn w-100 cmn-button">Login/Register</a>
                    </div>
                </div>

                <!-- Login/Register Button visible only on larger screens -->
                <div class="d-none d-lg-flex">
                    <a href="loginPage.php" class="btn my-primary-btn">Login/Register</a>
                </div>
            </div>
        </nav>

    </div>



    <div class="warning">
            Only Mentors are allowed to register. Mentors can participate with more than one team.
        </div>

    <div class="register-container">
        <!-- Warning Message -->
        

        <!-- Display Message if Available -->
        <?php if (isset($message)): ?>
            <div class="alert alert-<?php echo isset($otp_sent) && $otp_sent ? 'success' : 'danger'; ?>">
                <?php echo $message; ?>
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#otpModal">VERIFY OTP</button>
            </div>
        <?php endif; ?>

        <!-- Form Heading -->
        <h3>Mentor Registration Form</h3>


        <form method="POST" action="">
            <!-- First Name -->
            <div class="form-group">
                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
            </div>

            <!-- Last Name -->
            <div class="form-group">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
            </div>

            <!-- Mobile Number -->
            <div class="form-group">
                <input type="tel" class="form-control" name="mobile" placeholder="Mobile Number" pattern="[0-9]{10}" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required>
            </div>

            <!-- Institute/College Dropdown -->
            <div class="form-group">
                <select class="form-control" name="college" required>
                    <option selected disabled>Please Select Your Institute/College</option>
                    <option>Ambedkar Jr College, Mor Bhavan</option>
                    <option>Anjuman College, Sadar</option>
                    <option>Bhavans School, Shrikrishna Nagar</option>
                    <option>Bishop Cotton, Sadar</option>
                    <option>Central Indian Public School, Kamptee Road</option>
                    <option>Delhi Public School, Kamptee Road</option>
                    <option>Delhi Public School, Off Dhabha Ring Road</option>
                    <option>Dharmapeth Science, Ambazari</option>
                    <option>Edify School, Kamptee Road</option>
                    <option>Hadas Junior College, Alankar Square</option>
                    <option>Hemant Jakate Jr College, Dighori</option>
                    <option>Hislop College, Civil Lines</option>
                    <option>Indian Olympiad School, Kamptee Road</option>
                    <option>Jain International School, Katol Road</option>
                    <option>K John, Asoli</option>
                    <option>LAD Jr College, Ambazari Road</option>
                    <option>M.K.H Sacheti Public School, Samarth</option>
                    <option>Modern School, Vidya Nagar</option>
                    <option>Mohta Science, Sakkardara / Medical Square</option>
                    <option>Nairs Essence International School, Hingana</option>
                    <option>Nandanwan Arts, Commerce & Science, CA Road</option>
                    <option>Palloti, Kamptee Road</option>
                    <option>School of Scholars, Wandongri / Pratap Nagar</option>
                    <option>Shivaji Science, Ajni</option>
                    <option>Somalwar Jr College, Ramdaspeth</option>
                    <option>Somalwar Junior College, Khamla</option>
                    <option>SFS, Seminary Hills</option>
                    <option>St. Xavier's High School, Hiwari Nagar</option>
                    <option>St Joseph Jr College (Girls), Sadar</option>
                    <option>St Paul Junior College, Manewada</option>

                </select>
            </div>
            <!-- Send OTP Button -->
            <button type="submit" class="btn my-primary-btn w-100" name="sendOtp" id="registerButton">Register</button>


        </form>
    </div>



    <!-- OTP Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="otpInput" class="form-label">Enter OTP</label>
                            <input type="text" class="form-control" name="otpInput" placeholder="Enter OTP" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3" name="verifyOtp" id="verifyBtn">Verify OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('registerButton').addEventListener('click', function() {
            // Disable the register button to prevent multiple requests
            setTimeout(() => {
                document.getElementById('registerButton').disabled = true;
            }, 500)
        });
    </script>

</body>

</html>