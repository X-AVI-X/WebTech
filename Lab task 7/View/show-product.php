<?php  
require_once '../Controller/product-info.php';

$product = fetchProduct($_GET['id']);

    include_once "header.php";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Show Product | E-shop.com</title>
</head>
<body>

<table>
		<tr>
            <th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Image</th>
			<!--<th>Action</th> -->
		</tr>
	<tr>
		<td><?php echo $product['ID'] ?></td>
		<td><a href="show-product.php?id=<?php echo $product['ID'] ?>"><?php echo $product['Name'] ?></a></td>
		<td><?php echo $product['Sell_Price'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
	</tr>

</table>

</body>
    <?php include_once ('./footer.php'); ?>
</html>