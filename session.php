<?php
    include('db_connect.php');
    session_start();
    $username = mysqli_real_escape_string($conn, $_GET["uname"]);  
    $password = mysqli_real_escape_string($conn, $_GET["psw"]);  
    $password = md5($password);  
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";  
    $result = mysqli_query($conn, $query);  
    if(mysqli_num_rows($result) > 0)  
    {  
         $_SESSION['uname'] = $username;  
         header("location:user_home.php");  
    
              
                if($validUser == '1') {
                        $_SESSION['login'] = true;
                        print "Session Start";
                        header("location:user_home.php");  
                }else {
                        $message = "Your username or password does not match";
                        echo "<script type='text/javascript'>alert('$message');</script>"; 
                        include('welcome.php');
                }

        }
        $conn->close();
?>