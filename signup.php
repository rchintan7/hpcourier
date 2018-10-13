<?php
include('db_connection.php');

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$c_password = $_POST['c_password'];
$s_date=date('y:m:d:h:i:s');
$u_date='NULL';

/*$name = 'aaa';
$email = 'a@gmail.com';
$phone = '1234567480';
$password = 'sasasa';*/

if(!empty($name) &&
	!empty($email) && 
	!empty($phone) && 
	!empty($password) && 
	!empty($c_password)  ){
	
			if($password==$c_password){
					
					$sql = "SELECT * FROM user WHERE email='".$email."'  ";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						die(json_encode(array("success"=>"false","message"=>"Eamil alraedy exits")));
					 }
					 
					$qry="INSERT INTO user SET name='".$name."',email='".$email."',phone='".$phone."',password='".md5($password)."',created_at='".$s_date."',updated_at='".$u_date."' ";
					if (mysqli_query($conn, $qry)) {
						die(json_encode(array("success"=>"true","message"=>"Record inserted successfully")));
					} else {
						 die(json_encode(array("success"=>"false","message"=>"Someting wrong please try again.")));
					}
			}else{
				die(json_encode(array("success"=>"false","message"=>"Password dose not match")));
			}
}else{
    die(json_encode(array("success"=>"false","message"=>"Empty request parameter(s)!")));
}

?>