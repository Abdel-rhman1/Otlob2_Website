<?php
    
    $CV='';
    if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD']==='POST') {
        if(isset($_POST['CV']))
        {
            $CV=$_POST['CV'];
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!-- this is compat with ES -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"href="css/bootstrap.css">
        <link rel="stylesheet" href="css/media.css">
        <link rel="stylesheet" href="css/hover.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/fontawesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link  rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Abel&family=Almendra&display=swap">
    </head>
    <body>
        <!-- start NavBar Section -->
            <section class="bac-A">
                <nav class="navbar navbar-inverse">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                    </button>
                        <a class="navbar-brand " href="#"><img class="img-responsive" src="Images/favicon.ico?v=2">
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#" class="a">Login</a></li>
                            <li><a href="#" class="a">
                                العربيه</a></li>
                        </ul>
                        </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </section>
        <!-- Start Body of rate -->
        <section class="About container">
            <div class="bor">
                <div class="heading">
                    If you are interested in joining Otlob.com, kindly submit the form below:
                </div>
                <form class="form-horizontal" action="<?php 
                    echo $_SERVER['PHP_SELF'];
                ?>" method="post">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2">first Name *</label>
                    <div class="col-sm-7 col-md-offset-1">
                      <input name="FName"type="text" class="form-control" id="inputEmail3" placeholder="first Name *">
                    </div>
                  </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2">Last Name *</label>
                      <div class="col-sm-7 col-md-offset-1">
                        <input name="LName"type="text" class="form-control" id="inputEmail3" placeholder="last Name *">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2">Password *</label>
                      <div class="col-sm-7 col-md-offset-1">
                        <input name="Password"type="password" class="form-control" id="inputPassword3" placeholder="Password">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">Job Title *</label>
                        <div class="col-sm-7 col-md-offset-1">
                          <input name="Title"type="text" class="form-control" id="inputEmail3" placeholder="Job Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">Mobile Number *</label>
                        <div class="col-sm-7 col-md-offset-1">
                          <input name="Mobile"type="text" class="form-control" id="inputEmail3" placeholder="Mobile Number">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">Email *</label>
                        <div class="col-sm-7 col-md-offset-1">
                          <input name="Email"type="email" class="form-control" 
                          id="inputEmail3" placeholder="Mobile Number"
                          value="<?php echo $CV;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2">CV *</label>
                        <div class="col-sm-7 col-md-offset-1">
                          <input type="file" name="CV"class="form-control" id="inputEmail3" class="file" placeholder="Email">
                            <p>
                                (Accepted formats .pdf, .doc or .docx) 
                            </p>
                    </div>
                    <div class="form-group container text-center">
                      <div class="col-sm-offset-2 col-sm-3">
                        <button type="submit" class="btn btn-default one">Clear</button>
                      </div>
                      <div class="col-sm-1">
                        <button type="submit" class="btn btn-default two">Send</button>
                      </div>
                    </div>
                  </form>
            </div>
        </section>
        <!-- Start footer Section -->
        <section class="footer2">
            <div class="link container">
                <a href="About.html">About Us</a>
                <a href="rate.html">Feedback</a>
                <a href="career.php">Careers</a>
                <a href="Tearm.html">Terms</a>
                <a href="#">FAQ</a>
                <a href="#">Privacy</a>
                <a href="contactUs.php">Contact Us</a>
                <a href="#">Sitemap</a>
            </div>
            <p>
                For any support or help you can contact us via our Live Chat. 
                <span>
                    ©2020 Otlob.com
                </span>
            </p>
        </section>
        <!-- End Footer Section -->
        <script src="js/jquery-1.11.1.js">
        </script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/javaScript.js"></script>
        <script src="js/wow.min.js"></script>
        <script> src="js/main.js"</script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <!--[if lt IE 9]>
          <script src="js/html5shiv.min.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
    </body>
</html>