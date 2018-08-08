<?php
class User
{
	private $userId;
    private $userType;
    private $userName;
    private $fullName;
    private $password;
    private $email;
    private $stat;
    private $createdBy;
    private $createdDate;
    private $modifiedBy;
    private $modifiedDate;
    
    private static $inst;
    
    public function __construct()
    {
    	 $this->userId = 0;
    	 $this->userType = 0;
    	 $this->userName = "";
    	 $this->fullName = "";
    	 $this->password = "";
    	 $this->email = "";
    }
	// ADD Data
	public function add($dbcon, $user)
	{
		$sql="INSERT INTO users
			        ( user_type, user_name,full_name,password,email,stat, created_by, created_date)
				VALUES 
					('".$this->userType."', '".$this->userName."', '".$this->fullName."', '".md5($this->password)."', '".$this->email."', '".$this->stat."', '".$this->createdBy."' , '".date("Y-m-d")."')
		";
		if($dbcon->executeNonQuery($sql)){return true;}else{return false;}		
	}
	// Update Data
	public function update($dbcon, $user)
	{
		$sql="UPDATE users
				SET user_type = '".$this->userType."',
				  full_name = '".$this->fullName."',
				  email = '".$this->email."',
				  stat = '".$this->stat."',
				  modified_by = '".$this->modifiedBy."',
				  modified_date = '".$this->modifiedDate."'
				WHERE user_id = '".$this->userId."'
		";
		
		if($dbcon->executeNonQuery($sql)){return true;}else{return false;}		
	}
	// Inactivate 
	public function delete($dbcon, $user)
	{
		$sql="UPDATE users
				SET stat = '0',
				  modified_by = '".$this->userId."',
				  modified_date = '".date("Y-m-d")."'
				WHERE user_id = '".$this->userId."'
		";
				
		$dbcon->executeNonQuery($sql);		
	}
	//Username validation
	public function validUser($dbcon, $user)
	{
			$sql="SELECT * FROM users WHERE user_name = '".$this->userName."'";
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
	public function setUserId($id)
	{
        $this->userId = $id;
    }
	public function getUserId() 
	{
        return $this->userId;
    }
	public function setUserType($type)
	{
        $this->userType = $type;
    }
	public function getUserType() 
	{
        return $this->userType;
    }
	public function setUserName($uname)
	{
        $this->userName = $uname;
    }
	public function getUserName() 
	{
        return $this->userName;
    }
	public function setFullName($fname)
	{
        $this->fullName = $fname;
    }
	public function getFullName()
	{
        return $this->fullName;
    }
	public function setPassword($pw)
	{
        $this->password = $pw;
    }
	public function getPassword() 
	{
        return $this->password;
    }
	public function setStat($st)
	{
        $this->stat = $st;
    }
	public function getStat() 
	{
        return $this->stat;
    }
	public function setEmail($email)
	{
        $this->email = $email;
    }
	public function getEmail() 
	{
        return $this->email;
    }
	public function setCreatedBy($cid)
	{
        $this->createdBy = $cid;
    }
	public function getCreatedBy() 
	{
        return $this->createdBy;
    }
	public function setCreatedDate($cdate)
	{
        $this->createdDate = $cdate;
    }
	public function getCreatedDate() 
	{
        return $this->createdDate;
    }
	public function setModifiedBy($mid)
	{
        $this->modifiedBy = $mid;
    }
	public function getModifiedBy() 
	{
        return $this->modifiedBy;
    }
	public function setModifiedDate($mdate)
	{
        $this->modifiedDate = $mdate;
    }
	public function getModifiedDate() 
	{
        return $this->modifiedDate;
    }
	// Get User Details
	public function getUserDetail($dbcon)
	{
		$sql="SELECT u.user_id, u.user_name, u.user_type, u.full_name, u.stat
				FROM users u
				WHERE u.user_id='".$this->userId."' 
			";
		$result = $dbcon->executeQuery($sql);	
		$row=mysql_fetch_array($result);
		
		self::$inst = new self();
		self::$inst->userId=trim($row['user_id']);
		self::$inst->fullName=trim($row['full_name']);
		self::$inst->userName=trim($row['user_name']);
		self::$inst->userType=trim($row['user_type']);
		self::$inst->stat=trim($row['stat']);
		
		return self::$inst;
	}   
	// Reset User Password
	public function resetPassword($dbcon)
	{
		@$sql="UPDATE users
				SET password = '".md5($this->userName)."',
				  modified_by = '".$user->userId."',
				  modified_date = '".date("Y-m-d")."'
				WHERE user_name = '".$this->userName."'
		";
		
		$dbcon->executeNonQuery($sql);		
	}
	// Caheck Password
	public function checkPassword($dbcon)
	{
		$sql="SELECT *
				FROM users
				WHERE user_name = '".$this->userName."' AND password = '".md5($this->password)."'
		";
		$result = $dbcon->executeQuery($sql);	
		if(mysql_num_rows($result)>0){
			return true;
		}		
		else{
			return false;
		}
	}		
	// Reset User Password
	public function changePassword($dbcon,$CurPass)
	{
		@$sql="UPDATE users
				SET password = '".md5($this->password)."',
				  modified_by = '".$this->modifiedBy."',
				  modified_date = '".$this->modifiedDate."'
				WHERE user_name = '".$this->userName."' AND password = '".md5($CurPass)."'
		";
		
		$dbcon->executeNonQuery($sql);		
	}
}