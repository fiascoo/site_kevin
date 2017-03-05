<?php 
session_start();
require("admin/connexion_bdd.php"); 
require("front/inc/functions.php"); 

$sql = $bdd -> query("SELECT * FROM user");
$user = $sql->fetch();

$sql = $bdd -> query("SELECT * FROM competence");
$competence = $sql->fetchAll();

$sql = $bdd -> query("SELECT * FROM experience ORDER BY id_experience DESC");
$experience = $sql->fetchAll();

$sql = $bdd -> query("SELECT * FROM titre");
$titre = $sql->fetchAll();
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mon site CV</title>


    <!-- Bootstrap Core CSS -->
    <link href="front/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="front/css/stylish-portfolio.css" rel="stylesheet">
    
    <!-- Mon CSS-->
    <link rel="stylesheet" type="text/css" href="front/css/style.css">

    <!-- Custom Fonts -->
    <link href="front/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Font-Awesome Links -->
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
    <nav id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
            <li class="sidebar-brand">
                <a href="#top" onclick=$("#menu-close").click();>Start Bootstrap</a>
            </li>
            <li>
                <a href="#top" onclick=$("#menu-close").click();>Home</a>
            </li>
            <li>
                <a href="#competences" onclick=$("#menu-close").click();>Compétences numériques</a>
            </li>
            <li>
                <a href="#portfolio" onclick=$("#menu-close").click();>Mes projets</a>
            </li>
            <li>
                <a href="#contact" onclick=$("#menu-close").click();>Contact</a>
            </li>
            <li>
                <a href="admin/connexion.php" onclick=$("#menu-close").click();>Admin</a>
            </li>
        </ul>
    </nav>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <h1>Kevin Seri</h1>
            <h3>Intégrateur &amp; Développeur Web Junior</h3>
        </div>
    </header>

    <!-- Competences -->
    <section id="competences" class="competences">
        <div class="row text-center"> 
          <div class="col-md-8 col-md-offset-2">
          <h2 class="text-center">Mes compétences numériques</h2>  

          <?php $getCompetence = $bdd->query("SELECT * FROM competence ORDER BY id_competence ASC");
            while($competence = $getCompetence->fetch()):
          ?>             
            <div class="progress skill-bar ">
              <div class="progress-bar <?= set_a_color($competence['niveau']);?>" role="progressbar" aria-valuenow="<?= $competence['niveau']; ?>" aria-valuemin="0" aria-valuemax="100">
                  <span class="skill"><?=$competence['competence']; ?><i class="val"><?= $competence['niveau'].'%'; ?></i></span>
              </div>  
            </div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>
    </section>

    <!-- Parcours -->
    <section id="parcours">
      <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <h2 class="text-center">Mon parcours professionnel</h2>
              <div class="table-responsive">
                  <table class="table table-responsive">
                    <tr>
                      <th scope="row" class="text-center">Parcours professionnel</th>
                        <?php
                            $i = 0;
                            while ($i < count($experience)) {
                          ?>
                         
                        <td> 
                          <?= $experience[$i]['experience'];?> 
                        </td>
                        
                        <?php $i++; 
                                     }
                          ?>
                    </tr> 

                    <tr>
                      <th scope="row" class="text-center">Lieu</th>
                      <?php
                          $i = 0;
                          while ($i < count($experience)) {
                        ?>
                      <td> 
                        <?= $experience[$i]['lieu'] ;?>
                      </td>

                      <?php $i++; 
                                   }
                      ?>                   
                    </tr>
                    
                    <tr>
                      <th scope="row" class="text-center">Dates</th>
                      <?php
                          $i = 0;
                          while ($i < count($experience)) {
                        ?>

                      <td> 
                        <?= $experience[$i]['dates'] ;?>
                      </td>

                        <?php $i++; 
                                   }
                        ?>

                    </tr>
                  </table>                        
                </div>
            </div>
        </div>
        
    </section>

    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h2>Mes projets</h2>
                    <hr class="small">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="">
                                    <img class="img-portfolio img-responsive" src="front/img/metropop.png">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="portfolio-item">
                                <a href="#">
                                    <img class="img-portfolio img-responsive" src="front/img/metropop.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-10 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

    <footer id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Contactez moi:</strong>
                    </h4>
                    <p>11 Allée Saint-Exupery
                        <br>Villeneuve la Garenne, France 92390</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i>0652056651</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> <a href="mailto:seri.kevin7@gmail.com">seri.kevin7@gmail.com</a>
                        </li>
                        <li><i class="fa fa-file-pdf-o"></i> <a href="front/img/kevin_seri.pdf">Mon CV</a></li>
                    </ul>
                    <br>
                    <ul class="list-inline">
                        <li>
                            <a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/login"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                        </li>
                        <li>
                            <a href="https://dribbble.com/"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                        </li>
                    </ul>
                    <hr class="small">
                    <p class="text-muted">Copyright &copy; 2017</p>
                </div>
            </div>
        </div>
        <a id="to-top" href="#top" class="btn btn-dark btn-lg"><i class="fa fa-chevron-up fa-fw fa-1x"></i></a>
    </footer>

    <!-- jQuery -->
    <script src="front/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="front/js/bootstrap.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });
    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#],[data-toggle],[data-target],[data-slide])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    //#to-top button appears after scrolling
    var fixed = false;
    $(document).scroll(function() {
        if ($(this).scrollTop() > 250) {
            if (!fixed) {
                fixed = true;
                // $('#to-top').css({position:'fixed', display:'block'});
                $('#to-top').show("slow", function() {
                    $('#to-top').css({
                        position: 'fixed',
                        display: 'block'
                    });
                });
            }
        } else {
            if (fixed) {
                fixed = false;
                $('#to-top').hide("slow", function() {
                    $('#to-top').css({
                        display: 'none'
                    });
                });
            }
        }
    });

    </script>
    <!-- Mon Javascript -->
    <script src="front/js/skills.js" type="text/javascript" ></script>
    <script src="front/js/_functions.js" type="text/javascript" ></script>

</body>

</html>
