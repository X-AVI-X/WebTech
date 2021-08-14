<?php 

require_once 'db_connect.php';


function showAllProducts(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `product` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showProduct($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `product` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchProduct($id){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `product` WHERE ID LIKE '%$id%' OR Name like '%$id%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addProduct($data){
	$conn = db_conn();
    $selectQuery = "INSERT into product (Name, Buy_Price, Sell_Price, image)
VALUES (:Name, :Buy_Price, :Sell_Price, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':Name' => $data['name'],
        	':Buy_Price' => $data['Buy_Price'],
        	':Sell_Price' => $data['Sell_Price'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updateProduct($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE product set Name = ?, Buy_Price = ?, Sell_Price = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['Name'], $data['Buy_Price'], $data['Sell_Price'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deleteProduct($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `product` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}


//user registration
function registration($data){
	$conn = db_conn();
    $selectQuery = "INSERT into user_info (uname, name, gender, city, paddress, peraddress, phone, password, email)
VALUES (:uname, :name, :gender, :city, :paddress, :peraddress, :phone, :password, :email)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':gender' => $data['gender'],
            ':city' => $data['city'],
            ':paddress' => $data['paddress'],
            ':peraddress' => $data['peraddress'],
            ':phone' => $data['phone'],
        	':uname' => $data['uname'],
        	':password' => $data['password'],
            ':email' => $data['email']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function updateProfile($uname, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE user_info set name = ?, gender = ?, city = ?, paddress = ?, peraddress = ?, phone = ?, password = ?, email = ? where uname = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
             $data['name'], $data['gender'], $data['city'], $data['paddress'], $data['peraddress'], $data['phone'], $data['password'], $data['email'], $uname
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}