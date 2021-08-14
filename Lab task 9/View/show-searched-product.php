<?php 
    include_once "header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Search | E-shop.com</title>
	
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
</head>
<body>
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
		<?php foreach ($allSearchedProducts as $i => $product): ?>
			<tr>
				<td><a href="../show-product.php?id=<?php echo $product['ID'] ?>"><?php echo $product['ID'] ?></a></td>
				<td><?php echo $product['Name'] ?></td>
				<td><?php echo $product['Sell_Price'] ?></td>
                <td><img width="100px" src="uploads/<?php echo $product['image'] ?>" alt="<?php echo $product['Name'] ?>"></td>
				<td><a href="add-to-cart.php?id=<?php echo $product['ID'] ?>">Add to cart</td>
            </tr>
		<?php endforeach; ?>
		

	</tbody>
	

</table>


</body>
</html>