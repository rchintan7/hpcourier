<?php
include('db_connection.php');


$email = $_POST['email'];
$password = $_POST['password'];

//$email = 'admin@gmail.com';
//$password = 'admin';


if(!empty($email) && 
	!empty($password)  ){

		$sql = "SELECT * FROM user WHERE email='".$email."' AND password='".md5($password)."'  ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) { 
				$UserArray=array(
					"id"=>$row['id'],
					"name"=>$row['name'],
					"email"=>$row['email'],
					"phone"=>$row['phone']);
				}
				die(json_encode(array("success"=>"true","message"=>"Login Sucessfully","User"=>$UserArray)));
		  }else{
		  		die(json_encode(array("success"=>"false","message"=>"User not found")));
		  }

		
}else{
    die(json_encode(array("success"=>"false","message"=>"Empty request parameter(s)!")));
}


?>