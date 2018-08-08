<?php
@ob_start();
@session_start();
	include('config/config.php');
	$action=trim($_REQUEST['action']);
	$id=trim($_REQUEST['id']);
	$name=trim($_REQUEST['name']);		
	$email=trim($_REQUEST['email']);	
	$country=trim($_REQUEST['country']);	
	$today=  date('Y-m-d H:i:s');
	$sts=  trim($_REQUEST['sts']);	
	$username=  trim($_REQUEST['username']);
	$psw=trim($_REQUEST['psw']);
	//echo $psw;
	
	if($_SERVER['REQUEST_METHOD'] == "POST" ){
		
		
		try{
			$sql = "select cv_id,first_name,mobile,dob,email from uploadedcv where mobile = '$username' and dob = '$psw'";
			//echo $sql;
			$result = $dbcon->query($sql);

			$rows_chk=$result->num_rows;
			if($rows_chk>0){
		
				$row = $result->fetch_array();
				if ($row[5] == 1) //active
				{
				
					$id=$_SESSION['cv_id']=$row[0];
					$fname=$_SESSION['first_name']=$row[1]; 
					$email=$_SESSION['email']=$row[4];					
					$username=$_SESSION['mobile']=$row[2];					
					$_SESSION['asd']="nnm";
                    
				//echo $_SESSION['username'];
				//exit;
					
					$redirect="cv2.php";
					header("Location: " . $redirect);					
					die("<strong>Authentication error, Header command failed to execute -login</strong>");	
						ob_end_clean();
				}
				else 
				{
					$msg="<span style='color:red'>Account not activated,</span>";
					
				}
			}
			else
			{
				$msg="<span style='color:red'>Login incorrect, Please try again</span>";
				
			}
		}
		catch (Exception $e)
		{
			$errorList[] = htmlspecialchars($e->getMessage(), ENT_QUOTES);
		}			
	} else {
		$username= "";
		
	}	
?>	