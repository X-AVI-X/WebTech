<?php  
require_once '../Controller/product-info.php';

$product = fetchProduct($_GET['id']);


    include_once "header.php";



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<table>
		<tr>
            <th>ID</th>
			<th>Name</th>
			<th>Price</th>
			<th>Image</th>
			<th>Action</th>
		</tr>
	<tr>
		<td><a href="show-product.php?id=<?php echo $product['ID'] ?>">
                <?php echo $product['ID'] ?></a></td>
				<td><?php echo $product['Name'] ?></td>
				<td><?php echo $product['Sell_Price'] ?></td>
				<td><?php echo $product['image'] ?></td>
		<td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
	</tr>

</table>


</body>
</html>