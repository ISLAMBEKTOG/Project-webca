<?
    $error_name = "Name";
    $error_phone = "Phone number";
    $error_email = "Email address";

    session_start();
    if(isset($_POST["send"])){
        $name = filter_var(trim($_POST['name']),FILTER_SANITIZE_STRING);
        $phone = filter_var(trim($_POST['phone']),FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
        
        $_SESSION["name"] = $name;
        $_SESSION["phone"] = $phone;
        $_SESSION["email"] = $email;

        $error = false;

        if($name == ""){
            $error_name = "Write correct name";
            $error = true;
        }
        if($phone == ""){
            $error_phone = "Write correct phone";
            $error = true;
        }
        if($email == "" || !preg_match("/@/",$email)){
            $error_email = "Write correct email";
            $error = true;
        }

        if(!$error){
            // Sending information to mysql
            $mysql = new mysqli('localhost','root','','register-bd');
            $mysql -> query("INSERT INTO `regis` (`name`, `phone`, `email`) VALUES('$name', '$phone', '$email')");

            $mysql->close(); 

            
            $_SESSION["name"] = "";
            $_SESSION["phone"] = "";
            $_SESSION["email"] = "";
            header('location: thank-you.php');
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
    <!-- Features .css -->
    <link rel="stylesheet" href="css/features.css"> 
    <!-- FunFact .css -->
    <link rel="stylesheet" href="css/funfact.css">
    <!-- Review .css -->
    <link rel="stylesheet" href="css/fiew.css">
    <!-- Instructors .css -->
    <link rel="stylesheet" href="css/instructor.css">
    <!-- Footer .css -->
    <link rel="stylesheet" href="css/footer.css">
    <!-- Price .css -->
    <link rel="stylesheet" href="css/pricing1.css">
    <!-- Questions .css -->
    <link rel="stylesheet" href="css/questions.css">
    <!-- Animate .css -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Forma .css -->
    <link rel="stylesheet" href="css/formaa.css">
    <!-- Fontawesome .css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
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
        
        <!-- Main-page -->
        <div class="main-block">
            <div class="no"></div>
            <div class="title-block">
                <p class="wow fadeInRight" data-wow-delay=".4s">IN ALL CATEGORIES</p>
                <h2 class="wow fadeInRight" data-wow-delay=".4s">Discounts <span>-30%</span></h2>
                <small class="wow fadeInRight" data-wow-delay=".4s">Own car park and training site</small>
                <button id="ex1"  class="button-1 wow fadeInUp" data-wow-delay=".6s">Sign up</button>
                <button class="button-2 wow fadeInUp" data-wow-delay=".6s"><a style="text-decoration: none;color: white;font-size: 1rem;" href="online-training.php">Online learning</a></button>
            </div>
        </div>
    </main>

    <!-- Features -->
    <div class="features">
        <div class="title wow fadeInUp" data-wow-delay=".6s">
            <p class="main-title">About Us</p>
            <p class="main-title-2">Driving school number 1 in Aktobe! 20 years on the market!</p>
            <i class="fab fa-suse"></i>
        </div>

        <!-- Features wrapper -->
        <!-- Left side -->
        <div class="features-wrapper features-1">
            <div class="single-feature wow fadeInLeft" data-wow-delay=".5s">
                <div class="icon"><i class="fas fa-file"></i></div>
                <div class="text fix">
                    <h4>All categories</h4>
                    <p>The possibility of training for a driver's license in all categories and subcategories</p>
                </div>
            </div>
            <div class="single-feature single-middle-1 wow fadeInLeft" data-wow-delay=".6s">
                <div class="icon"><i class="fas fa-car"></i></div>
                <div class="text fix">
                    <h4>Best cars</h4>
                    <p>Diverse rolling stock for practical driving skills training</p>
                </div>
            </div>
            <div class="single-feature single-feature-3 wow fadeInLeft" data-wow-delay=".7s">
                <div class="icon"><i class="fas fa-film"></i></div>
                <div class="text fix">
                    <h4>Online testing</h4>
                    <p>Full course of tests of traffic rules of the RK</p>
                </div>
            </div>
        </div>
        <!-- Image -->
        <div class="feature-image wow fadeInUp" data-wow-delay=".6s">
            <img src="img/car.png" alt="feature" />
        </div>
        <!-- Right side -->
        <div class="features-wrapper features-2">
            <div class="single-feature wow fadeInRight" data-wow-delay=".5s">
                <div class="icon"><i class="fas fa-user"></i></div>
                <div class="text fix-2">
                    <h4>Top teachers</h4>
                    <p>Highly qualified teachers with an experience of 25-30 years</p>
                </div>
            </div>
            <div class="single-feature single-middle-2 wow fadeInRight" data-wow-delay=".6s">
                <div class="icon"><i class="fas fa-hourglass-half"></i></div>
                <div class="text fix-2">
                    <h4>Exercise at a time convenient for you</h4>
                    <p>Flexible training schedule</p>
                </div>
            </div>
            <div class="single-feature wow fadeInRight" data-wow-delay=".7s">
                <div class="icon"><i class="fas fa-bullseye"></i></div>
                <div class="text fix-2">
                    <h4>Practical hourly pay</h4>
                    <p>Hourly pay for driving lessons</p>
                </div>
            </div>
        </div>
    </div>

    <!-- FunFact -->
    <div class="funfact-area">
        <div class="single-facts wow fadeInUp" data-wow-delay=".5s">
            <i class="fas fa-graduation-cap"></i>
            <h1 id="shethik-cifra1" class="counter plus">6500</h1>
            <p>Graduates</p>
        </div>
        <div class="single-facts wow fadeInUp" data-wow-delay=".5s">
            <i class="fas fa-user"></i>
            <h1 id="shethik-cifra2" class="counter">12</h1>
            <p>Teachers</p>
        </div>
        <div class="single-facts  wow fadeInUp" data-wow-delay=".5s">
            <i class="fal fa-history"></i>
            <h1 id="shethik-cifra3" class="counter">21</h1>
            <p>years on the market</p>
        </div>
        <div class="single-facts wow fadeInUp" data-wow-delay=".5s">
            <i class="fas fa-car"></i>
            <h1 id="shethik-cifra4" class="counter">12</h1>
            <p>auto for practice</p>
        </div>
    </div>

    <!-- Video Area -->
    <div class="video-area overlay overlay-black">
	    <div class="video-content">
            <a class="video-popup" href="https://www.youtube.com/watch?v=qy-3cenTgxQ"><i class="fal fa-play-circle"></i></a>
            <h3>Learning process</h3>
        </div>
    </div>

    <!-- Reviews -->
    <div class="review-container">
        <div class="title wow fadeInUp" data-wow-delay=".6s">
            <p class="main-title">REVIEWS</p>
            <i class="fab fa-suse"></i>
        </div>
        <div class="review-single fade">
            <p><i class="fas fa-quote-left"></i>Loved the driving instructor Alexander Ivanovich. A professional in his field, perfectly explains everything, is not rude. During all the driving I learned a lot, you really feel like a different person. I advise everyone to sign up for it, you won’t regret it, I used to have experience with private instructors. Alexander Ivanovich next to them- top</p>
            <div class="review-bottom">
                <div class="review-image">
                    <img src="img/testimonial/1.jpg" alt="">
                </div>
                <div class="review-title">
                    <span>Maksat Kuanyshovich</span>
                    <small>Rated by:</small>
                    <div class="rev-icons">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-single fade">
            <p><i class="fas fa-quote-left"></i>Good day! I want to express my gratitude to the administrators of Driving School "Auto" for the high-quality provision of services, informing future cadets about driving school programs, for an individual approach. Cooperation is just beginning, I am already happy with the start. At the end of the courses I will definitely leave feedback for you, friends, who are going to study in this driving school !!</p>
            <div class="review-bottom">
                <div class="review-image">
                    <img src="img/testimonial/2.jpg" alt="">
                </div>
                <div class="review-title">
                    <span>Saya Armanovna</span>
                    <small>Rated by:</small>
                    <div class="rev-icons">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="review-single fade">
            <p><i class="fas fa-quote-left"></i>I studied at a driving school, I want to heartily thank our teacher Baizhanov Tasbolat Sabitovich for his high professionalism and competence, patience, kindness, willingness to answer any of our questions, return to the topic from time to time until the topic is understood by the whole group !! !! Willingness to share not only the knowledge provided by the training program, but also personal experience !!!</p>
            <div class="review-bottom">
                <div class="review-image">
                    <img src="img/testimonial/4.jpg" alt="">
                </div>
                <div class="review-title">
                    <span>Abdrakhmanova Marzhan</span>
                    <small>Rated by:</small>
                    <div class="rev-icons">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Next and previous buttons -->
        <a class="prev rev-click" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next rev-click" onclick="plusSlides(1)">&#10095;</a>
    </div>

    <!-- Instructors -->
    <div class="title wow fadeInUp" data-wow-delay=".6s">
            <p class="main-title">Instructors</p>
            <p class="main-title-2">BEST HIGHLY QUALIFIED TEACHERS</p>
            <i class="fab fa-suse"></i>
    </div>
    <div class="slider">
      <div class="slider__wrapper">
        <!-- First Slide -->
        <div class="slider__item">
            <!-- Content -->
          <div class="slider__content">
              <!-- Header -->
            <div class="slider__content_header">
              <img class="slider__content_img" src="img/gallery/teacher_8.jpg" alt="">
            </div>
                <!-- Bottom -->
            <h2 class="slider__content_title">Zhangabyl Nurlan Musipkazyuly</h2>
            <div class="slider__content_footer">
              <span class="slider__content_author">The educational process is mutual work. And we, teachers and cadets, must together achieve the maximum result - deep and strong knowledge. The road is a serious examiner. Mistakes of negligent students are too expensive</span>
            </div>
          </div>

        </div>

        <!-- Second Slide -->
        <div class="slider__item">
            <!-- Content -->
          <div class="slider__content">
              <!-- Header -->
            <div class="slider__content_header">
              <img class="slider__content_img" src="img/gallery/teacher_8.jpg" alt="">
            </div>
                <!-- Bottom -->
            <h2 class="slider__content_title">Bekmaganbetov Zharmakhan Aldashovich</h2>
            <div class="slider__content_footer">
              <span class="slider__content_author">There are no untalented cadets. The main thing is to be able to set a goal. Those who clearly defined this goal for themselves come to a driving school. If you want, any “lyrics” can be taught the technical features of the car and the rules of behavior on the road</span>
            </div>
          </div>

        </div>

        <!-- Third Slide -->
        <div class="slider__item">
            <!-- Content -->
          <div class="slider__content">
              <!-- Header -->
            <div class="slider__content_header">
              <img class="slider__content_img" src="img/gallery/teacher_8.jpg" alt="">
            </div>
                <!-- Bottom -->
            <h2 class="slider__content_title">Imenov Akberzhan Khamrozhinovich</h2>
            <div class="slider__content_footer">
              <span class="slider__content_author">Our students almost always pass exams for obtaining a driver’s license. So, the training methods were developed by us correctly. We continue to improve. Apply not only new methods, but all modern technical means</span>
            </div>
          </div>

        </div>
        
        <!-- Fourth Slide -->
        <div class="slider__item">
            <!-- Content -->
          <div class="slider__content">
              <!-- Header -->
            <div class="slider__content_header">
              <img class="slider__content_img" src="img/gallery/teacher_8.jpg" alt="">
            </div>
                <!-- Bottom -->
            <h2 class="slider__content_title">Abilmagzhanov Berkut Azhibaevich</h2>
            <div class="slider__content_footer">
              <span class="slider__content_author">Different people come to a driving school. By age, education, by the ability to assimilate material. Learning is easy for some; some require more time to remember. I try to find an individual approach to each. I respect perseverance, I welcome diligent</span>
            </div>
          </div>

        </div>

        <!-- Fifth Slide -->
        <div class="slider__item">
            <!-- Content -->
          <div class="slider__content">
              <!-- Header -->
            <div class="slider__content_header">
              <img class="slider__content_img" src="img/gallery/teacher_8.jpg" alt="">
            </div>
                <!-- Bottom -->
            <h2 class="slider__content_title">Abaidullaev Marat Bekenovich</h2>
            <div class="slider__content_footer">
              <span class="slider__content_author">I consider my work to be very responsible. Much depends on her. I am proud that the graduates of our school do not fall into the number of violators. I consider this a merit of teachers demanding attitude to their duties</span>
            </div>
          </div>

        </div>
        
      </div>
      <a class="slider__control slider__control_left" href="#" role="button"></a>
      <a class="slider__control slider__control_right" href="#" role="button"></a>
    </div>

    <!-- Pricing -->
    <div id="pric-id" class="pric-area">
        <div class="title wow fadeInUp" data-wow-delay=".6s">
            <p class="main-title">Prices</p>
            <p class="main-title-2">Lowest City Prices</p>
            <i class="fab fa-suse"></i>
        </div>
    <div class="pricing-slider">
        <div class="pricing-wrapper">
            <!-- First Slide -->
            <div class="pric-item">
                <!-- Content -->
                <div class="pric-content">
                    <!-- Header -->
                    <div class="pric-content-header">
                        <p>Category A</p>    
                    </div>
                    <div class="pric-content-middle">
                        <p>22000 T</p>
                        <span>4.5 months<br>
                            30h. driving
                        </span>
                    </div>
                    <div class="pric-content-bottom">
                        <button id="ex2">Sign up</button>
                    </div>
                    
                </div>
            </div>
            <!-- Second Slide -->
            <div class="pric-item">
                <!-- Content -->
                <div class="pric-content">
                    <!-- Header -->
                    <div class="pric-content-header">
                        <p>Category B</p>    
                    </div>
                    <div class="pric-content-middle">
                        <p>22000 T</p>
                        <span>4.5 months<br>
                            30h. driving
                        </span>
                    </div>
                    <div class="pric-content-bottom">
                        <button id="ex3">Sign up</button>
                    </div>
                    
                </div>
            </div>
            <!-- Third Slide -->
            <div class="pric-item">
                <!-- Content -->
                <div class="pric-content">
                    <!-- Header -->
                    <div class="pric-content-header">
                        <p>Category BC</p>    
                    </div>
                    <div class="pric-content-middle">
                        <p>22000 T</p>
                        <span>4.5 months<br>
                            30h. driving
                        </span>
                    </div>
                    <div class="pric-content-bottom">
                        <button id="ex4">Sign up</button>
                    </div>
                    
                </div>
            </div>
            <!-- Fourth Slide -->
            <div class="pric-item">
                <!-- Content -->
                <div class="pric-content">
                    <!-- Header -->
                    <div class="pric-content-header">
                        <p>Category C</p>    
                    </div>
                    <div class="pric-content-middle">
                        <p>22000 T</p>
                        <span>4.5 months<br>
                            30h. driving
                        </span>
                    </div>
                    <div class="pric-content-bottom">
                        <button id="ex5">Sign up</button>
                    </div>
                    
                </div>
            </div>
            <!-- Fifth Slide -->
            <div class="pric-item">
                <!-- Content -->
                <div class="pric-content">
                    <!-- Header -->
                    <div class="pric-content-header">
                        <p>Category D</p>    
                    </div>
                    <div class="pric-content-middle">
                        <p>22000 T</p>
                        <span>4.5 months<br>
                            30h. driving
                        </span>
                    </div>
                    <div class="pric-content-bottom">
                        <button id="ex6">Sign up</button>
                    </div>
                    
                </div>
            </div>
            <!-- Sixth Slide -->
            <div class="pric-item">
                <!-- Content -->
                <div  class="pric-content">
                    <!-- Header -->
                    <div class="pric-content-header">
                        <p>Category E</p>    
                    </div>
                    <div class="pric-content-middle">
                        <p>22000 T</p>
                        <span>4.5 months<br>
                            30h. driving
                        </span>
                    </div>
                    <div class="pric-content-bottom">
                        <button id="ex7">Sign up</button>
                    </div>
                    
                </div>
            </div>
        </div>
        <a class="pric__control pric__control_left" href="#" role="button"></a>
        <a class="pric__control pric__control_right" href="#" role="button"></a>
    </div>
    </div>

    <!-- FAQ -->
    <div class="faq-container">
        <div class="title wow fadeInUp" data-wow-delay=".6s">
            <p class="main-title">Frequently asked Questions</p>
            <i class="fab fa-suse"></i>
        </div>
        <div class="accordion">
                <ul>
                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2 class="title_block">What time do driving classes take place?</h2>
                        <div class="msg">
                            <p>By agreement with the instructor.</p>    
                        </div>
                    </li>

                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2 class="title_block">What documents do I need to enter a driving school?</h2>
                        <div class="msg">
                            <p>Passport, 2 3x4 photos (you can color, you can black and white, but always matte) and a certificate of passage of the driver’s medical commission.</p>    
                        </div>
                    </li>

                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2 class="title_block">What is the percentage of exams in the traffic police on the first try?</h2>
                        <div class="msg">
                            <p>Graduates of our school have one of the highest percent of exams in the traffic police on the first try. Theory 90 - 95%, driving 75 - 85%.</p>    
                        </div>
                    </li>

                    <li>
                        <input type="checkbox" checked>
                        <i></i>
                        <h2 class="title_block">Is it possible to take additional driving lessons in addition to the basic roll-over?</h2>
                        <div class="msg">
                            <p>Yes, you can, because the program is designed for 20-30 hours of driving, and sometimes this time is not enough for a confident ride around the city. Additional classes are paid in excess of the amount paid for the course.</p>    
                        </div>
                    </li>
                </ul>
        </div>
        <div class="faq-image">
			<img src="img/faq.png" alt="" />
		</div>
    </div>

    <!-- Footer -->
    <div id="contact-id" class="footer-area">
        <div class="no1"></div>
        <div class="footer-widget">
            <h4 class="widget-title">About us</h4>
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

    <div id="popup1" class="popup">
		<!-- самое (белое) модальное окно -->
		<div class="popup-dialog">
			<!-- Содержимое модального окна -->
			<div class="popup-content">
				<button id="close" class="popup-close">&times;</button>
				<h4 class="popup-header">Interested in?</h4>
				<p>Leave your contact details for communication</p>
				<div class="popup-form main-form">
					<form class="form" action="index.php" method="POST">

						<label for="#"><?= $error_name?></label>
                        <input type="text" class="form-input" name="name" value="<?= $_SESSION["name"]?>">
                        
                        <label for="#"><?= $error_phone?></label>
                        <input type="text" class="form-input" name="phone" value="<?= $_SESSION["phone"]?>">

						<label for="#"><?= $error_email?></label>
						<input type="text" class="form-input" name="email" value="<?= $_SESSION["email"]?>">
                        
						<button class="form-btn button" name="send" type="submit">Sign up</button>
					</form>
				</div>
			</div>
		</div>
    </div>

    <!-- Script -->
    <script src="js/main.js"></script>
    <script src="js/m_s.js"></script>
    <script src="js/script.js"></script>
    <script src="js/price.js"></script>
    <script src="js/slider-fiew.js"></script>
    <script src="js/acardion.js"></script>
    <script src="js/priceup.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    </body>
</html>