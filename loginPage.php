<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f7f6;
        }

        .login-container {
            max-width: 400px;
            margin: 80px auto;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .login-container h3 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            border-radius: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn-primary {
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
        }

        .dropdown-menu {
            border-radius: 8px;
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

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="index.php">
                <span>RJH</span>
            </a>

            <!-- Toggle Button for Mobile View (Right aligned) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Center: Links with Dropdowns and Login/Register Button -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Dropdown: About RJH -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            About RJH
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="#">RJH Process Flow</a></li>
                            <li><a class="dropdown-item" href="#">RJH Themes</a></li>
                            <li><a class="dropdown-item" href="#">Implementation Team</a></li>
                            <li><a class="dropdown-item" href="#">Our Past Hackathons</a></li>
                        </ul>
                    </li>

                    <!-- Dropdown: Guidelines -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="guidelinesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Guidelines
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="guidelinesDropdown">
                            <li><a class="dropdown-item" href="#">For Institutes/Universities</a></li>
                            <li><a class="dropdown-item" href="#">Idea PPT</a></li>
                            <li><a class="dropdown-item" href="#">Hackathon Process</a></li>
                            <li><a class="dropdown-item" href="#">Hackathon Timeline</a></li>
                        </ul>
                    </li>

                    <!-- Other Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">Problem Statements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>

                <!-- Login/Register Button inside collapsible section -->
                <div class="d-lg-none mt-2">
                    <!-- Hidden on larger screens, visible on mobile within collapsible area -->
                    <a href="loginPage.php" class="btn btn-primary w-100">Login/Register</a>
                </div>
            </div>

            <!-- Login/Register Button visible only on larger screens -->
            <div class="d-none d-lg-flex">
                <a href="loginPage.php" class="btn btn-primary">Login/Register</a>
            </div>
        </div>
    </nav>




    <div class="login-container">
        <h3>Login to Your Account</h3>
        <form method="POST" action="loginProcess.php">
            <!-- Email -->
            <div class="form-group">
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
            </div>

            <!-- Password -->
            <div class="form-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password" required>
            </div>

            <!-- Role Dropdown -->
            <div class="form-group">
                <select class="form-control" name="role" id="role" required>
                    <option selected disabled>Please Select Your Role</option>
                    <option value="super-admin">Super Admin</option>
                    <option value="institute-college">Institute/College</option>
                    <option value="team-leader">Team Leader</option>
                    <option value="mentor">Mentor</option>
                </select>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary" name="loginBtn">Login</button>

            <!-- Extra Links (Register and Forget Password) -->
            <div class="extra-links">
                <a href="registerPage.php">Register Now</a>
                <a href="forgetPassword.php">Forget Password?</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>