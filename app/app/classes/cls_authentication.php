<?php
require_once("cls_users.php");
require_once("cls_write_log.php");
require_once ('cls_configaration.php');
/*--------------------------------------------------------------------------*/
// Access type 0 - AS NORMAL USER, 1 - AS HIGHER OFFICERS, 2 - AS AUTHOR 	//
//																			//
/*--------------------------------------------------------------------------*/

class Authentication {
    private $User;
    private $PageAccessType;
    private $UserAccessType;
    private $Status = false;
    private $PageID = 0;

    function __construct($required) {
        if(isset($_SESSION['SMSVRCN']) && $_SESSION['SMSVRCN'] ) {
            //if loggedin
            
            $this->User = $_SESSION['SMSVRCN'];
            $this->Status = true;
        } else {
            //if not loggedin
            if ($required) {
				$config			=new Configuration();
				$base_url=$config->base_url();
				$loginpath="Location: ".$base_url;
				header($loginpath); 
                //WriteLog::append("<strong>Error 1004 : Authentication error header command failed to execute</strong>", "system_error_log.txt");
                die("<strong>Error 1004 : Authentication error, Header command failed to execute</strong>");
            } else {
                $this->User = new User();
            }
        }
    }

    public function checkAccess($pageid, $con) {
        $sql = "SELECT COUNT(*) FROM page_access WHERE page_id = '$pageid' AND user_type_id = '" . $this->User->getUserType() . "'";
        $this->PageID = $pageid;
        try {
            $count = $con->getCount($sql);
            if ($count < 1) {
                $config			=new Configuration();
				$base_url=$config->base_url();
				$loginpath="Location: ".$base_url."AccessDenied.php";
				header($loginpath); 
				//die('<html><head><title>ACCESS DENIED</title><style type="text/css"> body{font-family:Arial, Helvetica, sans-serif;font-size:11px;color:#FFFFFF;background-color:#E7E6E4;margin:0px;} a{ color:#FFFFFF;} .main{text-align:center; border:1px solid #666; font-size:14px; background-color:#999997;width:500px;margin:40px auto;font-weight:bold;-moz-border-radius:8px;padding:10px;} .message{color:#004040; font-size:16px;}</style></head><body><div class="main" align="center"><span class="message">Error 3002 : <span style="color:#F82507;">Access Denied</span><br /><br />You don\'t have permissions to access this file. <br />Contact your administrator.</span><br /><br /><a href="javascript:;" onClick="history.go(-1);">Go Back</a> or <a href="index.php">Go to Home Page</a></div></body></html>');
            }
        } catch (Exception $e) {
            WriteLog::append($e->getMessage(), "system_error_log.txt");
            die("Error 3003 : Authentication error, Contact system administrator");
        }
    }
    
	public function checkAccessModule($pageid, $con) {
        $sql = "SELECT COUNT(*) FROM page_access WHERE page_id = '$pageid' AND user_type_id = '" . $this->User->getUserType() . "'";
        $this->PageID = $pageid;
        try {
            $count = $con->getCount($sql);
            if ($count < 1) {
                return false;
            }
        } catch (Exception $e) {
            WriteLog::append($e->getMessage(), "system_error_log.txt");
            die("Error 3003 : Authentication error, Contact system administrator".$sql);
        }
        return true;
    }
	function sessionTimeout()
	{
			//	Time Out Function
		$inactivate = 2700; //seconds
		
	 
		// check to see if $_SESSION['timeout'] is set
		if(isset($_SESSION['timeout']) )
		{
			$session_life = time() - $_SESSION['timeout'];
			if($session_life > $inactivate)
			{ 
				session_destroy(); 
				$config			=new Configuration();
				$base_url=$config->base_url();
				$loginpath="Location: ".$base_url."login.php";
				header($loginpath); 
			}
		}
	    $_SESSION['timeout'] = time();
	}
    
    public function getUser() {
        return $this->User;
    }
    public function getStatus() {
        return $this->Status;
    }
    public function getAccessType() {
        return $this->UserAccessType;
    }
    public function getPageId() {
        return $this->PageID;
    }
}
