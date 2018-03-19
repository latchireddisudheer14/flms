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
    $uname=$_POST["uname"];
    $pwd=$_POST["pwd"];
    $sql="SELECT * FROM employee WHERE emp_id='".$uname."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    //echo $uname.$pwd;
    if($pwd==$row["password"])
    {
        //echo $uname.$pwd;
        $_SESSION["emp_id"]=$row['emp_id'];
        $_SESSION["emp_name"]=$row['name'];
        if($row["designation"]=='HOD')
        {
            header("Location:hod.html");
        }
        else if($row["designation"]=='ADMIN')
        {
            header("Location:admin.html");
        }
        else
        {
            header("Location:faculty.html");
        }
    }
   else
    {
        session_destroy();
        header("Location:login.html");
        mysqli_close($conn);
    }
    
?>
