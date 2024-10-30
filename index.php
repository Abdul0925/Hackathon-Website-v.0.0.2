<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Raisoni Jr Hackathon 2024</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@200..800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .primary-bgpurple,
        .cmn-button,
        .cmn-white-button,
        .cmn-transparent-button {
            background-color: #5C0F8B;
        }

        .cmn-button {
            border: #5C0F8B;
        }

        .cmn-button:hover {
            border: #5C0F8B;
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

        .c-black {
            color: black;
        }

        .image-container {
            position: relative;
            width: 25%;
            border-radius: 23px;
            overflow: hidden;
            box-shadow: 5px 10px #9e16c3;
        }



        .image-container:hover {
            box-shadow: 5px 10px #5C0F8B;
        }

        .image-container img {
            width: 100%;
            height: auto;
        }

        .cover-container>p {
            padding: 10px 20px;
            margin: 50px;
        }

        .overlay-text1 {
            color: black;
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            padding: 10px 20px;
            margin: 50px;
            border-radius: 5px;
            background: hsl(0, 0%, 100%);
            padding: 16px 24px;
            position: relative;
            border-radius: 8px;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .01);
            cursor: default;

            &::after {
                position: absolute;
                content: "";
                top: 15px;
                left: 0;
                right: 0;
                z-index: -1;
                height: 100%;
                width: 100%;
                transform: scale(0.9) translateZ(0);
                filter: blur(15px);
                background: linear-gradient(to left,
                        #ff5770,
                        #e4428d,
                        #c42da8,
                        #9e16c3,
                        #6501de,
                        #9e16c3,
                        #c42da8,
                        #e4428d,
                        #ff5770);
                background-size: 200% 200%;
                animation: animateGlow 1.25s linear infinite;
            }
        }

        /* .hero-section {
            position: relative;
            background: url('./picture/cover_page.jpg') center/cover no-repeat;
            color: white;
            text-align: center;
            height: 70vh;
            }
            .hero-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
        }
        .hero-text {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            }
            .about-section, .why-section, .schedule-section, .themes-section, .experts-section, .testimonials-section, .sponsors-section {
                padding: 50px 0;
                }
                .section-title {
                    font-size: 2rem;
                    margin-bottom: 1rem;
                    text-align: center;
                    } */
        /* .hero-section { */
            /* position: relative; */
            /* background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('./picture/cover_page.jpg') center/cover no-repeat; */
            /* color: white; */
            /* height: 90vh; */
            /* display: flex; */
            /* align-items: center; */
            /* justify-content: center; */
            /* text-align: center; */
        /* } */

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            line-height: 1.2;
            animation: fadeInDown 1.5s ease-out;
        }

        .hero-section .btn {
            font-weight: 600;
            padding: 0.8rem 2rem;
            margin-left: 50px;
            border-radius: 50px;
            background: #5C0F8B;
            color: white;
            /* margin-top: 1.5rem; */
            transition: background 0.3s ease;
        }



        .hero-section .btn:hover {
            background: #9e16c3;
        }

        /* About Section */
        .about {
            padding: 60px 20px;
            background-color: #f6e8ff;
            text-align: center;
        }

        .about h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }

        .about p {
            font-size: 1.2rem;
            color: #666;
            max-width: 700px;
            margin: 0 auto;
        }

        /* Highlights Section */
        .highlights {
            padding: 60px 20px;
            display: flex;
            justify-content: space-around;
            background-color: #ffffff;
        }

        .highlights .highlight-item {
            flex: 1;
            padding: 20px;
            text-align: center;
        }

        .highlights h4 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #ff7a59;
            margin-bottom: 10px;
        }

        .highlights p {
            color: #555;
        }

        /* Event Schedule Section */
        .schedule {
            padding: 60px 20px;
            background: #f1f1f1;
        }

        .schedule h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .schedule ul {
            list-style: none;
            padding: 0;
            max-width: 800px;
            margin: 0 auto;
        }

        .schedule ul li {
            padding: 15px;
            font-size: 1.1rem;
            color: #555;
            border-bottom: 1px solid #ddd;
        }


        /* Why Section  */
        .why-section {
            padding: 60px 20px;
            background: #f7f9fc;
            color: #5C0F8B;
        }

        .why-section .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: black;
            text-align: center;
            margin-bottom: 40px;
        }

        .why-section .row {
            display: flex;
            justify-content: center;
        }

        .why-section .col-md-4 {
            flex: 1;
            padding: 20px;
            max-width: 300px;
            box-sizing: border-box;
        }

        .why-section h4 {
            font-size: 1.6rem;
            font-weight: 600;
            color: #9e16c3;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .why-section .text-muted {
            font-size: 1rem;
            color: #6501de;
            cursor: pointer;
        }

        .why-section .col-md-4:hover h4 {
            color: #5C0F8B;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }


        /* Testimonial Section */
        .testimonials {
            background: #b49a71;
            color: black;
            padding: 60px 20px;
            text-align: center;
        }

        .testimonials h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: black;
        }

        .testimonials p {
            font-size: 1.1rem;
            color: black;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Footer Section */
        footer {
            background: #333;
            color: #ffffff;
            padding: 40px 20px;
            text-align: center;
        }

        footer p {
            font-size: 0.9rem;
        }

        /* Keyframes for Animation */
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes animateGlow {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }


        /* Responsive Text Size */
        @media (max-width: 768px) {
            .image-container {
                width: 75%
            }

            .overlay-text1 {
                font-size: 1.5rem;
                padding: 8px 15px;
            }

            .cover-container>p {
                margin: 50px 15px 50px 15px;
                display: flex;
                justify-content: center;
            }

            .hero-content {
                display: flex;
                justify-content: center
            }

            .hero-content .btn {
                margin-left: 0px;
            }
        }

        @media (max-width: 768px) {
            /* .overlay-text1 {
                font-size: 1.5rem;
                padding: 8px 15px;
                } */
        }
    </style>
</head>


<body class="font-style-text">

    <nav class="navbar" style="background-color: #5C0F8B;">
        <div class="container-fluid">
            <!-- Left: Logo -->
            <a class="navbar-brand" href="https://ghrstu.edu.in/">
                <img src="https://ghrstu.edu.in/assets/images/ghru-nagpur.png" alt="" height="" width="100px">
            </a>

            <div class="d-flex">
                <a class="navbar-brand" href="index.php">
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
                    <span class="heading-font">Raisoni Junior Hackathon</span>
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
                                <li><a class="dropdown-item" href="#">RJH Process Flow</a></li>
                                <li><a class="dropdown-item" href="#">RJH Themes</a></li>
                                <li><a class="dropdown-item" href="#">Implementation Team</a></li>
                                <li><a class="dropdown-item" href="#">Our Past Hackathons</a></li>
                            </ul>
                        </li>

                        <!-- Dropdown: Guidelines -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle c-black" href="#" id="guidelinesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <a class="nav-link c-black" href="#">Problem Statements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link c-black" href="#">Contact Us</a>
                        </li>
                    </ul>

                    <!-- Login/Register Button inside collapsible section -->
                    <div class="d-lg-none mt-2">
                        <!-- Hidden on larger screens, visible on mobile within collapsible area -->
                        <a href="loginPage.php" class="btn btn-primary w-100 cmn-button">Login/Register</a>
                    </div>
                </div>

                <!-- Login/Register Button visible only on larger screens -->
                <div class="d-none d-lg-flex">
                    <a href="loginPage.php" class="btn my-primary-btn">Login/Register</a>
                </div>
            </div>
        </nav>

    </div>



    <div class="d-lg-flex d-block">
        <div class="m-5 image-container">
            <img src="https://i.pinimg.com/564x/08/ff/65/08ff655ded24544c02b0b22ce255df09.jpg" alt="Hackathon Image" width="50%">
        </div>
        <div class="cover-container">
            <div class="overlay-text1 font-style-text font-style-text">BE A PART OF THIS HACKATHON</div>
            <p><i>"the best way to predict the future is to invent it"</i></p>
            <header class="hero-section">
                <div class="hero-content">
                    <a href="#registration" class="btn btn-lg">Join the Challenge</a>
                </div>
            </header>
        </div>
    </div>

    <!-- <header class="hero-section">
        <div class="hero-content">
            <h1>Welcome to the RJH Hackathon – <br>Innovate. Collaborate. Compete.</h1>
            <a href="#registration" class="btn btn-lg">Join the Challenge</a>
        </div>
    </header> -->

    <!-- About Section -->
    <section class="about">
        <h2>About RJH Hackathon</h2>
        <p>"The RJH Hackathon is where creativity meets technology. Join us as we explore new ideas, solve real-world problems, and push the boundaries of what’s possible. Let’s bring your ideas to life!"</p>

    </section>

    <!-- Highlights Section -->
    <section class="highlights d-block d-lg-flex">
        <div class="highlight-item">
            <h4>48 Hours of Innovation</h4>
            <p>Continuous coding and brainstorming to create breakthrough solutions.</p>
        </div>
        <div class="highlight-item">
            <h4>Industry Mentorship</h4>
            <p>Guidance from top industry professionals and experts.</p>
        </div>
        <div class="highlight-item">
            <h4>Networking</h4>
            <p>Meet like-minded people from various backgrounds and skill levels.</p>
        </div>
    </section>


    <!-- Why Participate? -->
    <section class="why-section">
        <div class="container ">
            <h2 class="section-title">Why You Should Join</h2>
            <div class="row mt-4 text-center d-block d-lg-flex" style="justify-items: center;">
                <div class="col-md-4">
                    <h4>Win Amazing Prizes</h4>
                    <p class="text-muted">Cash rewards, tech gadgets, internship opportunities, and more.</p>
                </div>
                <div class="col-md-4">
                    <h4>Challenge Yourself</h4>
                    <p class="text-muted">Test your skills in a competitive, fast-paced environment.</p>
                </div>
                <div class="col-md-4">
                    <h4>Learn and Grow</h4>
                    <p class="text-muted">Gain insights from workshops and mentorships.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Schedule Section -->
    <section class="schedule">
        <h2>Event Timeline</h2>
        <ul>
            <li>Kick-Off Ceremony</li>
            <li>Workshop Sessions on Latest Tech Trends</li>
            <li>Dedicated Coding Time with Mentors</li>
            <li>Project Showcase and Judging</li>
            <li>Award Ceremony</li>
        </ul>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2>What Past Participants Say</h2>
        <p>"Last year’s hackathon changed my career path. I went from a student to a startup founder in six months!" - Alex S.</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 RJH Hackathon. All rights reserved.</p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>