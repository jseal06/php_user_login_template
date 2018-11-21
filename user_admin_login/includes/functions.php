<?php 
function sess(){
    session_start();
}
//functions
//create a text validation function
function test_input($data) {
	$data = trim($data);
	$data = htmlentities($data);
	return $data;
}
//username
function validUserName($name) { 
	if ($name == '') {
		return false;
	}
	if (strlen($name) > 150) {
		return false;
	}	
	return true;
}
//title
function validUserTitle($name){
	if($name == ''){
		return false;
		} elseif ($name == "Mr" || 
				  $name == "Mrs" || 
				  $name == "Miss" || 
				  $name == "Dr"){
			return true;
		}
}
function validFirstName($name){
	if ($name == '') {
			return false;
		}
		if (strlen($name) > 150) {
			return false;
		}
		return true;
}
function validSurName($name){
	if ($name == '') {
			return false;
		}
		if (strlen($name) > 150) {
			return false;
		}
		return true;
}

//email with filter
function validEmail($email) {
	if ($email == '') {
		return false;
	}			
	if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		return false;
	}
	return true;
}





// password breater than 8
function validPassword($password) {
	if ($password == '') {
		return false;
	}
	if ((strlen($password) > 20) || (strlen($password) < 8)) {
		return false;
	}
	if (ctype_digit($password) === true) {
		return false;
	}
	return true;
}



function validFormat($format) {
	if ($format == '') {
		return false;
	}
	if ($format == 'plain' or $format =='html') {
		return true;
	} else {
		return true;
	}
}
function validTerms($terms) {
	if ($terms == '' or $terms != 'yes') {
		return false;
	}			
	return true;
}

function newUser(){
	$var1 = $_POST['UserName'];
	$var2 = $_POST['Password'];
	$var3 = $_POST['UserTitle'];
	$var4 = $_POST['FirstName'];
	$var5 = $_POST['surName'];
	$var6 = $_POST['userEmail'];
	//dir address
	$dir = 'data/';
	//file address	
	$file = 'filetest.txt';
	//open file and add data
	if($handle = fopen($dir.$file,'a')){  // overwrite
		$data = "$var1,$var2,$var3,$var4,$var5,$var6 \n";
		fwrite($handle,$data);
		fclose($handle); 
		} else {
		echo "could not open .... ";
		}
}
//open file inside of php
function ifFile(){
	//admin username check
	$dir = 'data/';
	//file address	
	$file = 'p.txt';
	// check a file exists
	if(is_file($dir.$file)){
		//open file
		 $new = fopen($dir.$file,'r');
		 echo $new;
	}

}
function Admin1($var1){
	$var2 = "Admin";
	if($var1 ==  $var2){
		//admin username check
		$dir = 'data/';
		//file address	
		$file = 'filetest.txt';
		$content = "";
		// check a file exists
		if(is_file($dir.$file)){
			//open file
			$new = fopen($dir.$file,'r');
			while ($line = fgets($new)) {
				//test for line exlode code
				$newLine = explode(',',$line);
				//fileNames is file from above
				$UserNameID = $newLine[0];
				$PassW = $newLine[1];
				$flag = 0;
				if ($UserNameID == $var1){
					$flag = 1;
					//return $flag;
					return array($UserNameID, $PassW);
				}
			}
		}
	}
}
function Admin2($var1){
	$var2 = "Admin";
	if($var1 !=  $var2){
		//admin username check
		$dir = 'data/';
		//file address	
		$file = 'filetest.txt';
		$content = "";
		// check a file exists
		if(is_file($dir.$file)){
			//open file
			$new = fopen($dir.$file,'r');
			while ($line = fgets($new)) {
				//test for line exlode code
				$newLine = explode(',',$line);
				//fileNames is file from above
				$UserNameID = $newLine[0];
				$PassW = $newLine[1];
				$flag = 0;
				if ($UserNameID == $var1){
					$flag = 1;
					//return $flag;
					return array($UserNameID, $PassW);
				}
			}
		}
	}
}
function newUser2($var1){
	$var2 = "Admin";
	if($var1 !=  $var2){
		//login checks
		$dir = '/pages/data/';
		//file address	
		$file = 'filetest.txt';
		$content = "";
		// check a file exists
		if(is_file($dir.$file)){
			//open file
			$new = fopen($dir.$file,'r');
			while ($line = fgets($new)) {
				//test for line exlode code
				$newLine = explode(',',$line);
				//fileNames is file from above
				$UserNameID = $newLine[0];
				$PassW = $newLine[1];
				$flag = 0;
				if ($UserNameID == $var1){
					$flag = 1;
					return $flag;
				}
			}
		}
	}
}

function newPW2($var1){
	//password checks
	$dir = 'data/';
	//file address	
	$file = 'filetest.txt';
	$content = "";
	// check a file exists
	if(is_file($dir.$file)){
		//open file
		$new = fopen($dir.$file,'r');
		while ($line = fgets($new)) {
			//test for line exlode code
			$newLine = explode(',',$line);
			//fileNames is file from above
			$UserNameID = $newLine[0];
			$PassW = $newLine[1];
			$flag = 0;
			if ($PassW == $var1){
				$flag = 1;
				return $flag;
			}
		}
	}
}
function checkUser(){
	// check these two varibles
	$var1 = $_POST['UserName'];
	$var2 = $_POST['Password'];
	$dir = 'data/';
	//file address	
	$file = 'filetest.txt';
	//open file and add data
	//must be read only
	if($handle = fopen($dir.$file,'w')){  // overwrite
		//if data matches
	    fwrite($handle,$data);
	    fclose($handle); 
	} else {
	    echo "could not open .... ";
	}
}
function checkData(){
	$dir = 'data/';
	if(is_dir($dir)){
		echo "<p>THIS WORKED 000</p>";
	} else {
		echo "<p>oops .... 1</p>";
	}
	$file ='test.txt';
	$file = readdir($dir);
	echo $file;
}
?>