<?php
    session_start();
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="flms1";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("Connection failed:".mysqli_connect_error());
    }
    $_SESSION["emp_id"]="";
    session_destroy();
    echo "succesfully logged out</br>";
    echo "<a href='login.html'>click here</a> to login";
    mysqli_close($conn);
?>
