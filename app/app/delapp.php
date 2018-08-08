<?php
	require_once ('classes/cls_database.php');
	require_once ('classes/cls_authentication.php');
	require_once ('classes/cls_configaration.php');

	
	
	$config			=new Configuration();
	$base_url=$config->base_url();
	$base_title=$config->base_title();
	@session_start();
	$dbcon = new DataBase();
	$auth = new Authentication(true);
	$auth->sessionTimeout();
	$user = $auth->getUser();	
	$userid = $user->getUserId();
	$userName = $user->getUserName();
	$userType = $user->getUserType();
	$fullName = $user->getFullName();
	
	$id=$_REQUEST['id'];
	
	if($userType==2){
		header("Location:logoff.php ");
	}
	
	$date = date("Y-m-d");
	//$auth->checkAccess(1, $dbcon);
	$msg="";
	$id=trim($_REQUEST['id']);
	$sql= "SELECT * FROM csv where id='$id'";
	//echo $sql;
	$result= mysql_query($sql);
	if (@mysql_num_rows($result) > 0)
	{
	//	echo $sql;
		while($row=mysql_fetch_array($result)){
	
			
			@$Area		= trim($row['Area']);
			@$Account_name		= trim($row['Account_name']);
			@$Address1		= trim($row['Address1']);
			@$Address2		= trim($row['Address2']);
			@$Address3		= trim($row['Address3']);
			@$Address4		= trim($row['Address4']);
			@$PostCode		= trim($row['PostCode']);
			@$Country		= trim($row['Country']);
			@$General_Email_ = trim($row['General_Email_']);
			@$Telephone		= trim($row['Telephone']);						
			@$www			= trim($row['www']);
			@$KompassCategory_5		= trim($row['KompassCategory_5']);
			@$Note			= trim($row['Note']);
			@$Additional_note		= trim($row['Additional_note']);
			@$note_2		= trim($row['note_2']);
			@$Contact_Title		= trim($row['Contact_Title']);
			@$Contact_First_Name		= trim($row['Contact_First_Name']);
			@$Contact_Lastname		= trim($row['Contact_Lastname']);
			@$job_title		= trim($row['job_title']);
			@$Contact_Telephone		= trim($row['Contact_Telephone']);
			@$Contact_Mobile		= trim($row['Contact_Mobile']);
			@$Contact_Email_address		= trim($row['Contact_Email_address']);
			@$sts		= trim($row['sts']);
			
	//SELECT `Area`, `Account_name`, `Address1`, `Address2`, `Address3`, `Address4`, `PostCode`, `Country`, `General_Email_`, `Telephone`, `www`, `KompassCategory_5`, `Note`, `Additional_note`, `note_2`, `Contact_Title`, `Contact_First_Name`, `Contact_Lastname`, `job_title`, `Contact_Telephone`, `Contact_Mobile`, `Contact_Email_address` FROM `csv` WHERE 1			
			
		}
				
	}		

########################################################################################


	if($_SERVER['REQUEST_METHOD']== 'POST')
	{
		if($id==''){
			header("Location:view.php ");
		}
		
					
			
		
			$Area		=  trim($_REQUEST['Area']);
			@$Account_name		=  trim($_REQUEST['Account_name']);
			@$Address1		=  trim($_REQUEST['Address1']);
			@$Address2		=  trim($_REQUEST['Address2']);
			@$Address3		=  trim($_REQUEST['Address3']);
			@$Address4		=  trim($_REQUEST['Address4']);
			@$PostCode		=  trim($_REQUEST['PostCode']);
			@$Country		=  trim($_REQUEST['Country']);
			@$General_Email_ =  trim($_REQUEST['General_Email_']);
			@$Telephone		=  trim($_REQUEST['Telephone']);						
			@$www			=  trim($_REQUEST['www']);
			@$KompassCategory_5		=  trim($_REQUEST['KompassCategory_5']);
			@$Note			=  trim($_REQUEST['Note']);
			@$Additional_note		=  trim($_REQUEST['Additional_note']);
			@$note_2		=  trim($_REQUEST['note_2']);
			@$Contact_Title		=  trim($_REQUEST['Contact_Title']);
			@$Contact_First_Name		=  trim($_REQUEST['Contact_First_Name']);
			@$Contact_Lastname		=  trim($_REQUEST['Contact_Lastname']);
			@$job_title		=  trim($_REQUEST['job_title']);
			@$Contact_Telephone		=  trim($_REQUEST['Contact_Telephone']);
			@$Contact_Mobile		=  trim($_REQUEST['Contact_Mobile']);
			@$Contact_Email_address		=  trim($_REQUEST['Contact_Email_address']);
			@$sts		=  trim($_REQUEST['sts']);		
########################################################################################

		
					$delSql="delete from csv where id=$id " ;
					//echo $updSql;
					if($dbcon->executeNonQuery($delSql)==1){
						
							
							$msg = "<div class='alert alert-warning'><strong>Success : </strong>The application deleted, </div>";
							
						
					}else{
						
					}	
					
			
	
		
	
}else{
					//$msg = "<div class='alert alert-warning'><strong> </strong>  The Application already approved</div>";
}	
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> My | Application  </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">

    <link href="css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <link href="css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">

    <link href="css/plugins/cropper/cropper.min.css" rel="stylesheet">

    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <link href="css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">

    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">

    <link href="css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
	
</head>

<body class="">
<style>
.noborder
{
 
 border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid #cccccc;
  
}
 #map {
        height: 20%;
		width:60%;
      }
</style>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                           <!-- <img alt="image" class="img-circle" src="img/profile_small.jpg" /> -->
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Application</strong>
                             </span> <span class="text-muted text-xs block">Application Details<b class="caret"></b></span> </span> </a>
                <!--        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul> -->
                    </div>
                    <div class="logo-element">
                        Application+
                    </div>
                </li>
                <li>
                    <a href="editapp.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                   <ul class="nav nav-second-level collapse">
                      		
                      <li><a href="view.php">View  Applications</a></li> 
					
						
                    </ul>
                </li>
              
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top default-skin" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
          <li> <span class="m-r-sm text-muted welcome-message">Welcome ,</span> </li>
          <li> <a href="<?php echo $base_url;?>systemSettings/changePassword.php?PG=CS" class="special_link"> <?php echo  $auth->getUser()->getFullName();?></a> </li>
          <li> <a href="logoff.php"> <i class="fa fa-sign-out"></i> Log out </a> </li>
          <li> <a class="right-sidebar-toggle"> <i class="fa fa-tasks"></i> </a> </li>
        </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Manage Application</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="ins.php">Enter Your</a>
                        </li>
                        <li class="active">
                            <strong>Details</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                     
                    </div>
                </div>
            </div>
 
         <div class="wrapper wrapper-content animated fadeInRight" >
			<div class="ibox-content" >
			<br><br><br>
			<?php echo @$msg ?>
				<form role="form" class="" method="POST" action="delapp.php">
					
					<!-- ROW #1 -->
										<input type="hidden" class="form-control" id="userid" name="userid" value="<?=$userid?>">
                         <input type="hidden" class="form-control" id="id" name="id" value="<?=$id?>">			
							
							<div class="row" >
							
						
								
								<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Area</label>
                                           <input type="text" placeholder="" class="form-control" name="Area" value="<?php echo $Area ?>" >
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Account_name</label>
                                           <input type="text" placeholder="" class="form-control" name="Account_name" value="<?php echo $Account_name ?>" >
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>  Address1</label>
                                           <input type="text" placeholder="" class="form-control" name="Address1" value="<?php echo $Address1 ?>" >
                                        </div>                                   
									</div>
								
								<div class="hr-line-dashed"></div>
                                   
							</div>
							<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Address2</label>
                                           <input type="text" placeholder="" class="form-control" name="Address2" value="<?php echo $Address2 ?>" >
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Address3</label>
                                           <input type="text" placeholder="" class="form-control" name="Address3" value="<?php echo $Address3 ?>" >
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label> Address4</label>
                                           <input type="text" placeholder="" class="form-control" name="Address4" value="<?php echo $Address4 ?>" >
                                        </div>                                   
									</div>
								
								<div class="hr-line-dashed"></div>
							</div>
							<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label> PostCode</label>
                                           <input type="text" placeholder="" class="form-control" name="PostCode" value="<?php echo $PostCode ?>" >
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Country</label>
                                           <input type="text" placeholder="" class="form-control" name="Country" value="<?php echo $Country ?>" >
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>  General_Email_</label>
                                           <input type="text" placeholder="" class="form-control" name="General_Email_" value="<?php echo $General_Email_ ?>" >
                                        </div>                                   
									</div>
									
								<div class="hr-line-dashed"></div>
							</div>
							
							<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Telephone</label>
                                           <input type="text" placeholder="" class="form-control" name="Telephone" value="<?php echo $Telephone ?>" >
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >www</label>
                                           <input type="text" placeholder="" class="form-control" name="www" value="<?php echo $www ?>" >
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>  KompassCategory_5</label>
                                           <input type="text" placeholder="" class="form-control" name="KompassCategory_5" value="<?php echo $KompassCategory_5 ?>" >
                                        </div>                                   
									</div>
								
								<div class="hr-line-dashed"></div>
							</div>
							<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>  	Note</label>
                                           <textarea  placeholder="" class="form-control" name="Note" ><?php echo $Note ?></textarea>
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Additional_note</label>
                                           <textarea  placeholder="" class="form-control" name="Additional_note" ><?php echo $Additional_note ?></textarea>
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label> note_2 </label>
                                            <textarea  placeholder="" class="form-control" name="note_2" ><?php echo $note_2 ?></textarea>
                                        </div>                                   
									</div>
									
								<div class="hr-line-dashed"></div>
							</div>
						
						<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Contact_Title</label>
                                           <input type="text" placeholder="" class="form-control" name="Contact_Title" value="<?php echo $Contact_Title ?>" >
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Contact_First_Name</label>
                                           <input type="text" placeholder="" class="form-control" name="Contact_First_Name" value="<?php echo $Contact_First_Name ?>" >
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>  Contact_Lastname</label>
                                           <input type="text" placeholder="" class="form-control" name="Contact_Lastname" value="<?php echo $Contact_Lastname ?>" >
                                        </div>                                   
									</div>
								
								<div class="hr-line-dashed"></div>
							</div>
							<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >job_title</label>
                                           <input type="text" placeholder="" class="form-control" name="job_title" value="<?php echo $job_title ?>" >
                                        </div>
									</div>	
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Contact_Telephone</label>
                                           <input type="text" placeholder="" class="form-control" name="Contact_Telephone" value="<?php echo $Contact_Telephone ?>" >
                                        </div>
									</div>
									<div class="col-sm-4">
                                        <div class="form-group">
                                            <label>  Contact_Mobile</label>
                                           <input type="text" placeholder="" class="form-control" name="Contact_Mobile" value="<?php echo $Contact_Mobile ?>" >
                                        </div>                                   
									</div>
								
								<div class="hr-line-dashed"></div>
							</div>
							<div class="row" >
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label >Contact_Email_address</label>
                                           <input type="text" placeholder="" class="form-control" name="job_title" value="<?php echo $job_title ?>" >
                                        </div>
									</div>	
								
								
								<div class="hr-line-dashed"></div>
							</div>
							<div class="form-group">
								<div class="row" >
									<label class="col-md-8 control-label">
										<div class="col-md-2">
											<button class="btn cmdbtn btn-primary" type="submit" id="btnAction" name="btnAction" value="Update"><i class="fa fa-trash-o"   ></i>&nbsp;|&nbsp;Confirm Delete</button>
										</div>
										
									</label>
									
									
								</div>
							</div>
						
							 
							<!--box-->
							
		
				</form>
		
		
		</div>
		
		
	

	</div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
	</div>
</body>

</html>
