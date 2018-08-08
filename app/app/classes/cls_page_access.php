<?php
class PageAccess
{
	private $pageId;
    private $userTypeId;
    private $createdBy;
    private $createdDate;
    
  	public function __construct(){
    	 $this->userTypeId = "";
    	 $this->pageId = "";
    }
// ADD Data
	public function add($dbcon){
		$sql="INSERT INTO page_access (page_id, user_type_id, created_by, created_date)
										VALUES ('".$this->pageId."', '".$this->userTypeId."', '".$this->createdBy."', '".date("Y-m-d")."')
		";
		$dbcon->executeNonQuery($sql);
	}
// Delete Data
	public function delete($dbcon){
		$sql="DELETE
				FROM page_access
				WHERE page_id='".$this->pageId."' AND user_type_id='".$this->userTypeId."'";
		
		$dbcon->executeNonQuery($sql);		
	}
// Check Availability
	public function availability($dbcon){
		$sql="SELECT *
				FROM page_access
				WHERE page_id='".$this->pageId."' AND user_type_id='".$this->userTypeId."'";
				
		$result = $dbcon->executeQuery($sql);	
		
		return ($row=mysql_fetch_array($result))? true:false;
	}
	public function setPageId($id){
        $this->pageId = $id;
    }
	public function getPageId(){
        return $this->pageId;
	}
	public function setUserTypeId($id){
        $this->userTypeId = $id;
    }
	public function getUserTypeId(){
        return $this->userTypeId;
	}	
	public function setCreatedBy($cid){
        $this->createdBy = $cid;
    }
	public function getCreatedBy(){
        return $this->createdBy;
    }
	public function setCreatedDate($cdate){
        $this->createdDate = $cdate;
    }
	public function getCreatedDate(){
        return $this->createdDate;
    }  
}