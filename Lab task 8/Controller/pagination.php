<?php

	// Connect database 

	require_once('../Model/db_connect.php');
    require_once('../Model/model.php');
    require_once('../Model/mysqli-model.php');
    require_once('../Model/connection.php');

    $con= my_conn();
	$limit = 5;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT * FROM product LIMIT $offset, $limit";

	$result = mysqli_query($con, $query);

	$output = "";

	if (mysqli_num_rows($result) > 0) {

        $output.="<table class='table'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>

            <tbody id='myTable'>";
        while ($row = mysqli_fetch_assoc($result)) {

            $output.="<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['Name']}</td>
                        <td>{$row['Sell_Price']}</td>
                        <td><img width='100px' src='../Upload/{$row['image']}' alt='{$row['Name']}'> </td>
				        <td><a href='add-to-cart.php?id={$row['ID']}' >Add to cart</td>
                    </tr>";
        } 
        $output.="</tbody>
            </table>";

        $sql = "SELECT * FROM product";

        $records = mysqli_query($con, $sql);

        $totalRecords = mysqli_num_rows($records);

        $totalPage = ceil($totalRecords/$limit);

        $output.="<ul class='pagination justify-content-center' style='margin:20px 0'>";

        for ($i=1; $i <= $totalPage ; $i++) { 
        if ($i == $page_no) {
            $active = "active";
        }else{
            $active = "";
        }

            $output.="<li class='page-item $active'><a class='page-link' ID='$i' href=''>$i</a></li>";
        }

        $output .= "</ul>";

        echo $output;

	}

?>