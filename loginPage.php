<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
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

        .c-black {
            color: black;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 15px;
            border-bottom: 8px;
            border-right: 8px;
            border-style: solid;
            font-family: "Oxanium", sans-serif;
        }

        .login-container h3 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: black;
            font-family: "Oxanium", sans-serif;
        }

        .login-container .inputBox {
            position: relative;
            width: 100%;
            margin-top: 10px;
        }

        .login-container .inputBox input,
        .login-container .inputBox textarea {
            width: 100%;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            border: none;
            border-bottom: 2px solid #333;
            outline: none;
            resize: none;
        }

        .login-container .inputBox span {
            position: absolute;
            Left: 0;
            padding: 5px 0;
            font-size: 16px;
            margin: 10px 0;
            pointer-events: none;
            transition: 0.5s;
            color: #948686;
        }

        .login-container .inputBox input:focus~span,
        .login-container .inputBox input:valid~span,
        .login-container .inputBox textarea:focus~span,
        .login-container .inputBox textarea:valid~span {
            color: #5C0F8B;
            font-size: 12px;
            transform: translateY(-20px);
        }

        .my-primary-btn {
            width: 100%;
            border-radius: 8px;
        }

        .extra-links {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .extra-links a {
            font-size: 14px;
            color: #5C0F8B;
        }

        .dropdown-menu {
            border-radius: 8px;
        }

        .class-control {
            border-color: #f4f7f6;
        }
    </style>
</head>

<body>

    <nav class="navbar" style="background-color: #5C0F8B;">
        <div class="container-fluid">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="https://ghrstu.edu.in/">
                <img src="./picture/ghrce-logo-white.png" alt="Error Loading" height="" width="100px">
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
                    <span class="heading-font">Raisoni Tech Hackathon</span>
                </a>

                <!-- Toggle Button for Mobile View (Right aligned) -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Center: Links with Dropdowns and Login/Register Button -->
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav c-black">
                        <!-- Dropdown: About RTH -->
                        <li class="nav-item dropdown">
                            <a class="nav-link c-black dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                About RTH
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                                <li><a class="dropdown-item" href="processFlow.php">RTH Process Flow</a></li>
                                <li><a class="dropdown-item" href="themes.php">RTH Themes</a></li>
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

    <div class="login-container">
        <h3>Login to Your Account</h3>
        <form method="POST" action="loginProcess.php">
            <!-- Email -->
            <div class="inputBox">
                <input type="email" name="email" id="email" value="admin@rjh" required>
                <span>Enter your email</span>
            </div>

            <!-- Password -->
            <div class="inputBox">
                <input type="password" name="password" id="password" value="pass" required>
                <span>Enter your password</span>
            </div>

            <!-- Role Dropdown -->
            <div>
                <div class="form-group" style="padding-top: 10px; padding-bottom: 20px;">
                    <select class="form-control" style="border-radius: 8px;" name="role" id="role" required>
                        <option selected disabled>Please Select Your Role</option>
                        <option value="super-admin">Super Admin</option>
                        <!-- <option value="institute-college">Institute/College</option> -->
                        <!-- <option value="team-leader">Team Leader</option> -->
                        <option value="mentor">Mentor</option>
                    </select>
                </div>
                <!-- Submit Button -->
                <button type="submit" class="btn my-primary-btn" name="loginBtn">Login</button>

                <!-- Extra Links (Register and Forget Password) -->
                <div class="extra-links">
                    <a href="registerPage.php">Register Now</a>
                    <a href="forgetPassword.php">Forget Password?</a>
                </div>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>