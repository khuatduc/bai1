<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>


 
<?php 
	/**
	* 
	*/
	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();

		}

		public function insert_binhluan(){

              $tenbinhluan=$_POST['tennguoibinhluan'];
              $binhluan=$_POST['binhluan'];
              $product_id=$_POST['product_id'];
              if($tenbinhluan == "" || $binhluan == ""){
				$alert = "<span class='error'>không được bỏ trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_binhluan(tenbinhluan,binhluan,product_id) VALUES('$tenbinhluan','$binhluan','$product_id') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Binh luan thành công</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>binh luan ko thanh cong</span>";
						return $alert;
					}
			}
		}

		public function show_binhluan($id)
		{
			$query = "SELECT * FROM tbl_binhluan WHERE product_id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}

		public function insert_customer($date)
		{
			$name = mysqli_real_escape_string($this->db->link, $date['name']);
			$city = mysqli_real_escape_string($this->db->link, $date['city']);
			$zipcode = mysqli_real_escape_string($this->db->link, $date['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $date['email']);
			$address = mysqli_real_escape_string($this->db->link, $date['address']);
			$country = mysqli_real_escape_string($this->db->link, $date['country']);
			$phone = mysqli_real_escape_string($this->db->link, $date['phone']);
			$password = mysqli_real_escape_string($this->db->link, md5($date['password']));

			if($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $country == "" || $phone == "" || $password == ""){
				$alert = "<span class='error'>không được bỏ trống</span>";
				return $alert;
			}else{
				$check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
				$result_check = $this->db->select($check_email);
				if ($result_check) {
					$alert = "<span class='error'>email đã tồn tại </span>";
					return $alert;
				}else {
					$query = "INSERT INTO tbl_customer(name,city,zipcode,email,address,country,phone,password) VALUES('$name','$city','$zipcode','$email','$address','$country','$phone','$password') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='success'>Đăng ký thành công</span>";
						return $alert;
					}else {
						$alert = "<span class='error'>Đăng ký thất bại</span>";
						return $alert;
					}
				}
			}
		}


		public function login_customer($date)
		{
			$email =  $date['email'];
			$password = md5($date['password']);
			if($email == '' || $password == ''){
				$alert = "<span class='error'>email và password ko được bỏ trống</span>";
				return $alert;
			}else{
				$check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
				$result_check = $this->db->select($check_login);
				if ($result_check != false) {
					$value = $result_check->fetch_assoc();
					Session::set('customer_login', true);
					Session::set('customer_id', $value['id']);
					Session::set('customer_name', $value['name']);
					header('Location:cart.php');
				}else {
					$alert = "<span class='error'>email or mật khẩu không đúng</span>";
					return $alert;
				}
			}
		}



		public function show_customers($id)
		{
			$query = "SELECT * FROM tbl_customer WHERE id='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_customers($data, $id)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			
			if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone ==""){
				$alert = "<span class='error'>Fields must be not empty</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id ='$id'";
				$result = $this->db->insert($query);
				if($result){
						$alert = "<span class='success'>Khách hàng Updated thành công</span>";
						return $alert;
				}else{
						$alert = "<span class='error'>Khách hàng Updated không thành công</span>";
						return $alert;
				}
				
			}
		}

	}
 ?>