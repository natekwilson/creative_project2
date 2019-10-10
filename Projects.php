<?php
session_start();
include 'settings.php';
?>

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
                    <li ><a href="home.html">Home</a></li>
                    <li class="dropdown active"><a class="dropdown-toggle" data-toggle="dropdown" href="Projects.html">Projects<span class="caret"></span></a>
                        
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
                    <li><a href="Contact.php">Contact</a></li>
                    <li><a href="register.php">Register</a></li>   
                </ul>
            </div>
                
            </div>
        </nav>
        </div>
        
        
        <div id="container">
             
            <h1 id="better-padding">Nathan Wilson's Projects       </h1>
            
            
            
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/autumn_leaves.jpg" alt="Project 1">
    </div>

    <div class="item">
      <img src="images/seagul.jpg" alt="Project 2">
    </div>

    <div class="item">
      <img src="images/dock.jpg" alt="Project 3">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
            <div id="container">
                        <h1 class="endorsement-head center">Comments</h1>
                        <table >
                            <tr>
                            <td>Name</td>
                            <td>Date</td>
                            <td>Comment</td>
                            </tr>
                        </table>

                        <table id="comment_table center">
			<?php

			$sql = " SELECT commentContent, date, Users.userName
			FROM Comments
			INNER JOIN Users ON Comments.userID = Users.userId
			";
			if ($statement = $conn->prepare($sql))
			{
				$statement->execute();
				$result = $statement->get_result();
				while($row = $result->fetch_assoc())
                {

                    echo "<tr><td>".$row['userName']."</td><td>".$row['date']."</td><td>".$row['commentContent']."</td></tr>";
                }
                $statement->close();
			}
			$conn->close();
                            
            ?>
                        </table>
            </div>
            <?php
                if (isset($_SESSION["loggedin"]))
                {
                    
                        
	               echo "
                            <form action=\"comment.php\" method=\"post\">
                                <div class=\"center\">
                                    Comments: <input name=\"comment\">
                                </div>
                                <button type=\"submit\">Post Comment</button>
                            </form>
                        ";
                }
            ?>
            
        </div>

        <custom-class>Copyright � 2018 by Nathan Wilson</custom-class>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
        });
        </script>
        
    <?php
	if (isset($_SESSION["ERROR"]))
	{
		echo $_SESSION["ERROR"];
		unset($_SESSION["ERROR"]);
	}
	?>

        
        
	</body>
    
    <script>
    $(document).ready(function ()
    {
        $('.dropdown-toggle').dropdown();
        $('#myCarousel').carousel(parseInt(gup('p')));
    });
    </script>
</html>
