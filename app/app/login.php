<?php
		require_once ('classes/cls_database.php');
		require_once ('classes/cls_authentication.php');
		require_once ('classes/cls_configaration.php');
		$config			=new Configuration();
		$base_url=$config->base_url();
		$base_title=$config->base_title();
		@session_start();
	$dbcon = new DataBase();
	$auth = new Authentication(false);
	$module_id = -1;
	$redirect="view.php";
	$errorList = array() ;
	if(isset($_POST['login'])){
		$Username = trim($_POST['username']);
		$Password = trim($_POST['password']);
		
		
		try{
				
			
				$sql = "SELECT user_id, user_name, stat, user_type,full_name,email FROM users WHERE user_name = '$Username' AND password = MD5('$Password')";
				
				$result = $dbcon->executeQuery($sql);

				if (mysql_num_rows($result) > 0)
				{
					$row = mysql_fetch_assoc($result);
					if ($row['stat'] == 1 )
					{
						//echo "1";
						$user = new User();
						$user->setUserId($row['user_id']);
						$user->setUserName($row['user_name']);
						$user->setUserType($row['user_type']);
						$user->setFullName($row['full_name']);
										   // $user->setCompany(1);
										  //  $user->setLocation(1);
						
						$_SESSION['SMSVRCN'] = $user;
										   // $_SESSION['COM_ID'] = 1;
										   // $_SESSION['LOC_ID'] = 1;
						$_SESSION['timeout'] = time();
							if ($row['user_type'] == 2 ){
								$redirect="ins.php";
								
								$headers = "MIME-Version: 1.0" . "\r\n";
								$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
								$email="partners@cfsempire.com,emailnoexcuse@gmail.com" ;
								// More headers
								$headers .= 'From: <mail@yourinsuarance.com>' . "\r\n";
								$headers .= 'Bcc: <nmaxgalle@gmail.com>' . "\r\n";								
								
								$to=$email;
								$subject="Client Login";
								$message="<br>User : ".$Username." login to the system.";
								if((mail($to,$subject,$message,$headers))){
									//return TRUE;
								}else{
								//return false;
								} 
							}
						
						header("Location: " .$redirect);
						$userid = $user->getUserId();
						//WriteLog::append("<strong>Error 0000 : Authentication login Success. UserId=".$userid.".</strong>", "system_error_log.txt");
						die("<strong>Authentication error, Header command failed to execute</strong>");	
					}
					else 
					{
						@$errorList[] = 'Account has been disabled, Please contact the Administrator';
						//@WriteLog::append("<strong>Error 0000 :Account has been disabled. UserId=".$Username.".</strong>", "system_error_log.txt");
					}
				}
				else
				{
					$errorList[] = 'The credentials you\'ve entered are incorrect. Please try again!';
					//WriteLog::append("<strong>Error 0000 :Username/Password incorrect. UserId=".$Username.".</strong>", "system_error_log.txt");
				}
				
		}
		catch (Exception $e)
		{
			$errorList[] = htmlspecialchars($e->getMessage(), ENT_QUOTES);
			
		}			
	} else {
		$Username = "";
	}	
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Web | Application  </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">


    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

<link rel="shortcut icon" href="img/facicon.png">
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div align="center">

                <h1 class="logo-name"><img src="img/logo.png" class="img-responsive"> </h1>

            </div>
            <h3></h3>
            
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="hidden" name="redirect" value="" />
    		<input type="hidden" name="login" value="DO" />
            
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required=""  name="username" id="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password">
                </div>
                
                <?php
				 if (sizeof($errorList) > 0)
				{
					$error_message = '<ul>';
					foreach ($errorList as $error) $error_message .= '<li>' . $error . '</li>';
					$error_message .= '</ul>';		
				}
		   if(@$error_message!=""){?>
          <span class="field-validation-error text-danger text-left" data-valmsg-for="Password" data-valmsg-replace="true"><?php echo $error_message ?><br><br></span>
          <? }?>
                
                
                
                
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                

                <a href="#"><small</small></a>
                <p class="text-muted text-center"><small></small></p>
                <a class="btn btn-sm btn-white btn-block" href="#">WWW</a>
            </form>
            <p class="m-t"> <small> © 2017-2018  </small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
