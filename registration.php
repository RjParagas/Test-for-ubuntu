<?php
include('db_connect.php');

    $id = $_GET['id'];
    $fname = $_GET['fname'];
    $mname = $_GET['mname'];
    $lname = $_GET['lname'];
    $contact = $_GET['contact'];
    $address = $_GET['address'];
    $gender = $_GET['gender'];
    $birthday = $_GET['birthday'];
    $age = $_GET['age'];
    $height = $_GET['height'];
    $weight = $_GET['weight'];
    $email = $_GET['email'];
    $username = $_GET['username'];
    $psw = $_GET['psw'];
    
    $sql = "INSERT INTO users (name,username,password) 
    VALUES ('". $fname . "','". $username ."','".md5($psw) . "')";


    $query = "SELECT * FROM members ORDER BY member_id desc limit 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    $lastid = $row['member_id'];
    if ($lastid == " ") {
        $memId = "FIT1";
    }else {
        $memId = substr($lastid,3);
        $memId = intval($memId);
        $memId = "FIT" . ($memId + 1);
    }
    
    
    $sql1 = "INSERT INTO members (member_id,firstname,middlename,lastname,gender,birthday,age,height,weight,contact,address,email) 
    VALUES ('". $memId . "','". $fname . "','". $mname ."','". $lname . "','". $gender . "','". $birthday . "','". $age . "','". $height . "','". $weight . "','". $contact . "','". $address . "','". $email . "')";

    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE) {
        
        header("location:welcome.php");  
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
    $conn->close();

?>