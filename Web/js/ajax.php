<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
	$db=new Database();
	if(isset($_POST["submit"])){
	if(!empty($_POST["name"])&&!empty($_POST["city"])&& !empty($_POST["zipcode"])&& !empty($_POST["email"])&& !empty($_POST["address"])&& !empty($_POST["country"])&& !empty($_POST["phone"])&& !empty($_POST["password"])){

		            $name=$_POST["name"];
					$city=$_POST["city"];
					$zipcode=$_POST["zipcode"];
					$email=$_POST["email"];
					$address=$_POST["address"];
					$country=$_POST["country"];
					$phone=$_POST["phone"];
					$password=md5($_POST["password"]);
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $db->select($check_email);
				if ($result_check) {
					echo "email đã tồn tại ";
					
				}else {
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$password') ";
					$result = $db->insert($query);
					if($result){
						echo "Đăng ký thành công";
						
					}else {
						echo "Đăng ký thất bại";
						
					}
				}
			}else{
				 echo "không được bỏ trống ";
				
			}
		}
?>


 
