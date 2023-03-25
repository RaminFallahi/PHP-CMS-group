<?php

include( 'admin/includes/database.php' );
include( 'admin/includes/config.php' );
include( 'admin/includes/functions.php' );

?>
<!doctype html>
<html>
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
  <meta name="description" content="Portfolio website" />
  <meta name="keywords" content="full-stack, developer, front-end, back-end, software, engineer, portfolio, HTML, CSS, JavaScript, MongoDB, Express.js, React.js, Node.js, SQL, mySQL, PHP, C#, Python, JQuery, Toronto, Ontario, Canada"/>
  <meta name="Rami" content="Ramin Fallahi" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ramin Fallahi | Full-Stack Developer</title>  
  <!-- Link to the CSS file -->
  <!-- <link href="styles.css" type="text/css" rel="stylesheet"> -->
  <link href="styles2.css" rel="stylesheet">
  <!-- <link href="./styles/styles.css" rel="stylesheet"> -->
  
  <script src="https://kit.fontawesome.com/830a0da5c8.js" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
  <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
  
</head>
<body>
  <header id="header">
      <!--============================== NAV ==============================-->
      <nav id="nav">
        <div id="menu-tab"></div>
        <div id="menu-toggle">
          <span></span>
          <ul id="menu">
            <li><a href="#home">Home</a></li>
            <li><hr class="nav-division" /></li>
            <li><a href="#projects">Projects</a></li>
            <li><hr class="nav-division" /></li>
            <li><a href="#skills">Skills</a></li>
          </ul>
        </div>
      </nav>
  </header>
      <!--============================== HOME ==============================-->
      <section id="home" class="home-container">
        <div class="emblem-item">
        </div>
        <h1 class="main-brand">Ramin<span class="next-line">Fallahi</span></h1>
        <h2 class="main-title">Full-Stack<span class="next-line">Developer</span></h2>
        <div class="subtext">
          <p>Front-End • Back-End</p>
          <p>Designer  • Developer</p>
        </div>
        <div class="social-icons">
        <a href="https://github.com/RaminFallahi"><i class="fa-brands fa-square-github"></i></a>
        <a href="https://www.linkedin.com/in/ramin-fallahi-7759b575/"><i class="fa-brands fa-linkedin"></i></a>
        </div>
      </section>
    <hr id="division" />

  <!--============================== PROJECTS ==============================-->
  <section id="projects" class="projects-container">
    <h2 class="section-heading">Projects</h2>
    <div class="projects-content-container"></div>

    <?php

    $query = 'SELECT *
      FROM projects
      ORDER BY date DESC';
    $result = mysqli_query( $connect, $query );

    ?>

    <p>There are <?php echo mysqli_num_rows($result); ?> projects in the database!</p>

    <hr>

    <?php while($record = mysqli_fetch_assoc($result)): ?>

      <div>

        <h2><?php echo $record['title']; ?></h2>

        <h4><a href="https://www.raminfallahi.com/index-women-life-freedom.html"><?php echo $record['url']; ?></a></h4>

        <?php echo $record['content']; ?>

        <?php if($record['photo']): ?>

          

          <img src="<?php echo $record['photo']; ?>

          <p>Or by streaming the image through the image.php file:</p>

          <img src="admin/image.php?type=project&id=<?php echo $record['id']; ?>&width=100&height=100">

        <?php else: ?>

          <p>This record does not have an image!</p>

        <?php endif; ?>

      </div>

      <hr>

    <?php endwhile; ?>
  </section>

  <!--============================== SKILLS ==============================-->
  <section id="skills" class="skills-container">
      <h2 class="section-heading">Skills</h2>
      <div class="skills-content-container">
      <?php
        $query = 'SELECT * 
          FROM skills
          ORDER BY percent DESC';
          $result = mysqli_query($connect, $query);
      ?>
      <?php while($record = mysqli_fetch_assoc($result)): ?>
        <?php $websiteLink=""; $websiteAria="";?>
        <?php if($record['url']): ?>
          <?php
            $websiteLink=$record['url'];
            $websiteAria="Home website for skill";
          ?>
        <?php else: ?>
          <?php
            $websiteLink="";
            $websiteAria="There is no home website for this skill";
          ?>
        <?php endif; ?>
        <h3><a href="<?php echo $websiteLink;?>" aria-label="<?php echo $websiteAria?>"><?php echo $record['name'];?></a></h3>
        <div style="background-color: #cadbee; border-radius: 40px;">
          <div style="background-color: #98bddc; height: 20px; border-radius: 40px; width:<?php echo $record['percent'];?>%;"></div>
        </div>
      <?php endwhile; ?>
  </section>

</body>
</html>
