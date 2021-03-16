<?php 
	include 'inc/header.php';
	// include 'inc/slider.php';
 ?>
<?php 

	if(!isset($_GET['proid']) || $_GET['proid'] == NULL){
        echo "<script> window.location = '404.php' </script>";
        
    }else {
        $id = $_GET['proid']; // Lấy productid trên host
    }
	$customer_id = Session::get('customer_id'); // bỏ $ nha chú , $ là biến chứ không phải thuộc tính 
	//$customer_id = Session::get('$customer_id'); // dòng lỗi ,nản chú ghê,easy vậy mà

	
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $quantity = $_POST['quantity'];
        $insertCart = $ct -> add_to_cart($id, $quantity); // hàm check catName khi submit lên
    } 



    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertCompare = $product -> insertCompare($productid, $customer_id); // hàm check catName khi submit lên
    }
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $productid = $_POST['productid'];
        $insertWishlist = $product -> insertWishlist($productid, $customer_id); // hàm check catName khi submit lên
    }
    

    if (isset($_POST['binhluan_submit'])) {
    	if ( Session::get('customer_id')) {
    		$binhluan_insert= $cs->insert_binhluan();
    	}else{
    		$canhbao="Bạn phải đăng nhập trước khi bình luận";
    	}
     	
     } 
          $hiencm=$cs->show_binhluan($id);
 ?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php 
    		$get_product_details = $product->get_details($id);
    		if ($get_product_details) {
    			while ($result_details = $get_product_details->fetch_assoc()) {
    				# code...
    			
    		 ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_details['productName'] ?> </h2>
					<p><?php echo $fm->textShorten($result_details['product_desc'], 150) ?></p>					
					<div class="price">
						<p>Price: <span><?php echo $fm->format_currency($result_details['price'])." VND" ?></span></p>
						<p>Category: <span><?php echo $result_details['catName'] ?></span></p>
						<p>Brand:<span><?php echo $result_details['brandName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" value="1" min="1" />
						<input type="submit" class="buysubmit" name="submit" value="Mua ngay"/>
					</form>




						<?php 
							if(isset($insertCompare)) {
								echo $insertCompare;
							}
							 ?>
					 <?php 
						if (isset($AddtoCart)) {
							echo '<span style="color:red; font-size:18px;">Sản phẩm đã được bạn thêm vào giỏ hàng</span>';
						}
					 ?>	 
					 <?php 
						if (isset($insertCart)) {
							echo $insertCart;
						}
					 ?>	 

				</div>
				<!-- so sánh sản phẩm -->
				<div class="add-cart">
					<div class="button_details">
					<form action="" method="POST">
					
					<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>

					
					<?php
	
					$login_check = Session::get('customer_login'); 
						if($login_check){
							echo ''.'  ';
							
						}else{
							echo '';
						}
							
					?>
					
					
					</form>

					<form action="" method="POST">
					
					<input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>"/>

					
					<?php
	
					$login_check = Session::get('customer_login'); 
						if($login_check){
							
							echo '<input type="submit" class="buysubmit" name="wishlist" value="Lưu vào yêu thích" />';
						}else{
							echo '';
						}
							
					?>
					<?php 
						if(isset($insertWishlist)) {
							echo $insertWishlist;
						}
						 ?>
					
					</form>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="product-desc">
			<h2>Chi tiết sản phẩm</h2>
			<p><?php echo $result_details['product_desc'] ?></p>
	    </div>
		<?php 
		}
    		}
		 ?>		
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>Danh Mục</h2>
					<ul>
						<?php 
						$getall_category = $cat->show_category_fontend();
							if ($getall_category) {
								while ($result_allcat = $getall_category->fetch_assoc()) {
									
								
						 ?>
				      <li><a href="productbycat.php?catid=<?php echo $result_allcat['catId'] ?>"><?php echo $result_allcat['catName'] ?></a></li>
				      <?php 
				      }
							}
				       ?>
    				</ul>
    	
 				</div>
 		</div>
 		<div class="binhluan">
 			<div class="row">
 				<div class="col-md-8" style="margin-left: 20px;">
 					<p style="font-size: 20px;
    font-weight: 500;">Bình luận về sản phẩm</p>
 					<?php 
 					if (isset($binhluan_insert)) {
 					 	echo $binhluan_insert;
 					 } ?>
 					 <?php 
 					if (isset($canhbao)) {
 					 	?>
 					 	<div style="color: #b5b529;font-size: 16px;">
 					 		<?php echo $canhbao; ?>
 					 	</div>
 					 	<?php

 					 } ?>



 					<form action="" method="post">
 						<p><input type="hidden" value="<?php echo $id;?>" name="product_id" class="product_id"></p>
 						<p><input type="hidden" value="<?php echo Session::get('customer_id');?>" name="tennguoibinhluan" class="tennguoibinhluan"></p>
 			<p><textarea class="form-control" rows="5"  name="binhluan" class="noidungbinhluan">
 			</textarea></p>
            <p><input type="submit" name="binhluan_submit" value="Gui binh luan" class="btn btn-success send_comment"></p>
           </form>
          
        


 				</div>
                 <div class="col-md-12" style="margin-bottom: 50px;">
                 	<h1 style="margin-bottom: 45px;">Thông tin các bình luận của khách hàng</h1>
                  <div>
 					<?php 
    		    if ($hiencm) {
    			while ($result_cm = $hiencm->fetch_assoc()) {
    				$cus=$cs->show_customers($result_cm['tenbinhluan']);
    				$cus=$cus->fetch_assoc();
    				?>
    				<div class="col-md-12">
    				  	<div class="col-md-12">
    				  	  
						<img src="images/binh.jpg" style="width: 40px;" alt=""  /><span style="margin-left: 10px;font-size: 14px;
    text-transform: uppercase;
    font-weight: 700;"><?php echo $cus['name'] ?></span>
					   
    				  	</div>
    				  	<div class="col-md-12" style="margin-top: 0px; margin-left:50px; color: gray;">
    				  	  	<?php echo $result_cm['binhluan'] ?>
    				  	  	<hr>
    				  	</div>

    				</div>
					
					
					<div>
    				<?php
    			}}
    		 ?>
 				</div>

 			
 		</div>
                 </div>
 			

 	</div>

<?php 

	include 'inc/footer.php';
 ?>