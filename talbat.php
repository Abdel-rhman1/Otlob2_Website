<?php
   $server='localhost';
   $username='root';
   $password='';
   $DB='otlob_databasd';
   session_start();
 class dataBaste{
   public function ConnectData()
   {    
     global $conn;
     $conn=new mysqli($GLOBALS['server'],$GLOBALS['username'],$GLOBALS['password'],$GLOBALS['DB']);       
     if($conn->connect_error)
     {
       die ("connection Failed: " . $conn->connect_error);
     }
   }
   public function testinput(string $input)
   {
     $input=trim($input);
     $input=htmlspecialchars($input);
     return $input;
   }
}
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['update2'])){
  $new_Mail=$again_New_Mail='';
  $object=new dataBaste;
  if(isset($_POST['new_Mail']) && !empty($_POST['new_Mail'])){
    $new_Mail= $object->testinput($_POST['new_Mail']);
  }
  if(isset($_POST['again_new']) && !empty($_POST['again_new'])){
    $again_New_Mail= $object->testinput($_POST['again_new']);
  }
  $mail=$_SESSION['Mail'];
  if($new_Mail==$again_New_Mail && $new_Mail!=$mail ){  
    $object->ConnectData();
    $sql="update user set Email= '$new_Mail' where Email='$mail'";
    $upda=$conn->query($sql);
    if($upda){
      $_SESSION['Mail']=$new_Mail;
    }
    else{
      die("there are some errors");
    }
  }
  else{
    echo 'please retype mail in properl method';
  }
}
if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['update3'])){
  $new_Password=$again_New_Password='';
  $object=new dataBaste;
  if(isset($_POST['new_Password']) && !empty($_POST['new_Password'])){
    $new_Password= $object->testinput($_POST['new_Password']);
  }
  if(isset($_POST['again_New_Password']) && !empty($_POST['again_New_Password'])){
    $again_New_Password= $object->testinput($_POST['again_New_Password']);
  }
  $mail=$_SESSION['Mail'];
  $oldPassword=$_SESSION['Password'];
  if($new_Password==$again_New_Password && $new_Password!=$oldPassword ){  
    $object->ConnectData();
    $sql="update user set Password= '$new_Password' where Email='$mail'";
    $upda=$conn->query($sql);
    if($upda){
      $_SESSION['Password']=$new_Password;
    }
    else{
      die("there are some errors");
    }
  }
  else{
    echo 'please retype mail in properl method';
  }
}
 if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['update'])){
   $NewUserName=$mail='';
   $mail=$_SESSION['Mail'];
   if(isset($_POST['username'])){
     $object=new dataBaste;
      global $NewUserName;
      $NewUserName= $object->testinput($_POST['username']);
      if($_SESSION['Username']!=$_POST['username']){
          $object->ConnectData();
          $sql="update user set User= '$NewUserName' where Email='$mail' ";
          $upda=$conn->query($sql);
          if($upda){
            $_SESSION['Username']=$NewUserName;
          }
          else{
            die("there are some errors");
          }
      }
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
                <div class="holder">
                    <ol class="breadcrumb">
                      <li><a href="octlobp.php">Home</a></li>
                      <li class="active">My Account</li>
                    </ol>
                </div>
                <div style="margin-left:10px;border-bottom: 1px solid #ddd;padding-bottom: 15px;">
                    <h3 style="display: inline;font-weight: bold;">
                        My Account
                    </h3>
                </div>
            </div>
            <div class="conten">
                <div class="row">
                    <ul class="list-unstyled col-md-2">
                        <li class="Account_Info"><a href="#">Account Info</a></li>
                        <li><a href="#">Saved Addresses</a></li>
                        <li><a href="#">My Orders</a></li>
                        <li><a href="#">Saved Cards</a></li>
                        <li><a href="#">Otlob Credit</a></li>
                    </ul>
                    <div class="col-md-8 Account_Infor marg">
                        <form class="form-horizontal" method="POST" action="
                        <?php echo $_SERVER['PHP_SELF'];?>">
                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-2">Email *</label>
                              <div class="col-sm-6">
                                <input type="email" class="form-control" id="inputEmail3"
                                 value="<?php 
                                //  session_start();
                                 if(isset($_SESSION['Mail']))
                                 {
                                 echo $_SESSION['Mail'];
                                 }?>"disabled>
                              </div>
                              <span class="col-sm-2 col-xs-6 chan change_mail">
                                  CHANGE EMAIL
                              </span>
                              
                              <span class="col-sm-2  col-xs-6 chan chane_password">
                                CHANGE PASSWORD
                            </span>
                            </div>
                            <div class="changePassword">
                            <div class="ins">
                                  <h3>
                                      Change Password
                                  </h3>
                                  <span class="hid2">
                                    X
                                  </span>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-xs-4">Current Password*</label>
                                <div class="col-xs-8">
                                  <input type="password" class="form-control pass4" id="inputEmail3"
                                  
                                  value="<?php 
                                  if(isset($_SESSION['Password'])){
                                    echo $_SESSION['Password'];
                                  }
                                  ?>">
                                   <input type="checkbox"id="check4">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-xs-4">New Password</label>
                                <div class="col-xs-8">
                                  <input type="password" class="form-control pass5" id="inputPassword3" 
                                  placeholder="New Password" name="new_Password">
                                  <input type="checkbox"id="check5">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-xs-4">Retype password</label>
                                <div class="col-xs-8">
                                  <input type="password" class="form-control" id="inputPassword3" 
                                  placeholder="Retype Password" name="again_New_Password">
                                </div>
                              </div>
                              <div class="form-group container text-center">
                              <div class="col-sm-2 col-xs-4"style="margin-top:10px;">
                                <button type="reset" class="btn btn-default one">Clear</button>
                              </div>
                              <div class="col-sm-2 col-xs-4" style="margin-top:10px;">
                                <button type="submit" class="btn btn-default two" name="update3">Update</button>
                              </div>
                            </div>
                            </div>
                            <div class="changeM">
                              <div class="ins">
                                  <h3>
                                      Change Email
                                  </h3>
                                  <span class="hid">
                                    X
                                  </span>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-xs-4">Current Password*</label>
                                <div class="col-xs-8">
                                  <input type="password" class="form-control passs" 
                                  value="<?php
                                  if(isset($_SESSION['Password'])){
                                    echo $_SESSION['Password'];
                                  }
                                  ?>"/>
                                  <input type="checkbox"id="check3"/>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-xs-4">New Email *</label>
                                <div class="col-xs-8">
                                  <input type="email" class="form-control" id="inputPassword3" 
                                  placeholder="New Email" name="new_Mail">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-xs-4">Retype Email *</label>
                                <div class="col-xs-8">
                                  <input type="email" class="form-control" id="inputPassword3" 
                                  placeholder="Retype Email2" name="again_new">
                                </div>
                              </div>
                              <div class="form-group container text-center">
                              <div class="col-sm-2 col-xs-4"style="margin-top:10px;">
                                <button type="submit" class="btn btn-default one">Clear</button>
                              </div>
                              <div class="col-sm-2 col-xs-4" style="margin-top:10px;">
                                <button type="submit" class="btn btn-default two"
                                name="update2">Update</button>
                              </div>
                            </div>
                              </div>
                              <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2">First Name*</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="inputEmail3"
                                  name="username"
                                  value="<?php 
                                  if(isset($_SESSION['Username'])){
                                    echo $_SESSION['Username'];
                                  }
                                  ?>">                                  
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2">Last Name *</label>
                                <div class="col-sm-6">
                                  <input type="text" class="form-control" id="inputPassword3" 
                                  value="<?php 
                                  if(isset($_SESSION['Username'])){
                                    echo $_SESSION['Username'];
                                  }
                                  ?>">
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2">Gender *</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-xs-6 gender1" style="background-color:green;
                                        color:white">
                                            Female
                                      </div>
                                      <div class="col-xs-6 gender2">
                                            Male
                                      </div>
                                    </div>
                                </div>
                              </div>
                              <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2">Brith *</label>
                                  <div class="col-sm-5">
                                    <input type="date" class="form-control" id="inputEmail3" style="line-height: 22px;">
                                  </div>
                                  <div class="col-sm-1 this col-xs-hidden" style="color:red">
                                    <i class="fa fa-calendar-o fa-2x col-xs-hidden" aria-hidden="true"></i>
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-5">
                                  <input type="checkbox"><span style="margin-left:7px; margin-bottom:20px">Subscribe to our Newsletter</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                  <input type="checkbox"style="margin-top:-10px"><span style="margin-left:7px;margin-bottom:20px">Subscribe to SMS</span>
                                </div>
                            </div>
                              <div class="form-group container text-center">
                                <div class="col-sm-7">
                                  <button type="submit" class="btn btn-default two"
                                  name="update" style="margin-top:10px">Update</button>
                                </div>
                              </div>
                            </form>
                    </div>
                    <div class="col-md-8 Saved text-center marg" style="margin-top:40px">
                    <i class="fa fa-map-marker fa-5x" aria-hidden="true" style="color:#ddd"></i>
                    <p style="color:#666">
                        There are no saved addresses to display
                    </p>
                    <button class="btn btn-success"> 
                      Add Address
                    </button>
                    </div>
                    <div class="col-md-8 order2 text-center marg" style="margin-top:40px">
                    <i class="fa fa-cart-arrow-down fa-5x" aria-hidden="true" style="color:#ddd"></i>
                    <p style="color:#666;font-size:150%;word-spacing:130%;">
                        There are no orders to display
                    </p>
                    </div>
                    <div class="col-md-8 visa text-center marg" style="margin-top:40px">
                    <i class="fa fa-cc-visa fa-5x" aria-hidden="true" style="color:#ddd"></i>
                    <p style="color:#666;font-size:150%;word-spacing:130%">
                        There are no saved credit card to Display
                    </p>
                    </div>
                    <div class="col-md-8 mony text-center marg" style="margin-top:40px">
                    <i class="fa fa-money fa-5x" aria-hidden="true" style="color:#ddd"></i>
                    <p style="color:#666;font-size:150%;word-spacing:130%;font-weight:bold">
                        We’re busy making some improvements to Otlob credit
                    </p>
                    <span style="color:#666">
                        You can still view and use your credit through the mobile apps.
                    </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="footer2">
            <div class="link container hidden-sm">
                    <a href="About.html" class="hidden-xs visible-sm">About Us</a>
                    <a href="rate.html">Feedback</a>
                    <a href="career.php">Careers</a>
                    <a href="Tearm.html">Terms</a>
                    <a href="#">FAQ</a>
                    <a href="#">Privacy</a>
                    <a href="#">Contact Us</a>
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