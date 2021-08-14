<?php
include_once '../View/header.php';
require_once '../model/model.php';

if (isset($_POST['findProduct'])) {
	
		echo 'You searched for "'.$_POST['productName'].'"';

    try {
        $allSearchedProducts = searchProduct($_POST['productName']);
        require_once '../View/show-searched-product.php';

    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
echo "<br>";
include_once '../View/footer.php';
?>
