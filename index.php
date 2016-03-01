<?php
include 'config/config.php';
session_start();
// $_SESSION['email'] contains email
// $_SESSION['name'] contains name
if(isset($_SESSION['email']))
{
	$name	= $_SESSION['name'];
	$email 	= $_SESSION['email'];
	$phone 	= $_SESSION['phone'];
	$about 	= $_SESSION['about'];
}
?>
<!DOCTYPE html>
<html>
<!--image dimensions for card: 200px X 150px-->
<!--begin of head-->
<head lang="en">
    <meta charset="UTF-8">
    <meta name="author" content="Varun Bawa">
	<meta name="google-signin-client_id" content="77475544713-jv9kgd58uij8cddkpjbusg3mt5nvdr96.apps.googleusercontent.com">
    <link href="css/materialize.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
	<script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/materialize.min.js"></script>
    <link id="page_favicon" href="favicon.ico" rel="icon" type="image/x-icon">
    <title>Actor Director</title>
    <style>
        .quiz_margin{
            margin: 35px 41px 7px 0px;
        }
        .content_margin{
            margin: 0px 0px 0px 11px;
        }
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>
</head>
<!--end of Head-->

<!--begin of Body-->

<body>

<!--Color for day 'blue-grey darken-1'-->
<!--Color for night 'blue-grey darken-4'-->
    <!--Begin header-->
    <nav>
	<div class="nav-wrapper blue-grey darken-4">
            <img class="left" style="padding-left: 10px;" height="60" width="100" src="images/mii.png">
			<a href="#!" class="brand-logo">Actor Director <?php if(isset($_SESSION['name'])){ $name=$_SESSION['name']; echo "<font size='3pt'> for $name </font>";}?></a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul class="right hide-on-med-and-down">
                <li class="active"><a href="./">Home</a></li>
				<?php
					if(empty($_SESSION['name']))
					{
				?>
				<li><a href="#login" class="modal-trigger">Login</a></li>
				<?php
					}
					else
					{
				?>
				<li><a href="login/logout.php">Logout</a></li>
				<?php
					}
				?>
                <li><a href="register/">Register</a></li>
			</ul>
            <ul class="side-nav" id="mobile-demo">
                <li class="active"><a href="./">Home</a></li>
                <li><a href="#login">Login</a></li>
                <li><a href="register/">Register</a></li>
            </ul>
        </div>
    </nav>
    <!--end Header-->

    <!--Begin Content-->
    <main class="container">
	<?php if(isset($_SESSION['name']))
	{
	?>
	<div class="row">
		<div class="col s12 m14">
          <div class="card blue-grey darken-1">
            <div class="center card-content white-text">
			<span class="left card-title"><?php if(isset($name)){ echo "$name's Profile";}?></span>
				<div class="right">
					<img style="border-radius: 50%;" src="<?php echo 'uploads/dp/'.$email.'.jpg';?>" height="80" width="80">
				</div>
			<br><br><br><br><hr>
			<?php $space = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ?>
			<div class="row">
			<p align="left">
				Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $space."|".$space.$name;?><br><br>
				Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $space."|".$space.$email;?><br><br>
				Phone &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $space."|".$space.$phone;?><br><br>
				About &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $space."|".$space.$about;?><br><br>
			</p><hr><p align="center">
					<form action="uploads/upload-img.php" method="post" enctype="multipart/form-data">
						Select Your Display Image to upload:<br><br>
							<input type="file" name="fileToUpload" id="fileToUpload"></input><br><br>
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
								<i class="mdi-content-send right"></i>
							</button>
					</form>
				</p><hr>
				</div>
            </div>
          </div><hr>
		  
	
        </div>
	</div>
	<?php
	}
	else
	{
	?>
	<div class="row"><br>
		<div class="col s12 m14">
          <div class="card blue-grey darken-1"><br>
			<p align="center" style="font-size: 30px; color: white;"><u>Actor Director</u><br>
			<img src="images/this-is-us.jpg" height="250" width="500"/></p>
			<p align="center" style="font-size: 15px; color: white;">This is what we Do</p>
            <div class="center card-content white-text"></div>
          </div>
        </div>
	</div>
	<?php
	}
	?>
	</main>
    <!--end Content-->

    <!--Begin Footer-->
	<footer class="page-footer blue-grey darken-4 darken-2">
	    <div class="footer-copyright">
            <div class="container">
                Developed and Maintained by Varun Bawa
                <a class="grey-text text-lighten-4 right" href="http://materializecss.com/" target="_blank">Developed using materializecss</a>
            </div>
        </div>
    </footer>
    <!--end Footer-->

    <!-- Login Modal Structure -->
    <div id="login" class="modal">
        <div class="modal-content">
            <h4>Login</h4>
            <div class="row">
                <form class="col s12" method="POST" action="login/logincheck.php">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input id="icon_prefix" type="text" class="validate" name="email">
                            <label for="icon_prefix">Email ID</label>
                        </div>
                        <div class="input-field col s6">
                    		<select name="category">
                        	  <option value="actor">Actor</option>
                        	  <option value="director">Director</option>
                    		</select>
                   			<label>Actor or Director</label>
                		</div>
                    </div>
					<div class="modal-footer">
						<button class="modal-action modal-close waves-effect waves-green btn-flat" type="submit">Login
							<i class="mdi-content-send right"></i>
						</button>
					</div>
                </form>
            </div>
        </div>
    </div>
    <!--end of modal-->
</body>
<!--end of Body-->

<!--Begin of Script Section-->
		<script>

        //responsive initialization
        $(".button-collapse").sideNav();

        //Tooltip initialization
        $(document).ready(function(){
            $('.tooltipped').tooltip({delay: 50});
        });

        //Modal Initialization
        $(document).ready(function(){
            // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
            $('.modal-trigger').leanModal();
        });

        //Select Initialization
        $(document).ready(function() {
            $('select').material_select();
        });
    </script>
</html>