
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Browse Products</title>

    <?php 
    include_once ('./header.php');
    include_once ('../Controller/shop-check.php');
    ?>

    <?php  
    require_once '../controller/product-info.php';

    $products = fetchAllProducts();

    ?>
</head>
<body>
<div>

 	   <h3 style="color: red; background-color: yellow;" align="center">Shop</h3>
 </div>

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
	<tbody>
		<?php foreach ($products as $i => $product): ?>
			<tr>
				<td><a href="show-product.php?id=<?php echo $product['ID'] ?>" >
                <?php echo $product['ID'] ?></a></td>
				<td><?php echo $product['Name'] ?></td>
				<td><?php echo $product['Sell_Price'] ?></td>
				<td><?php echo $product['image'] ?></td>
                <td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
				<td><a href="add-to-cart.php?id=<?php echo $product['ID'] ?>">Add to cart</td>
			</tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>

<?php 
    include ('./footer.php');
?>