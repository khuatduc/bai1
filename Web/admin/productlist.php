﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../controller/category.php';  ?>
<?php include '../controller/cart.php';  ?>
<?php include '../controller/brand.php';  ?> 
<?php include '../controller/product.php';  ?>
<?php require_once '../helpers/format.php'; ?>
<?php 
	$pd = new product();
	$fm = new Format();
	if(!isset($_GET['productid']) || $_GET['productid'] == NULL){
        // echo "<script> window.location = 'catlist.php' </script>";
        
    }else {
        $id = $_GET['productid']; // Lấy catid trên host
        $delProduct = $pd -> del_product($id); // hàm check delete Name khi submit lên
    }
 ?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Tất cả sản phẩm</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>ID</th>
					<th>Code</th>
					<th>Tên sản phẩm</th>
					<th>Nhập hàng</th>
					<th>Số lượng nhập</th>
					<th>Đã bán</th>
					<th>Tồn</th>
					<th>Giá</th>
					<th>Image</th>
					<th>Mô tả</th>
					<th>Danh mục</th>
					<th>Thương hiệu</th>
					
					<th>Loại</th>
					<th>Xử lý</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				
				$pdlist = $pd->show_product();
				$i = 0;
				
				
					if($pdlist){
					
							while ($result = $pdlist->fetch_assoc()){
								$i++;
									
									
				 ?>
				<tr class="odd gradeX">
					<td><?php echo $i ?></td>
					<td><?php echo $result['product_code'] ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><a href="productmorequantity.php?productid=<?php echo $result['productId'] ?>">Nhập hàng</a></td>
					<td>
						<?php echo $result['productQuantity'] ?>

					</td>
					<td>
						<?php echo $result['product_soldout'] ?>

					</td>
					<td>
						<?php echo $result['product_remain'] ?>

					</td>
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="80"></td>
					<td><?php echo $fm->textShorten($result['product_desc'],20) ?></td>
					<td><?php echo $result['catName'] ?></td>
					<td><?php echo $result['brandName'] ?></td>
					
					<td><?php 
						if($result['type']==0){
							echo 'Nổi bật';
						}else{
							echo 'Không Nổi Bật';
						}

					?></td>
					
					<td><a href="productedit.php?productid=<?php echo $result['productId'] ?>">Sửa</a> || <a  onclick = "return confirm('bạn chắc chắn muốn xóa???')" href="?productid=<?php echo $result['productId'] ?>">Xóa</a></td>
				</tr>
				<?php
							
						
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>