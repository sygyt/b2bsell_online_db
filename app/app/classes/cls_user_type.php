<?php
class UserType
{
    private $createdBy;
    private $createdDate;
    private $modifiedBy;
    private $modifiedDate;
	
	
	private $userTypeId;
	private $Utype;
	private $userStatus;
	private $updatewht;
    
    public function __construct()
    {
		$this->userTypeId="";
		$this->Utype="";
		$this->userStatus="";
		$this->updatewht="";

    }
// ADD Data
	public function add($dbcon, $user)
	{
	 	$sql="INSERT INTO user_type
			        ( type_name,stat, created_by, created_date)
				VALUES 
					('".$this->Utype."','".$this->userStatus."', '".$this->createdBy."' , '".$this->createdDate."')
		";
		if($dbcon->executeNonQuery($sql)){return true;}else{return false;}		
	}
// Update Data
	public function update($dbcon, $user)
	{
		  $sql="UPDATE user_type
				SET type_name = '".$this->Utype."',
				  stat = '".$this->userStatus."',
				  modified_by = '".$this->modifiedBy."',
				  modified_date = '".$this->modifiedDate."'
				WHERE user_type_id = '".$this->updatewht."'
		";
		
		if($dbcon->executeNonQuery($sql)){return true;}else{return false;}		
	}
//Usertype validation
	public function validUserType($dbcon, $user)
	{
		//	echo $this->Utype;exit;
			
			$sql="SELECT * FROM user_type WHERE type_name = '".$this->Utype."'";
			$res = $dbcon->executeQuery($sql);	
			$rows = mysql_num_rows($res);
			if($rows != 0)
			{
				return false;
			}
			else 
			{
				return true;
			}
			
				
	}
	
############################################################################################################
public function set_userTypeId($userTypeId){    $this->userTypeId = $userTypeId;   }
public function set_Utype($Utype){    			$this->Utype = $Utype;   }
public function set_userStatus($userStatus){    $this->userStatus = $userStatus;   }

public function set_updatewht($updatewht){    	$this->updatewht = $updatewht;   }
public function set_createdBy($createdBy){    	$this->createdBy = $createdBy;   }
public function set_createdDate($createdDate){  $this->createdDate = $createdDate;   }
public function set_modifiedBy($modifiedBy){    $this->modifiedBy = $modifiedBy;   }
public function set_modifiedDate($modifiedDate){    $this->modifiedDate = $modifiedDate;   }
#################################################################################################################	
  
}