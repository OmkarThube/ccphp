<?php

echo '<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="StyleSheet1.css" rel="stylesheet" />
    <script src="Script1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <title>StaffTest</title>
    
</head>
<body>
<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>
<span onclick="openNav()">open</span>

    <div id="main" class="container p-5">
        <div id="titlediv" class="mt-4 m-5 text-center rounded">
            <h1 class="h1">Staff test site</h1>
            <p>giving you access the tools you need to be the best.</p>
        </div>
        <div>';
        require_once "config.php";
        $query="SELECT * from tbl_learners;";
                    $result = mysqli_query($conn, $query);
	                if (!$result){
		                echo mysqli_error($conn);
	                }
	                else {
		                if(mysqli_num_rows($result)>0){
			                while($row = mysqli_fetch_assoc($result)) {
                                echo "{$row['firstName']}";
                            }
                        }
                        else{
                            echo "none found";
                        }
                    }
                    echo '
        </div>
    </div>

</body>
</html>';
?>
