<?
    session_start();
    if(isset($_POST["online_send"])){
        $online_name = filter_var(trim($_POST['online_name']),FILTER_SANITIZE_STRING);
        $online_phone = filter_var(trim($_POST['online_phone']),FILTER_SANITIZE_STRING);
        $online_email = filter_var(trim($_POST['online_email']),FILTER_SANITIZE_STRING);
        $online_time = filter_var(trim($_POST['online_times']),FILTER_SANITIZE_STRING);
        $online_course = filter_var($_POST['online_courses'],FILTER_SANITIZE_STRING);
        $online_car = filter_var($_POST['online_cars'],FILTER_SANITIZE_STRING);
        
        $_SESSION["online_name"] = $online_name;
        $_SESSION["online_phone"] = $online_phone;
        $_SESSION["online_email"] = $online_email;
        $_SESSION["online_times"] = $online_time;
        $_SESSION["online_courses"] = $online_course;
        $_SESSION["online_cars"] = $online_car;

        $error_name = "";
        $error_phone = "";
        $error_email = "";
        $error = false;

        if($online_name == ""){
            $error_name = "Write correct name";
            $error = true;
        }
        if($online_phone == ""){
            $error_phone = "Write correct phone";
            $error = true;
        }
        if($online_email == "" || !preg_match("/@/",$online_email)){
            $error_email = "Write correct email";
            $error = true;
        }

        if(!$error){
            // Sending information to mysql
            $mysql = new mysqli('localhost','root','','online-training-bd');
            $mysql -> query("INSERT INTO `online-users` (`name`, `phone`, `email`,`time`,`course`,`car`) VALUES('$online_name', '$online_phone', '$online_email','$online_time','$online_course','$online_car')");

            $mysql->close(); 

            header('Location: /thank-you.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Driving School</title>
    <!-- Style .css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Header .css -->
    <link rel="stylesheet" href="css/main-header.css">
    <!-- Responsive .css -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Footer .css -->
    <link rel="stylesheet" href="css/footer.css">
    <!-- Animate .css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Online .css -->
    <link rel="stylesheet" href="css/onlinetr.css">
    <!-- Fontawesome .css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Main page -->
    <main>
        <!-- Menu -->
        <div class="header">
            <div class="logotype">
                <a href="index.html" class="logo"><img id="logo_img" src="img/white-logo.svg" alt="logo" /></a>
            </div>
            <div class="main-header">
                <nav>
                    <ul id="navbar">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="#">Courses<i class="icofont icofont-simple-down"></i></a>
                            <ul>
                                <li><a href="courseA.html">Category A</a></li>    
                                <li><a href="courseB.html">Category B</a></li>
                                <li><a href="courseBC.html">Category BC</a></li>
                                <li><a href="courseC.html">Category C</a></li>
                                <li><a href="courseD.html">Category D</a></li>
                                <li><a href="courseE.html">Category E</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="#pric-id">Price</a></li>
                        <li><a href="#contact-id">Contacts</a></li>
                        <li><a href="online-training.php">Online learning</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </main>

    <!-- Forma -->
    <div class="training-container">
        <div class="training-block">
            <p class="train-header">If you want to study online then leave your details we will contact you</p>
            <form action="online-training.php" method="post">
                <label for="#">Name: </label>
                <input type="text" class="name-input" name="online_name"  value="<?= $_SESSION["online_name"]?>"><br>
                <span style="color:red; font-size:1.2rem;margin-left:350px"><?= $error_name?></span><br>

                <label for="#">Phone number: </label>
                <input type="text" name="online_phone" value="<?= $_SESSION["online_phone"]?>"><br>
                <span style="color:red; font-size:1.2rem;margin-left:350px"><?= $error_phone?></span><br>

                <label for="#">Email address: </label>
                <input type="text" name="online_email" value="<?= $_SESSION["online_email"]?>"><br>
                <span style="color:red; font-size:1.2rem;margin-left:350px"><?= $error_email?></span><br>

                <label for="#">Suitable time: </label>
                <select class="times-input" name="online_times" value="<?= $_SESSION["online_times"]?>">
                    <option value="time-9:00">9:00 AM</option>
                    <option value="time-12:00">12:00 PM</option>
                    <option value="time-03:00">03:00 PM</option>
                    <option value="time-04:00">06:00 PM</option>
                </select><br>

                <label for="#">Courses: </label>
                <select class="courses-input" name="online_courses" value="<?= $_SESSION["online_courses"]?>">
                    <option value="cat-A">Category A</option>
                    <option value="cat-B">Category B</option>
                    <option value="cat-BC">Category BC</option>
                    <option value="cat-C">Category C</option>
                    <option value="cat-D">Category D</option>
                    <option value="cat-E">Category E</option>
                </select><br>

                <label for="#">Kind of car: </label>
                <input class="r1" type="radio" name="online_cars" value="Mechanics" checked="checked"><span>Mechanics</span>
                <input class="r2" type="radio" name="online_cars" value="Automatic"><span>Automatic</span><br>

                <button class="send-btn" name="online_send" type="submit">Send</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div id="contact-id" class="footer-area">
        <div class="no1"></div>
        <div class="footer-widget">
            <h4 class="widget-title">О нас</h4>
            <div class="about-widget">
                <p>Our driving school is distinguished by the fact that we have vast experience about our graduation of students! 😊All of them are right now! And passed all the exams, no problem !!! This is the most important‼ ️ We have provided for all the most important events on obtaining rights!</p>
                <div class="widget-social fix">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-vk"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-widget f-w-2">
            <h4 class="widget-title">Contacts</h4>
            <div class="contact-widget">
                <h5>Our branches:</h5>
                <p>Maresyev St. 95, 105 office, Aktobe.</p>
                <h5>Теl: 8(7132)54-27-60</h5>
                <p>Ul 101 st. Brigade 8, 1 cabin, Aktobe.</p>
                <h5>Теl: 8(7132)55-67-18</h5>
                <p>St. A.Moldagulova 36, Aktobe.</p>
                <h5>Теl: 8(7132)57-14-29</h5>
                <h5 class="email">e-mail</h5>
                <p>
                    <a href="#">avto.08@mail.ru</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>