

<!DOCTYPE HTML>
<!--
Created by:Nathan W
-->
<html lang="en">
	<head>
        <meta charset="utf-8"> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>My Home Page</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="css/bootstrap-theme.css">
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	</head>
	
	<body onload="JavaScript:pageload();" >
        
        <div class='fill-screen' style="background-color: black">
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
                    <li ><a href="home.html">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="Projects.html">Projects<span class="caret"></span></a>
                        
                    <ul class="dropdown-menu">
                        <li>
                            
                            <a href="Projects.php" ><span class="glyphicon glyphicon-user"></span>Page 1-1
                            </a></li>
                        <li>
                            
                            <a href="Projects.php" ><span class="glyphicon glyphicon-music"></span>Page 1-2
                            </a></li>
                        <li>
                            
                            <a href="Projects.php" ><span class="glyphicon glyphicon-eye-open"></span>Page 1-3
                            </a></li>
                    </ul>
                        
                    </li>
                    <li><a href="Stuff.html">Stuff</a></li>
                    <li class="active"><a href="Endorsements.html">Endorsement</a></li>
                    <li><a href="Contact.php">Contact</a></li>
                    <li><a href="register.php">Register</a></li>
                </ul>
                
            </div>
                
            </div>
        </nav>
        </div>
        
        
        
        
        <div id="container">
             
            <h1 class="endorsement-head center">Endorsements</h1>
            <div class="center">
            <button style="align-content: center" id="sort_name">Sort By Name</button>
            <button style="align-content: center" id="sort_date">Sort By Date</button>
            </div>
            
            <table >
                <tr>
                    <td>Name</td>
                    <td>Date</td>
                    <td>Comment</td>
                </tr>
            </table>

            <table id="endo_table">
                
            </table>
            <form action="endorseAction.php" method="post">
                <div class="center">
<?php
	include 'settings.php';
	session_start();

	
	if (isset($_SESSION["loggedin"]))
	{
		$user = $_SESSION["username"];
		$sql = "SELECT FirstName FROM $table WHERE userName = ? " ;
		if ($statement = $conn->prepare($sql))
		{
			$statement->bind_param("s", $user);
			$statement->execute();
			$result = $statement->get_result();
			$data = $result->fetch_assoc();
			$firstname = $data['FirstName'];
			$_SESSION['valname'] = $firstname;
			$statement->close();

		echo "<input type=\"text\" id=\"name\" value=\"should say something\" name=\"name\">";
		}
	}
	else
	{
		$_SESSION['valname'] = "Enter your first name... unknown user";
	}

	echo " Name: <input type=\"text\" id=\"name\" value=\"".$_SESSION['valname']."\" name=\"name\">";
	
	$conn->close();

?>
                        Date: <input type="date" id="date" name="date">
                        Comments: <input id="comment" name="comment">
                        <button id="submit" style="align-content: center" class="btn btn-default" type="submit">Submit</button>
                </div>
            </form>

            
            
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mi-modal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
      </div>
      <div class="modal-footer">
        <button type="button submit" class="btn btn-default" id="modal-btn-si">Yes</button>
        <button type="button" class="btn btn-primary" id="modal-btn-no">No</button>
      </div>
    </div>
  </div>
</div>

<div class="alert" role="alert" id="result"></div>            
            
        </div>

        <custom-class>Copyright © 2018 by Nathan Wilson</custom-class>
        

        
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/endorsement.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
        });
    </script>
	</body>
</html>
