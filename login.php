<?php
session_start();

?>

<html lang="en">
	<head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>My Login Page</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
	</head>
	
	<body>
        <div class='fill-screen'>
            <img class='make-it-fit' src="images/Moab_banner.jpg"/>
        </div>
        <div>
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#stayontarget" aria-expanded="false">
                        <span class="sr-only"> Toggle Nav-Bar</span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                        <span class="icon-bar"> </span>
                    </button>
                    <a class="navbar-brand" href="home.html">Nathan K Wilson</a>
                </div>
            <div class="collapse navbar-collapse" id="stayontarget">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="home.html">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="Projects.php">Projects<span class="caret"></span></a>
                        
                    <ul class="dropdown-menu">
                        <li>
                            
                            <a href="Projects.php?p=0" ><span class="glyphicon glyphicon-user"></span>Page 1-1
                            </a></li>
                        <li>
                            
                            <a href="Projects.php?p=1" ><span class="glyphicon glyphicon-music"></span>Page 1-2
                            </a></li>
                        <li>
                            
                            <a href="Projects.php?p=2" ><span class="glyphicon glyphicon-eye-open"></span>Page 1-3
                            </a></li>
                    </ul>
                        
                    </li>
                    <li><a href="Stuff.html">Stuff</a></li>
                     <li><a href="Endorsements.php">Endorsement</a></li>
                    <li class="active"><a href="Contact.php">Contact</a></li>
                    <li><a href="register.php">Register</a></li>  
                </ul>
            </div>
                
            </div>
        </nav>
        </div>
        
        <form action="loggedin.php" method="post">
        <h1>Login</h1>
        Username: <input name="Username">
        
        Password: <input type="password" name="Password">
		<button type="submit">submit</button>
        </form>
	<?php
	if (isset($_SESSION["ERROR"]))
	{
		echo "<p>Username or Password was WRONG</p>";
		unset($_SESSION["ERROR"]);
	}
	?>



        <custom-class>Copyright © 2018 by Nathan Wilson</custom-class>

        
	</body>
</html>
