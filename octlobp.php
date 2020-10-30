<?php
      $server='localhost';
      $username='root';
      $password='';
      $DB='otlob_databasd';
      $login='Login';
      $class='logi';
      $masg='';
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
      public function InsertData($Username, $Email, $Password)
      {
        $object=new dataBaste;
        $object->ConnectData();
        $sql="insert into user(User,Email,Password) values('$Username','$Email','$Password')";
        $insert=$GLOBALS['conn']->query($sql);
        if($insert)
        {
          $GLOBALS['login']='My Account';
          $GLOBALS['class']='MyAccount';
          setcookie("Username",$Username,time()+86400*30,"/");
          setcookie("Mail",$Email,time()+86400*30,"/");
          setcookie("Password",$Password,time()+86400*30,"/");
          $_SESSION["Username"] = $Username;
          $_SESSION['Mail']=$Email;
          $_SESSION['Password']=$Password;
        }
        else{
          die("this Mail MayBe Register Before");
        }
      }
    } 
    if(isset($_POST['lig']) && $_SERVER['REQUEST_METHOD']==='POST')
    {
        $mail=$pass='';
        $object=new dataBaste;
        if(isset($_POST['Mail']) && !empty($_POST['Mail']))
        {
          $mail=$object->testinput($_POST['Mail']);
        }
        if(isset($_POST['Password']) && !empty($_POST['Password']))
        {
          $pass=$object->testinput($_POST['Password']);
        }
        $object->ConnectData();
        $sql='select Email from user';
        $Emails=array();
        $res=$conn->query($sql);
        if($res->num_rows>0)
        {
          while($row=$res->fetch_assoc()){
            $Emails[]=$row['Email'];
        }
        if(in_array($mail,$Emails)){
            $sql="select Password from user where Email='$mail'";
            $passres=$conn->query($sql);
            if($passres)
            {
              $tourresult = $passres->fetch_array()[0] ?? '';
              echo($tourresult);
              if($tourresult==$pass){
                $GLOBALS['login']='My Account';
                $GLOBALS['class']='MyAccount';
                $_SESSION['Mail']=$mail;
                $_SESSION['Password']=$pass;
              }
            }
            else{
              die("DataBase Error");
            }
        }
    }
  }    
    if(isset($_POST['sing']) && $_SERVER['REQUEST_METHOD']==='POST')
    {
      $UserError=$MailError=$passError='';
      $Username=$Mail=$Password='';
      $object=new dataBaste;
      if(isset($_POST['user']) && !empty($_POST['user']))
      {
        $Username=$object->testinput($_POST['user']);
      }
      else{
        $UserError="Username Must Be larger Than one Character\n";
      }
      if(isset($_POST['Mail']) && !empty($_POST['Mail']))
      {
        $Mail=$object->testinput ($_POST['Mail']);
      }
      else{
        $MailError="Mail Must Be larger Than one Character\n";
      }
      if(isset($_POST['Password']) && strlen($_POST['Password'])<20)
      {
        $Password=$object->testinput ($_POST['Password']);
      }
      else{
        $passError="Mail Must Be larger Than one Character\n";
      }
      $object->InsertData($Username,$Mail,$Password);
    }
    if(isset($_POST['rest']) && $_SERVER['REQUEST_METHOD']==='POST'){
      $mai='';
      if(!empty($_POST['resetPassword']) && isset($_POST['resetPassword'])){
        $object=new dataBaste;
        $mai=$_POST['resetPassword'];
        $object->ConnectData();
        $sql='select Email from user';
        $Emails=array();
        $res=$conn->query($sql);
        if($res->num_rows>0)
        {
          while($row=$res->fetch_assoc()){
            $Emails[]=$row['Email'];
        }
        if(in_array($mai,$Emails)){
            $sql="select Password from user where Email='$mai'";
            $tourresult='';
            $passres=$conn->query($sql);
            if($passres)
            {
              $tourresult = $passres->fetch_array()[0] ?? '';
              $GLOBALS['login']='My Account';
              $GLOBALS['class']='MyAccount';
              $header='From: Otlob Website '.'\r\n';
              $msg="your Password Is  ".$tourresult;
              mail('yousef777906@gmail.com','Otlop Password reset ',$msg,$header);
              $masg='we will send Your password in this mail that you entered so you can change it';
            }else{
              die("DataBase Error");
            }
    }else{
      $masg='This mail is not exits in Our Website please check your Email again';
    }
  }
} 
}
?>
<!DOCTYPE html>
<html>
    <head>
      <!-- this support arabic and English properly -->
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
        <link rel="stylesheet" href="css/default_Theme.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link  rel="stylesheet"href="https://fonts.googleapis.com/css2?family=Abel&family=Almendra&display=swap">
    </head>
    <body>
      
      <section class="container text-center sec">
        <div class="login">
            <form  class="Contact-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>"method="POST">
          <h1>Login Form</h1>
          <button type="button" class="btn btn-primary">
            <!-- <i class="fa fa-google fa-2x"></i> -->
            <p class="lead text-center">Continue With google</p>
          </button>
          <button type="button" class="btn btn-primary text-center">
            <!-- <i class="fa fa-google fa-2x"></i> -->
            <p class="lead text-center">Continue With Facebook</p></button>
          <h4>OR</h4>
          <input name="Mail"type="email"class="mail" placeholder="Email" value="
          <?php
          ?>">
          <span class="ast0">*</span>
          <p class="lead custom0">this field is requried</p>
          <input name="Password"type="password"class="pass"placeholder="Password"
          value="">
          <span class="ast1">*</span>
          <p class="lead custom1">this field is requried</p>
          Show password <input type='checkbox' id='check' />
          <br>
          <input type="checkbox"class="ch">
          <span class="keep">Keep Me logged in?</span>

          <span class="forget" name="forget"><a>Forgot password?</a></span>
          <input type="submit" class="btn btn-success Lo " value="Send" name="lig">
          <a href="#" target=""class="hav">
          <p>Don't have an account? <span>Create an account</span></p>
          </a>
        </form>
        </div>
      </section>
      <div class="forget_Password">
          <div class="ins">
              <h4>Forgotten Password</h4>
              <span class="hid3">X</span>
          </div>
          <span style="color:red">
              <?php 
                if(isset($masg)){
                  echo $masg;
                }
              ?>
          </span>
          <p>
            Enter your email address and we’ll send a link to change your password
          </p>
          <form action="<?php 
          echo $_SERVER['PHP_SELF']?>"method="POST">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3">Email</label>
                <div class="col-sm-9">
                  <input type="email" class="form-control passs"name="resetPassword"
                  placeholder="Email">
              </div>
          </div>
          <div class="">
            <input type="submit"class="btn btn-success" name="rest" style="margin-left:30px;
            margin-right:30px;margin-top:70px;width:380px"
              value="reset Your Password">
          </div>
      </form>
      </div>
      
      <section class="container text-center sec">
        <div class="singIn">
            <form name="singIn"class="Contact-form" action="<?php echo $_SERVER['PHP_SELF'];?>"method="POST">
          <h1 class="head">Sing In Form</h1>
          <input type="text" placeholder="UserName"name="user"
          value=""class="ana user">
          <input class="mail ana"name="Mail"type="email"placeholder="Email"value="">
          <span class="ast0">*</span>
          <p class="lead custom0">this field is requried</p>
          <input name="Password"type="password"class="ana pass pas"placeholder="Password">
          <span class="ast1">*</span>
          <p class="lead custom1">this field is requried</p>
          Show password <input type='checkbox' id='check2' />
          <br>
          <input type="checkbox"class="ch">
          <span class="keep">Keep Me logged in?</span>
          <span class="forget"><a>Forgot password?</a></span>
          <input type="submit" class="btn btn-success Lo si" value="Send" name="sing">
        </form>
        </div>
      </section>
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
            </button>
                <a class="navbar-brand " href="#"><img class="img-responsive" src="Images/favicon.ico?v=2"></a>
              </div>
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="index.html">Offers <span class="sr-only">(current)</span></a></li>
                  <li><a href="Become.html" target="_blank">Become a parter</a></li>
                  <li><a href="FAQ.html">Most Selling</a></li>
                  <li><a href="#">All Resturants</a></li>
                  <li>
                    
                    <a href="#" class="aralan">العربيه</a>
                  </li>
                  <li class="<?php echo "$class" ?>"> <?php echo '<a href="#">'.$login.'</a>';?>
                  </li>
                  <div class="Account_Parent">
                      <ul class="Account list-unstyled">
                            <table>
                              <tr>
                                <td>
                                  <i class="fa fa-credit-card-alt fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <li> <a href="talbat.php" target="">Otlob Credit</a></li>  
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i class="fa fa-cart-arrow-down fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <li> <a href="talbat.html" target="">My Orders</a></li> 
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <li> <a href="talbat.html" target="">Account Info</a></li> 
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <li> <a href="talbat.html" target="">Saved Address</a></li>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    <i class="fa fa-sign-out fa-2x" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <li> <a href="talbat.html" target="">Logout</a></li>
                                </td>
                              </tr>                
                          </table>
                      </ul>
                  </div>
                </ul>
              </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <section class="main text-center">
        <div class="back">
            <div class="in">
              <div class="container ">
                <h1 class="hidden-xs">
                  Order food online in Egypt
                </h1>
                <h4 class="visible-xs">
                  Order food online in Egypt
                </h4>
                  <div class="row text-center">
                    <div class="for text-center">
                      <p>
                        Find the restaurants nearest to you
                      </p>
                    <input class=" col-xs-8"type="text" placeholder="Search for area, street name, landmark...">
                    <button class="btn btn-info col-md-3 col-xs-3">
                      Find Resturants
                    </button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </section>
    <section class="features text-center">
      <div class="container">
        <div class="row text-center"> 
          <div class="feat col-md-4 text-center">
            <i class="fa fa-home fa-5x"></i>
            <p>
              Find a restaurant
            </p>
          </div>
          <div class="feat col-md-4 text-center">
            <i class="fa fa-cutlery fa-5x"></i>
            <p>
              Order your meal
            </p>
          </div>
          <div class="feat col-md-4 text-center">
            <i class="fa fa-smile-o fa-5x"></i>
            <p>
              Order your meal
            </p>
          </div>
        </div>
      </div>
    </section>
    <section class="order">
      <div class="">
        <div class="info text-center">
          <h1>
            Order food online
          </h1>
          <p>
            Endless selection of cuisines and restaurants
          </p>
          <hr class="breaker"/>
          </div>
          <div class="row">
              <img class="col-md-5 col-xs-12"src="Images/0317-ba-basics-stir-fried-udon-15.jpg">
           <div class="col-md-5 col-md-offset-1 col-xs-12">
            <h5>Who we are</h5>
            <p>Otlob is Egyptian foodies favorite food ordering app and website.
              We put thousands of top international and local restaurants into your hands.
              Find, sort, filter, rate, and order all with a couple easy taps.
              Otlob will take care of the rest.
            </p>
            <h5>What we do</h5>
            <p >Otlob is Egypt's biggest food ordering services and 
              operates in more than 25 cities. Customers can order from more than 
              2,000 restaurants with a couple taps, and Otlob will manage the rest.
            </p>
           <h5>Start your experience</h5>
           <p >Use our GPS technology to locate yourself, 
             choose your favorite restaurant and meal, and checkout. 
             Otlob allows you to pay however you prefer and save your delivery 
             details for easy reordering.</p>
           </div>
          </div>
      </div>
    </section>
    <section class="test text-center">
      <div class="container">
        <h1>What Our Clients Say</h1>
        <div id="test" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
                <p class="lead">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus earum quis velit, voluptatibus doloribus autem pariatur laudantium praesentium dolor cum totam dolorum nulla est distinctio at dolores deserunt culpa? 
                </p>
                <span>Abdelrhman Mohammed</span>
            </div>
            <div class="item">
                  <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus earum quis velit, voluptatibus doloribus autem pariatur laudantium praesentium dolor cum totam dolorum nulla est distinctio at dolores deserunt culpa?
                  </p>
                  <span>Mahmmod Ahmed</span>
            </div>
            <div class="item">
                  <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus earum quis velit, voluptatibus doloribus autem pariatur laudantium praesentium dolor cum totam dolorum nulla est distinctio at dolores deserunt culpa?
                  </p>
                  <span>youssef Mohammed</span>
              </div>
              <div class="item">
                <p class="lead">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis necessitatibus earum quis velit, voluptatibus doloribus autem pariatur laudantium praesentium dolor cum totam dolorum nulla est distinctio at dolores deserunt culpa?
                </p>
                <span>Nada Hassan</span>
            </div>
            </div>
            <ol class="carousel-indicators">
              <li data-target="#test" data-slide-to="0" class="active">
                <img src=" Images/download (10).jpg"alt="Abdelrhman">
              </li>
              <li data-target="#test" data-slide-to="1">
                <img src="Images/download (11).jpg"alt="youssef">
              </li>
              <li data-target="#test" data-slide-to="2">
                <img src="Images/images (8).jpg"alt="Hanan">
              </li>
              <li data-target="#test" data-slide-to="3">
                <img src="Images/download.png"alt="Yasmeen">
              </li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="footer"width="100%">
      <div class="container">
        <div class="link hidden-xs">
          <a href="About.html">About Us</a>
          <a href="rate.html">Feedback</a>
          <a href="career.php">Careers</a>
          <a href="Tearm.html">Terms</a>
          <a href="#">FAQ</a>
          <a href="#">Privacy</a>
          <a href="contactUs.php">Contact Us</a>
          <a href="#">Sitemap</a>
        </div>
        <div class="res">
          <div class="row">
            <ul class="list-unstyled col-md-3 Fi1">
              <span class="hidden-md visible-xs  sp">+</span>
              <h4>Restaurants</h4>
              <li><a href="#">Taboon</a></li>
              <li><a href="#">Dawar Farah - Mohandiseen</a></li>
              <li><a href="#">The Backyard - Maadi</a></li>
              <li><a href="#">Al Aseel El Demashky - Tagammoa 5</a></li>
              <li><a href="#">Lan Yuan - Maadi</a></li>
              <li><a href="#">More Restaurants...</a></li>
            </ul>
            <ul class="list-unstyled col-md-3 Fi2">
              <span class="visible-xs  sp">+</span>
              <h4>Popular Cuisines</h4>
              <li><a href="#">Italian</a></li>
              <li><a href="#">Mexican</a></li>
              <li><a href="#">Sandwiches</a></li>
              <li><a href="#">Japanese</a></li>
              <li><a href="#">Pizza</a></li>
              <li><a href="#">More Cuisines...</a></li>
            </ul>
            <ul class="list-unstyled col-md-3 Fi3">
              <span class="hidden-md visible-xs sp">+</span>
              <h4>Popular Areas</h4>
              <li><a href="#">Abu Rady</a></li>
              <li><a href="#">Al Warakah</a></li>
              <li><a href="#">El Bahr St</a></li>
              <li><a href="#">El Gaish</a></li>
              <li><a href="#">El Ragaby</a></li>
              <li><a href="#">More Areas...</a></li>
            </ul>
            <ul class="list-unstyled col-md-3 icons">
              <h4>Follow us on</h4>
              <div class="row">
                <li class="col-md-2 col-xs-4 "><img src="Images/Icons/iconfinder_facebook_834722.png"></li>
                <li class="col-md-2 col-xs-4"><img src="Images/Icons/iconfinder_Facebook_Messenger_1298720.png"></li>
                <li class="col-md-2 col-xs-4"><img src="Images/Icons/iconfinder_linkedin_287553.png"></li>
                <li class="col-md-2 col-xs-4"><img src="Images/Icons/iconfinder_social-56_1591869.png"></li>
                <li class="col-md-2 col-xs-4"><img src="Images/Icons/iconfinder_twitter_313466.png"></li>
                <li class="col-md-2 col-xs-4"><img src="Images/Icons/iconfinder_whatsapp_287520.png"></li>
              </div>
              <h4>
                Add Your Restaurant
              </h4>
              <button class="btn btn-success trans">
                Become a Partner
              </button>
            </ul>
          </div>
          <div class="support">
            For any support or help you can contact us via our Live Chat.
          </div>
        </div>
      </div>
      <div class="yell">
        <span>
          <i class="fa fa-wheelchair fa-2x">
          </i>
        </span>
        <p>Contact Us
          </p>
        </div>
    </section>
    <section class='option-box'>
        <div class='color-option'>
            <h4>Color-Option</h4>
            <ul class="list-unstyled">
                <li data-value='css/default_Theme.css'></li>
                <li data-value='css/blue_Theme.css'></li>
                <li data-value='css/yellow_Theme.css'></li>
            </ul>
        </div>
        <i class='fa fa-gear fa-3x gear-check'></i>
      </section>
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