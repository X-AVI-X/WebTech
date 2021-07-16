<?php

require_once '../model/model.php';

if (isset($_POST['findProduct'])) {
	
		echo $_POST['Name'];

    try {
    	
    	$allSearchedUsers = searchProduct($_POST['Name']);
    	require_once '../show-searched-product.php';

    } catch (Exception $ex) {
    	echo $ex->getMessage();
    }
}

