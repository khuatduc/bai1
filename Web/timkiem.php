<?php 
	include 'inc/header.php';
	include 'inc/slider.php';
 ?>	

<?php
    // gọi class category
    $pd = new product(); 
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit1'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
         $tukhoa = $_POST['tukhoa'];
         $timkiemproduct = $pd -> timkiemproduct($tukhoa); // hàm check catName khi submit lên
    }
  ?>

   
 <div class="main">
 	
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Sản phẩm tìm kiếm <span style="color: yellow;"><?php echo $tukhoa ?></span></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      	if(!empty($timkiemproduct)){
	      		while ($result = $timkiemproduct->fetch_assoc()) {
	      			      	
	      	 ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productId'] ?>"><img style=" height: 200px; margin-bottom: 30px;" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
					 <h2 style="height: 90px!important,margin-bottom: 30px;"><?php echo $result['productName'] ?></h2>
					 <!-- <p><?php echo $fm->textShorten($result['product_desc'], 50) ?></p> -->
					 <p><span class="price"><?php echo $fm->format_currency($result['price'])." "."VND" ?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php 
				}
				}else{
					 ?>
					 <div style="color: red;">không tìm thấy sản phẩm <?php echo $tukhoa; ?></div>
				 <?php
				}
				 ?>
				
			</div>
			
			
			
	     
    </div>
 </div>
<?php 
	include 'inc/footer.php';
 ?>
