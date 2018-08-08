<?php
	require_once("cls_write_log.php");
	require_once("cls_read_settings.php");
	require_once ('cls_configaration.php');
	class DataBase
	{		
		private $db_link = "";
		private $last_sql_result = "";
		
		public function __construct()
		{
	
				$hostname='mysql:unix_socket=/cloudsql/serdbcontact;dbname=ser';
				$username='admin';
				$password='admin';
				$datebase='ser';
			if($this->db_link = @mysql_connect($hostname, $username, $password)){
				//"Error 1001
				if(@mysql_select_db($datebase)){
				
				}else{
					WriteLog::append("<strong>Error 1001 : Cannot find the Database</strong>", "system_error_log.txt");
					$config			=new Configuration();
					$base_url=$config->base_url();
					
					$redpath="Location: ".$base_url."DatabaseUnabletConnect.php";
					header($redpath);
					// or die ("<strong>Error 1001 : Cannot find the Database</strong>");
				}
			}else{
				WriteLog::append("<strong>Error 1002 : DatabaseUnabletConnect</strong>", "system_error_log.txt");
				//header("Location:DatabaseUnabletConnect.php");
					$config			=new Configuration();
					$base_url=$config->base_url();
					$redpath="Location: ".$base_url."DatabaseUnabletConnect.php";
					header($redpath);
				// "Error 1002"
			}
			
		}
		
		public function disconnect()
		{
			mysql_close($this->db_link);
		}
		
		public function executeQuery($sql)
		{
			$result = mysql_query($sql);
			if($result) 
			{
				return $result;
			} 
			else 
			{
				WriteLog::append(mysql_error(), "system_error_log.txt");
				throw new Exception("Error 1003 : " . htmlspecialchars(mysql_error(), ENT_QUOTES));
			}
		}
		
		public function executeNonQuery($sql)
		{
			if(mysql_query($sql)) 
			{
				return mysql_affected_rows();
			}
			else 
			{
				WriteLog::append(htmlspecialchars(mysql_error(), ENT_QUOTES), "system_error_log.txt");
				throw new Exception("Error 1003 : " . htmlspecialchars(mysql_error(), ENT_QUOTES));
			}
		}
		
		public function executeNonQuerys($sqls)
		{
			$isOk = true;
			mysql_query("BEGIN");
			foreach($sqls as $sql)
			{
				if(!mysql_query($sql)) $isOk = false;
			}
			
			if($isOk) 
			{
				mysql_query("COMMIT");
				return mysql_affected_rows();
			} 
			else 
			{
				WriteLog::append(htmlspecialchars(mysql_error(), ENT_QUOTES), "system_error_log.txt");
				mysql_query("ROLLBACK");				
				throw new Exception("Error 1003 : " . htmlspecialchars(mysql_error(), ENT_QUOTES));
			}
		}	
		
		public function getCount($sql)
		{
			$result = mysql_query($sql);
			if($result) 
			{
				return mysql_result($result, 0);
			} 
			else 
			{
				WriteLog::append(mysql_error(), "system_error_log.txt");
				throw new Exception("Error 1003 : " . htmlspecialchars(mysql_error(), ENT_QUOTES));
			}
		}
		
		public function begin()
		{
			return $this->executeQuery("BEGIN");
		}
		
		public function commit()
		{
			return $this->executeQuery("COMMIT");
		}
		
		public function rollback()
		{
			return $this->executeQuery("ROLLBACK");
		}
		
		//public function getLastSqlResult() { return $this->last_sql_result; }
		public function getDBLink()  { return $this->db_link; }
	}
?>