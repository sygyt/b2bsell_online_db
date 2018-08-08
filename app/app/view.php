<?php
	require_once ('classes/cls_database.php');
	require_once ('classes/cls_authentication.php');
	require_once ('classes/cls_configaration.php');
	require_once("classes/serialGenerator.php");

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
	
	$date = date("Y-m-d");
	//$auth->checkAccess(1, $dbcon);
	$msg="";
	@$updatewht	= trim($_REQUEST['id']);
	
	if($userType==2){
		header("Location:logoff.php ");
	}
	
	
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Application | List </title>
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
<link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">

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
                    <a href="view.php"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
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
                    <h2>Application List</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="cv.php">View Application </a>
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
<div class="wrapper wrapper-content animated fadeInDown">
      <div class="row">
        <div class="col-md-12">
                    <div class="ibox ">
                       
                        <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
					 <th> View/Edit</th>
						<th> Delete</th>
                       	<th >id</th>
                       	<th >Area</th>						
					    <th >Account_name</th>                      
					    <th >Address1</th>                      
					    <th >Address2</th>                      
					    <th >Address3</th>                      
					    <th >Address4</th>                      
                        <th>PostCode</th>
                        <th> Country</th>
                        <th> General_Email_</th>
                        <th> Telephone</th>
                        <th> www</th>
                        <th> KompassCategory_5</th>
                        <th> Note</th>
                        <th> Additional_note</th>
                        <th> note_2</th>
                        <th> Contact_Title</th>
                        <th> Contact_First_Name</th>
                        <th> Contact_Lastname</th>
                        <th> job_title</th>
                        <th> Contact_Telephone</th>
                        <th> Contact_Mobile</th>
                        <th> Contact_Email_address</th>
                       
                       
                    </tr>
                    </thead>
                     <tbody>
                     <?php  $sql= "SELECT *  FROM csv ORDER BY id DESC";
		$result= mysql_query($sql);
	
//SELECT `Area`, `Account_name`, `Address1`, `Address2`, `Address3`, `Address4`, `PostCode`, `Country`, `General_Email_`, `Telephone`, `www`, `KompassCategory_5`, `Note`, `Additional_note`, `note_2`, `Contact_Title`, `Contact_First_Name`, `Contact_Lastname`, `job_title`, `Contact_Telephone`, `Contact_Mobile`, `Contact_Email_address` FROM `csv` WHERE 1
	
		while( $row_app_details=mysql_fetch_array($result)){ 
?>
					 <tr>
					  <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>">View/Edit</a></td>
	  <td><a href="delapp.php?PG=AV&id=<?=trim($row_app_details['id'])?>">Delete</a></td>
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['id'])?></a></td>
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Area'])?></a></td>
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Account_name'])?></a></td>
    
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Address1'])?></a></td>
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Address2'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Address3'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Address4'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['PostCode'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Country'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['General_Email_'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Telephone'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['www'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['KompassCategory_5'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Note'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Additional_note'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['note_2'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Contact_Title'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Contact_First_Name'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Contact_Lastname'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['job_title'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Contact_Telephone'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Contact_Mobile'])?></a></td>   
    <td><a href="edit.php?PG=AV&id=<?=trim($row_app_details['id'])?>"><?=trim($row_app_details['Contact_Email_address'])?></a></td>   
       
    
     
    
   
    
     </tr>
        

    <? } ?>
    				</tbody>

                   
                    </table>
                        </div><br>
						
                    </div>
                    </div>
                </div>
                 
      </div>
    </div>
            
            <div class="footer">
                <div class="pull-right">
                     <strong></strong> .
                </div>
                <div>
                    <strong>Copyright</strong>
                </div>
            </div>

        </div>
        </div>

<script src="js/jquery-3.1.1.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script> 
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script> 
<script src="js/plugins/dataTables/datatables.min.js"></script> 

<!-- Custom and plugin javascript --> 
<script src="js/inspinia.js"></script> 
<script src="js/plugins/pace/pace.min.js"></script> 
<script src="js/plugins/typehead/bootstrap3-typeahead.min.js"></script>
 <script>
            $(document).ready(function () {
				
				 $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
				lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'excel', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });
			    });
        </script>
</body>

</html>