
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Browse Products</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<style>
		table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
		}

		td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
		}

		tr:nth-child(even) {
		background-color: #dddddd;
		}
</style>

    <?php 
		include_once ('./header.php');
		require_once '../controller/product-info.php';

		$products = fetchAllProducts();
    ?>
	
</head>
<body>
<div>
 	   <h3 style="color: red; background-color: yellow;" align="center">Shop</h3>
 </div>
 <input id="myInput" type="text" placeholder="Search..">
<br><br>

<!-- for pagination -->

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="table-data">
		  
      </div>
    </div>
  </div>
</div>

<!------------------ old code 
 <table>
	<thead>
		<tr>
            <th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody id="myTable">
		<?php /* foreach ($products as $i => $product): ?>
			<tr>
                <td><?php echo $product['ID'] ?> </td>
				<td><a href="show-product.php?id=<?php echo $product['ID'] ?>" >
				<?php echo $product['Name'] ?> </a> </td>
				<td><?php echo $product['Sell_Price'] ?></td>
				<!--<td><?php // echo $product['image'] ?></td>-->
                <td><img width="100px" src="../Upload/?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
				<td><a href="add-to-cart.php?id=<?php echo $product['ID'] ?>">Add to cart</td>
			</tr>
		<?php endforeach; */?>
		

	</tbody>
	

</table>
------------------------>

<script type="text/javascript">
		$(document).ready(function(){
			function loadData(page){
			$.ajax({
				url  : "../Controller/pagination.php",
				type : "POST",
				cache: false,
				data : {page_no:page},
				success:function(response){
				$("#table-data").html(response);
				}
			});
			}
			loadData();
			
			// Pagination code
			$(document).on("click", ".pagination li a", function(e){
			e.preventDefault();
			var pageId = $(this).attr("ID");
			loadData(pageId);
			});
		});
	</script>

	<script>
		$(document).ready(function(){
  			$("#myInput").on("keyup", function() {
    			var value = $(this).val().toLowerCase();
    			$("#myTable tr").filter(function() {
      				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    			});
  			});
		});
	</script>
</body>
</html>

<?php 
    include ('./footer.php');
?>