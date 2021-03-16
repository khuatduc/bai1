<?php 
	include 'inc/header.php';

	include 'js/ajax.php';
	// include 'inc/slider.php';
 ?>
 <?php 
	$login_check = Session::get('customer_login');
	if ($login_check) {
		header('Location:order.php'); 
	}
?>

<?php
    // gọi class category
     
   //$register=$ajax->register_customer();
 ?>
 <?php 
 	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $login_Customer = $cs -> login_customer($_POST); // hàm check catName khi submit lên
    }
 ?>
 <div class="main">

    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<p>Mời nhập thông tin</p>
        	<?php 
    		if (isset($login_Customer)) {
    			echo $login_Customer;
    		}
    		 ?>
        	<form action="" method="POST">
                	<input type="text" name="email" class="field" placeholder="Nhập email..." >
                    <input type="password" name="password" class="field" placeholder="Nhập password..." >
                 
                 <!-- <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
                    <div class="buttons"><div><input type="submit" name="login" class"grey" value="Đăng nhập" style="
    background: #ffffff;
"></div></div>
                    </form>
                    </div>


                    <!-- đăng ký tài khoản -->

    	<div class="register_account">

    		<h3>Đăng ký tài khoản</h3>
    		<?php 
    		if (isset($ketqua)) {
    			echo $ketqua;
    		}
    		 ?>
    		<form  >
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Nhập Name...">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="Nhập công ty..." >
							</div>
							
							<div>
								<input type="text" name="zipcode" placeholder="Nhập Zipcode...">
							</div>
							<div>
								<input type="text" name="email1" placeholder="Nhập E-Mail...">
							</div>
		    			 </td>
		    			<td>
					<div>
							<input type="text" name="address" placeholder="Nhập địa chỉ...">
					</div>
		    		<div>
							<input type="text" name="country" placeholder="Nhập địa chỉ...">
					</div>       
	
		           <div>
		          <input type="text" name="phone" placeholder="Nhập số điện thoại...">
		          </div>
				  
				  <div>
					<input type="password" name="password1" placeholder="Nhập Password..." style="
    width: 95%;
    height: 33px;
    margin-top: 7px;
">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><input  id="submit" type="button" name="submit"  value="Tạo tài khoản" style="
    background: #ffffff;
"></div></div>
		    
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear" ></div>
    </div>
 </div>

 
 <script type="text/javascript">
		         	$(document).ready(function() {
		         		$("#submit").click(function(event) {
		         			$.ajax({
		         				type: "POST",
		         				url:"js/ajax.php",
		         				data: {
                                 "name": $("input[name=name]").val(),
                                 "address": $("input[name=address]").val(),
                                 "city": $("input[name=city]").val(),
                                 "zipcode": $("input[name=zipcode]").val(),
                                 "email": $("input[name=email1]").val(),
                                 "country": $("input[name=country]").val(),
                                 "phone": $("input[name=phone]").val(),
                                 "password": $("input[name=password1]").val(),
                                 "submit": $("input[name=submit]").val(),
		         				},
		         				success:function(msg){
                                 alert(msg);
		         				},
		         			})
		         			
		         			
		         		});
		         	});
		         </script>


<?php 

	include 'inc/footer.php';
 ?>
