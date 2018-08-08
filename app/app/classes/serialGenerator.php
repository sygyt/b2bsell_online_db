<?php
class SerialGenerator{
	function Generate($prefix,$length,$table,$field,$conditions=""){
	/**************************************************
	Created By		-> Rasika bandaranayaka
	Created Date	-> 
	$prefix			-> Prefix to be included within the serial number.
	$length			-> Full character length of the generated serial code.
	$table			-> Database table to be used to select the field.
	$field			-> The field of the table.
	$conditions		-> conditions can be applied in WHERE clause (field='value'||field='value'&&field='value')
	
	***************************************************/

		//generate the condition string of the select query
		$sql="SELECT $field FROM $table ";
		if($conditions!=""){
			$sql.="WHERE $conditions ";
		}
		$sql.="ORDER BY $field DESC";
		//get length of the prefix
		$prefixlength=strlen($prefix);
		//execute the generated select query
		//	echo $sql;
		$result_query=mysql_query($sql);
		if(mysql_num_rows($result_query)>0){
			$record=mysql_fetch_array($result_query);	
			$Id=trim($record[0]);
			$Id++;
			
			//get the concatenated ZERO string using the lengths of the prefix and the full length
			$zerocount="";
			for($x=1;$x<=$length;$x++){
				$zerocount.="0";
			}
			
			$Id=$zerocount.$Id;
			$Id=$prefix.substr($Id,-($length-$prefixlength));
		}else{
			//get the starting serial number
			//get the concatenated ZERO string using the lengths of the prefix,number1 and the full length
			$zerolength2=$length-($prefixlength+1);
			$zerocount2="";
			for($y=1;$y<=$zerolength2;$y++){
				$zerocount2.="0";
			}
			$Id=$prefix.$zerocount2."1";
		}
		return $Id;
	}
}
?>