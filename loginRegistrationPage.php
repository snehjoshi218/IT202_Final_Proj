<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it

if(isset($_POST["username"]) && isset($_POST["password"]){

   require('config.php');
   echo "Loaded Host: " . $host;
   $conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
   try{
	$db = new PDO($conn_string, $username, $password);
        echo "Connected";
	
	
	
         	//TODO select query using bindable :username is where clause
	       //select * from TestUsers where username =
  	       $select_query = "select * from `Login` where username = :username";
	       $stmt = $db->prepare($select_query);
	       $r = $stmt->execute(array(":username"=> "RagRoyale"));
	       $results = $stmt->fetch(PDO::FETCH_ASSOC);
	       //print_r($stmt->errorInfo());
	       echo "<pre>" . var_export($results, true) . "</pre>"; 
   }
   catch(Exception $e){
	 echo $e->getMessage();
	 exit("Something went wrong");
   }
  }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>

