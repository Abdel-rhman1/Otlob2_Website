<?php
    function InputTest($input)
    {
        $input=htmlspecialchars($input);
        $input=trim($input);
        // $input=stripslaches($input);
        return $input;
    }
    $FormErrors=array();
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $Username=$Mail=$Mobile=$msg='';
        if(isset($_POST['name']) && strlen($_POST['name'])>3)
        {
            $Username=InputTest($_POST['name']);
        }
        else{
            $FormErrors[]="Your Name Must be Greater than this length";
        }
        if(isset($_POST['Mail']) && strlen($_POST['Mail'])>3)
        {
            $Mail=InputTest($_POST['Mail']);
        }
        else{
            $FormErrors[]="Your Mail Must be Greater than this length";
        }
        if(isset($_POST['mobile']) && strlen($_POST['mobile'])>12)
        {
            $Mobile=InputTest($_POST['mobile']);
        }
        else{
            $FormErrors[]="Your mobile Must be Greater than this length";
        }
        if(isset($_POST['text']) && strlen($_POST['text'])>10)
        {
            $msg=InputTest($_POST['text']);
        }
        else{
            $FormErrors[]="Your comment Must be Greater than this length";
        }
        $Subject="Otlob_Website";
        if(empty($FormErrors))
        {
            $header='From: '. $Mail.'\r\n';
            mail('yousef777906@gmail.com','Contact_Form',$msg,$header);
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
        <!-- Start About Section -->
        <section class="About container">
            <div class="heading">
                <i class="fa fa-address-card fa-2x" aria-hidden="true"></i>
                <h4>
                    How may we help you?
                </h4>
            </div>
            <div class="conten">
                <p>
                    Our agents are available 24x7 to make sure that all your issues and inquiries are resolved.
                </p>
            </div>
            <div class="row">
                <div class="col-md-6 help text-center ">
                    <div class="joindiv">
                        <i class="fa fa-user-circle-o fa-2x need-font" aria-hidden="true"></i>
                        <h4 style="display: inline;">
                            Need Help?
                        </h4>
                    </div>
                    <div class="Write" style="text-align: left;">
                        <h5>
                            Write to us
                        </h5>
                        <p>You may start a<a href="livechat.html"
                        style="color:green"> Live Chat</a> with one of our agents for any queries.<br>
                        Or you can fill the below contact form and we make sure to get back to you as soon as possible.
                        </p>
                    </div>
                    <div class="form">
                        <form method="POST">
                            <label>
                                Name *
                            </label>
                            <input type="text"placeholder="Name" name="name">
                            <label>
                                Mail *
                            </label>
                            <input type="Mail"placeholder="Mail" name="Mail">
                            <label>
                                Mobile *
                            </label>
                            <input type="text"placeholder="Mobile" name="mobile">
                            <label>
                                comment *
                            </label>
                            <textarea name="text">

                            </textarea>
                            <input type="submit" value="submit" class="btn-success">
                        </form>
                    </div>
                </div>
                <div class="col-md-5 text-center">
                    <div class="join">
                        <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                        <a href="Become.html"
                        style="display: inline; text-decoration:none;" class="h4">
                        Jonin To Us
                        </a>
                    </div>
                    
                        <div class="row">
                            <div class="col-md-9 col-md-offset-3">
                                <div class="Ahm">
                                    <h3>
                                        Contact us
                                    </h3>
                                    <p>
                                        To get the quickest response in case you need to:
                                    </p>
                                    <i class="fa fa-angle-double-right" 
                                    style="text-align: left;
                                    margin-left:-10px";
                                    aria-hidden="true"></i>
                                    <span style="text-align:left;margin-left:-10px;">Modify your order</span><br/>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    <span>General inquiries</span>
                                    <p>              
                                        You may contact us through our live chat.
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Section -->
        <!-- Start footer Section -->
        <section class="footer2">
            <div class="link container hidden-sm">
                    <a href="About.html" class="hidden-xs visible-sm">About Us</a>
                    <a href="rate.html">Feedback</a>
                    <a href="career.php">Careers</a>
                    <a href="Tearm.html">Terms</a>
                    <a href="#">FAQ</a>
                    <a href="#">Privacy</a>
                    <a href="contactUs.php">Contact Us</a>
                    <a href="#">Sitemap</a>
            </div>
            <div class="row">
                <span class="cli visible-xs text-center col-xs-4 col-xs-offset-4">
                    More
                </span>
            </div>
            <br>
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