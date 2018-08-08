<?php

 include('config.php');
?>

<!DOCTYPE html> 
 <html>
 <header>

 
<style type="text/css">
.file-upload {
  position: relative;
  display: inline-block;
}

.file-upload__label {
  display: block;
  padding: 1em 1em;
  color: #fff;
  background: #222;
  border-radius: .4em;
  transition: background .3s;
}
.file-upload__label:hover {
  cursor: pointer;
  background: #000;
}

.file-upload__input {
  position: absolute;
  left: 0;
  top: 0;
  right: 0;
  bottom: 0;
  font-size: 1;
  width: 0;
  height: 100%;
  opacity: 0;
}
html {
  font-family: 'helvetica neue', 'arial', sans-serif;
  font-size: 24px;
  font-weight: bold;
  padding-top: 1em;
  -webkit-font-smoothing: antialiased;
  text-align: center;
  background: #0082cd;
  background-image:url('horse2.jpg'); 
   background-repeat: no-repeat;
    background-size: 100% ;
}


@import url(https://fonts.googleapis.com/css?family=Sansita+One);

#container {
  background-color:#fff;
}

.big-button {
  position: relative;
  background-color:#ccffcc;
  color: #000000;
  font-family: 'Sansita One', cursive;
  font-size: 26px;
  font-weight: 500;
  
  //margin: 10px auto;
  padding: 10px;
  height: 150px;
  width: 270px;
  text-decoration: none;
  text-transform: capitalize;
  
  
  -webkit-border-radius: 12px;
  -moz-border-radius: 12px;
  border-radius: 12px;
  
  -webkit-box-shadow: 0px 15px 0px #009933, 0px 10px 25px rgba(0,0,0,.5);
  -moz-box-shadow: 0px 15px 0px #009933, 0px 10px 25px rgba(0,0,0,.5);
  box-shadow: 0px 15px 0px #009933, 0px 10px 25px rgba(0,0,0,.5);
  
  margin: 50px auto;
  
  border-color: #66ff66;
  border-width: 10px;
  border-radius: 40px 100px 100px 100px;
  padding: 20px;
  cursor: pointer;
}

.big-button:active {
  box-shadow: 0px 3px 0px #33CC33, 0px 3px 6px rgba(0,0,0,.9);
  position: relative;
  top: 10px;
}

.shadow {
  background: #000;
  border-radius: 40px 100px 100px 100px;
  box-shadow: 0 0 20px 10px #111;
  height: 120px;
  width: 270px;
  opacity: 0.2;
  margin: 30px auto;
}

.shadow:active {
  box-shadow: 0px 3px 0px #33CC33, 0px 3px 6px rgba(0,0,0,.9);
  position: relative;
  top: 10px;
}

styled-select {
   background: url(http://i62.tinypic.com/15xvbd5.png) no-repeat 96% 0;
   height: 29px;
   overflow: hidden;
   width: 240px;
}

.styled-select select {
   background: transparent;
   border: none;
   font-size: 14px;
   height: 29px;
   padding: 5px; /* If you add too much padding here, the options won't show in IE */
   width: 268px;
}

.styled-select.slate {
   background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
   height: 34px;
   width: 240px;
}

.styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

/* -------------------- Rounded Corners */
.rounded {
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
}

.semi-square {
   -webkit-border-radius: 5px;
   -moz-border-radius: 5px;
   border-radius: 5px;
}

/* -------------------- Colors: Background */
.slate   { background-color: #ddd; }
.green   { background-color: #779126; }
.blue    { background-color: #3b8ec2; }
.yellow  { background-color: #eec111; }
.black   { background-color: #000; }

/* -------------------- Colors: Text */
.slate select   { color: #000; }
.green select   { color: #fff; }
.blue select    { color: #fff; }
.yellow select  { color: #000; }
.black select   { color: #fff; }


/* -------------------- Select Box Styles: danielneumann.com Method */

#mainselection select {
   border: 0;
   color: #EEE;
   background: transparent;
   font-size: 20px;
   font-weight: bold;
   padding: 2px 10px;
   width: 378px;
   *width: 350px;
   *background: #58B14C;
   -webkit-appearance: none;
}

#mainselection {
   overflow:hidden;
   width:350px;
   -moz-border-radius: 9px 9px 9px 9px;
   -webkit-border-radius: 9px 9px 9px 9px;
   border-radius: 9px 9px 9px 9px;
   box-shadow: 1px 1px 11px #330033;
   background: #58B14C url("http://i62.tinypic.com/15xvbd5.png") no-repeat scroll 319px center;
}


/* -------------------- Select Box Styles: stackoverflow.com Method */
/* -------------------- Source: http://stackoverflow.com/a/5809186 */
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}
.btn {
	background-color: #ffffff; /* Green */
    border: none;
    color: #000000;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
	width:200px;
	border-radius: 8px;
	 cursor: pointer;
}

.btn:hover {
    background-color: #ffd12f; /* Green */
    color: #000000;
}

</style>

 
 </header>
 
 <body>
 <h1 style="color:#ffffff">File Upload</h1>
 <?php
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
	

$rootpath=  getenv("DOCUMENT_ROOT");  
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {
		echo "File: " . $_FILES["file"]["name"] . "<br>";
		// echo "Type: " . $_FILES["file"]["type"] . "<br>";
		// echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "<br>";	


		move_uploaded_file($_FILES["file"]["tmp_name"],"upload/" . $_FILES["file"]["name"]);
	  $filename=$rootpath."/".$uploadpath."/" . $_FILES["file"]["name"];
 $fname=pathinfo( $filename, PATHINFO_FILENAME);
 $fname=substr($fname, 0, -1); 
	 	  
$type = substr($_FILES["file"]["name"], -5, 1);
		
					$qr="LOAD DATA LOCAL
									INFILE '$filename' INTO TABLE csv CHARACTER SET latin2
								   fields terminated by ',' ENCLOSED BY '\"'
	lines terminated by '\\r\\n' IGNORE 1 LINES ";
				
								
				  
					
					  
						
					   if( $conn->query($qr)){
							
									echo $sucessmsg="<font color='#ffd12f'  size='4px' face='Verdana'> Import Successful<br></font>";
					   }else{
								 echo"<font color='red'  size='5px' face='Verdana'>". mysqli_error($conn)."</font>";
								 echo "<br> <a href='javascript:history.back(-1)'>Back</a><br>";
								
						
					   }
				   
		  
	
	
     }
}
 
 ?>

		
<form action="import.php" method="post" enctype="multipart/form-data" name="frm" id="frm">
	
   <!-- <input type="file" name="file" id="file">
    <input type="submit" value="Upload file" name="uploadbtn">-->
	
	<?php
	

//$result=$conn->query($sql);
//$count=$result->num_rows;

	?>
	<div style="position:absolute;right:50px;top:10px;color:#ffffff"> <a href="signout.php" style="color:#ffffff" ></a></div>
	<table align="center">
		<div class="file-upload">
		
		 <br>
		 <br>
		 
			<tr><td><label for="upload" class="file-upload__label" style="padding:20px"> Select CSV file:</label></td></tr>
			
			<tr><td><input id="upload" class="file-upload__input" type="file" name="file"></td></tr>
			<label id="msg" > </label>
			
			
		</div>
	<!--	<div id="container" align="center"> -->
		 <tr><td> <button class="big-button" form="frm" name="uploadbtn" id="uploadbtn" >
			Click to Convert CSV File
		  </button></td></tr>
	
<!--	</div>
	</table>
		<div class="shadow"></div> -->
	</form>
	  <script>
 
   
   var el = document.getElementById('upload');
el.onchange = function(){
  // alert("dddddd");
   document.getElementById('msg').innerHTML=el.value;
   
};
$('.big-button').after("#shadow:active");

   </script>
   
   
   
</body>
 </html>