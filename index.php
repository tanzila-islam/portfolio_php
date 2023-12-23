<?php
session_start();
require_once "./admin/db.php";
$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "1";
$selectQuery = "SELECT * FROM users where id= $id";
$selectQuery2 = "SELECT * FROM settings where id= $id";
$selectQuery3 = "SELECT * FROM about where id= $id";
$result = $conn->query($selectQuery);
$result2 = $conn->query($selectQuery2);
$result3 = $conn->query($selectQuery3);
$data = $result->fetch_assoc();
$data2 = $result2->fetch_assoc();
$data3 = $result3->fetch_assoc();
$_SESSION['name'] = $data['name']
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 
    - primary meta tags
  -->
  <title>Tanjila - I'm a digital creator.</title>
  <meta name="title" content="Tanjila - I'm a digital creator">
  <meta name="description" content="This is a personal portfolio html template made by codewithsadee">

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700&display=swap" rel="stylesheet">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - preload images
  -->
  <link rel="preload" as="image" href="./assets/images/bannerimg.jpeg">
  <link rel="preload" as="image" href="./assets/images/Blog.svg">

</head>

<body>

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>
    <div class="container">

      <a href="#" class="logo">
        <img src="./assets/images/logo-dark.png" width="80" height="24" alt="Julia home">
      </a>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">
          <a href="#" class="logo">
            <img src="./assets/images/logo-light.png" width="90" height="34" alt="Julia home">
          </a>

          <button class="nav-close-btn" aria-label="close menu" data-nav-toggler>
            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
          </button>
        </div>

        <ul class="navbar-list">

          <li>
            <a href="#" class="navbar-link">Home</a>
          </li>

          <li>
            <a href="#ABOUT" class="navbar-link">About</a>
          </li>

          <li>
            <a href="#PROJECT" class="navbar-link">Projects</a>
          </li>

          <li>
            <a href="<?php isset($data3['resume']) ? print_r($data3['resume']) : '#' ?>" class="navbar-link" target="_blank">Resume</a>
          </li>

          <li>
            <a href="#CONTACT" class="navbar-link">Contact</a>
          </li>

        </ul>

        <div class="wrapper">
          <a href="mailto:<?php echo $data['email'] ?>" class="contact-link"><?php echo $data['email'] ?></a>

          <a href="tel:<?php echo isset($data2['mobile']) ? $data2['mobile'] : '#' ?>" class="contact-link"><?php echo isset($data2['mobile']) ? $data2['mobile'] : " " ?></a>
        </div>

        <ul class="social-list">

          <li>
            <a href="<?php echo isset($data2['twitter']) ? $data2['twitter'] : '#' ?>" class="social-link" target="_blank">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo isset($data2['facebook']) ? $data2['facebook'] : '#' ?>" class="social-link" target="_blank">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo isset($data2['blog']) ? $data2['blog'] : '#' ?>" class="social-link" target="_blank">
              <ion-icon name="logo-dribbble"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo isset($data2['instagram']) ? $data2['instagram'] : '#' ?>" class="social-link" target="_blank">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="<?php echo isset($data2['youtube']) ? $data2['youtube'] : '#' ?>" class="social-link" target="_blank">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

      <button class="nav-open-btn" aria-label="open menu" data-nav-toggler>
        <ion-icon name="menu-outline" aria-hidden="true"></ion-icon>
      </button>

      <div class="overlay" data-nav-toggler data-overlay></div>

    </div>
  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" aria-label="home">
        <div class="container">

          <figure class="hero-banner">
            <img src="./admin/<?php print_r($data['image']); ?>" width="560" height="540" alt="Julia" class="w-100" data-reveal="top">

            <div width="203" height="91" alt="Projects Done" class="shape" data-reveal="top" data-reveal-delay="0.25s">
              <h3>Projects</h3>
              <h5><i>&nbsp;15+</i></h5>
            </div>
          </figure>

          <div class="hero-content">
            <h1 class="h1 hero-title" data-reveal="top" data-reveal-delay="0.5s">
              I'm a&nbsp;<p class="typing" style="color: var(--cinnamon-satin);"></p>
            </h1>
            <p class="section-text" data-reveal="top" data-reveal-delay="0.75s">
              Hello! I'm <?php echo $data['name'] ?>, a web designer and a digital creator. I am also a teacher and I teach English. I’m very passionate about the work that I do.
            </p>

            <div class="btn-wrapper" data-reveal="top" data-reveal-delay="1s">
              <a href="#PROJECT" class="btn btn-primary">See My Works</a>

              <a href="#CONTACT" class="btn btn-secondary">Contact Me</a>
            </div>

          </div>

        </div>
      </section>





      <!-- 
        - #ABOUT
      -->

      <section class="section about" aria-label="about" id="ABOUT">
        <div class="container">

          <div class="wrapper">

            <div data-reveal="left">
              <h2 class="h2 section-title">What I Do?</h2>

              <p class="section-text">
                I do various types of work. But my most favourite is teaching. I'm passionate about it. Besides, I like to make cartoon animation videos for my channel. All of these give me pleasure.
              </p>
            </div>

            <ul class="progress-list" data-reveal="right">

              <li class="progress-item">

                <div class="label-wrapper">
                  <p>Web Design</p>

                  <span class="span">80 %</span>
                </div>

                <div class="progress">
                  <div class="progress-fill" style="width: 80%; background-color: #c7b1dd"></div>
                </div>

              </li>

              <li class="progress-item">

                <div class="label-wrapper">
                  <p>Mobile Design</p>

                  <span class="span">70 %</span>
                </div>

                <div class="progress">
                  <div class="progress-fill" style="width: 70%; background-color: #8caeec"></div>
                </div>

              </li>

              <li class="progress-item">

                <div class="label-wrapper">
                  <p>Cartoon Animation</p>

                  <span class="span">90 %</span>
                </div>

                <div class="progress">
                  <div class="progress-fill" style="width: 90%; background-color: #b0d4c1"></div>
                </div>

              </li>

              <li class="progress-item">

                <div class="label-wrapper">
                  <p>SEO</p>

                  <span class="span">50 %</span>
                </div>

                <div class="progress">
                  <div class="progress-fill" style="width: 50%; background-color: #e3a6b6"></div>
                </div>

              </li>

            </ul>

          </div>

          <ul class="grid-list">

            <li data-reveal="bottom">
              <div class="about-card">

                <div class="card-icon">
                  <img src="./assets/images/icon-1.svg" width="52" height="52" loading="lazy" alt="web design icon">
                </div>

                <h3 class="h4 card-title">Web Design</h3>

                <p class="card-text">Web design blends creativity and technology for visually appealing, user-friendly sites, ensuring an engaging online experience.</p>

              </div>
            </li>

            <li data-reveal="bottom" data-reveal-delay="0.25s">
              <div class="about-card">

                <div class="card-icon">
                  <img src="./assets/images/icon-2.svg" width="52" height="52" loading="lazy" alt="mobile design icon">
                </div>

                <h3 class="h4 card-title">Mobile Design</h3>

                <p class="card-text">
                  Mobile app development merges coding expertise and design finesse to create seamless, user-centric applications for diverse platforms.
                </p>

              </div>
            </li>

            <li data-reveal="bottom" data-reveal-delay="0.5s">
              <div class="about-card">

                <div class="card-icon">
                  <img src="./assets/images/icon-3.svg" width="52" height="52" loading="lazy" alt="web development icon">
                </div>

                <h3 class="h4 card-title">Cartoon Animation</h3>

                <p class="card-text">
                  Cartoon animation captivates audiences with lively characters, vivid visuals, and dynamic storytelling, creating delightful, memorable experiences.
                </p>

              </div>
            </li>

            <li data-reveal="bottom" data-reveal-delay="0.75s">
              <div class="about-card">

                <div class="card-icon">
                  <img src="./assets/images/icon-4.svg" width="52" height="52" loading="lazy" alt="web seo icon">
                </div>

                <h3 class="h4 card-title">SEO</h3>

                <p class="card-text">
                  SEO maximizes online visibility, driving organic traffic through strategic optimization, keywords, and content enhancements for top-ranking results.
                </p>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #PROJECT
      -->

      <section class="section project" aria-labelledby="project-label" id="PROJECT">
        <div class="container">

          <div class="title-wrapper" data-reveal="top">

            <div>
              <h2 class="h2 section-title" id="project-label">My Projects</h2>

              <p class="section-text">
                Check out some of my projects with creative ideas.
              </p>
            </div>

            <a href="https://github.com/tanzila-islam" class="btn btn-secondary" target="_blank">See All Projects</a>

          </div>

          <ul class="grid-list">

            <li>
              <div class="project-card project-card-1" style="background-color: #f8f5fb">

                <div class="card-content" data-reveal="left">

                  <p class="card-tag" style="color: #a07cc5">Web Design</p>

                  <h3 class="h3 card-title">Students Result Management System</h3>

                  <p class="card-text">
                    School management system streamlines administrative tasks, enhances communication, and organizes academic data for efficient school operations and performance tracking.
                  </p>

                  <a href="#" class="btn-text" style="color: #a07cc5">
                    <span class="span">See Project</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

                <figure class="card-banner" data-reveal="right">
                  <img src="./assets/images/project-1.png" width="650" height="370" loading="lazy" alt="Web Design" class="w-100">
                </figure>

              </div>
            </li>

            <li>
              <div class="project-card project-card-2" style="background-color: #f1f5fd">

                <div class="card-content" data-reveal="right">

                  <p class=" card-tag" style="color: #3f78e0">Mobile Design</p>

                  <h3 class="h3 card-title">2D Snake Game App</h3>

                  <p class="card-text">
                    Snake 2D game challenges players to grow the serpent by eating, avoiding collisions, and achieving high scores.
                  </p>

                  <a href="#" class="btn-text" style="color: #3f78e0">
                    <span class="span">See Project</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

                <figure class="card-banner" data-reveal="left" style="box-shadow:2px 0px 10px #000000bf">
                  <img src="./assets/images/project-2.gif" width="600" height="250" loading="lazy" alt="Web Design" class="w-100">
                </figure>

              </div>
            </li>
            <li>
              <h2 class="h2 section-title" id="project-label">My Recent Works</h2>
              <div class="project-card project-card-3" style="background-color: #f5faf7">

                <div class="card-content" data-reveal="left">

                  <p class=" card-tag" style="color: #7cb798">Book Design</p>

                  <h3 class="h3 card-title">My Book</h3>

                  <p class="card-text">

                    Taths English Books enhance vocabulary, grammar, and comprehension skills, fostering a love for literature and knowledge enrichment.
                  </p>

                  <a href="#" class="btn-text" style="color: #7cb798">
                    <span class="span">See My Book</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

                <figure class="card-banner" data-reveal="right">
                  <div style="display: flex;align-items: center;justify-content: center;">
                    <img src="./assets/images/project-3.png" loading="lazy" alt="Mobile Design" style="width: 50%;overflow: hidden">
                  </div>
                </figure>

              </div>
            </li>

            <li>
              <h2 class="h2 section-title" id="project-label">&nbsp;</h2>
              <div class="project-card project-card-4" style="background-color: #fcf4f6">

                <div class="card-content" data-reveal="left">

                  <p class=" card-tag" style="color: #d16b86">Mobile Design</p>

                  <h3 class="h3 card-title">English Pronunciation App</h3>

                  <p class="card-text">
                    English pronunciation app refines speaking skills, boosts confidence, and accelerates language fluency through interactive exercises and feedback.
                  </p>

                  <a href="#" class="btn-text" style="color: #d16b86">
                    <span class="span">See Project</span>

                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                  </a>

                </div>

                <figure class="card-banner" data-reveal="right" style="text-align:-webkit-center">
                  <div style="display: flex;align-items: center;justify-content: center;">
                    <img src="./assets/images/mobile.gif" loading="lazy" alt="Mobile Design" style="width: 40.1%;overflow: hidden;border-radius: 10px;">
                  </div>
                </figure>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CONTACT
      -->

      <section class="section contact" aria-label="contact" id="CONTACT">
        <div class="container">

          <div class="contact-card">

            <div class="contact-content" data-reveal="left">

              <div class="card-icon">
                <img src="./assets/images/icon-5.svg" width="44" height="44" loading="lazy" alt="envelop icon">
              </div>

              <h2 class="h2 section-title">If you like what you see, let's work together.</h2>

              <p class="section-text">
                I bring rapid solutions to make the life of my clients easier. Have any questions? Reach out to me from
                this contact form and I will get back to you shortly.
              </p>

            </div>

            <form action="" class="contact-form" data-reveal="right">

              <div class="input-wrapper">
                <input type="text" name="name" placeholder="Name *" required class="input-field">

                <input type="email" name="email_address" placeholder="Email *" required class="input-field">
              </div>

              <textarea name="message" placeholder="Message *" required class="input-field"></textarea>

              <button type="submit" class="btn btn-secondary">Send message</button>

            </form>

          </div>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->
  <?php


  ?>

  <footer class="footer">
    <div class="container">

      <p class="copyright">
        © 2023 Tanjila-Islam. All rights reserved.
      </p>

      <ul class="social-list">

        <li>
          <a href="<?php echo isset($data2['twitter']) ? $data2['twitter'] : '#' ?>" class="social-link" target="_blank">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>

        <li>
          <a href="<?php echo isset($data2['facebook']) ? $data2['facebook'] : '#' ?>" class="social-link" target="_blank">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>

        <li>
          <a href="<?php echo isset($data2['blog']) ? $data2['blog'] : '#' ?>" class="social-link" target="_blank">
            <ion-icon name="logo-dribbble"></ion-icon>
          </a>
        </li>

        <li>
          <a href="<?php echo isset($data2['instagram']) ? $data2['instagram'] : '#' ?>" class="social-link" target="_blank">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>

        <li>
          <a href="<?php echo isset($data2['youtube']) ? $data2['youtube'] : '#' ?>" class="social-link" target="_blank">
            <ion-icon name="logo-youtube"></ion-icon>
          </a>
        </li>

      </ul>

    </div>
  </footer>





  <!-- 
    - custom js link
  -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.10/typed.js"></script>
  <script type="text/javascript">
    var typed = new Typed('.typing', {
      strings: ["Web Designer", "Digital Creator", "Teacher"],
      loop: true,
      typeSpeed: 65,
      backSpeed: 65,
      smartBackspace: true,
      showCursor: false,
    });
  </script>
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>