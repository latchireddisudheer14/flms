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
    $emp_id=$_SESSION["emp_id"];
    $leave_type=$_POST["Leave_type"];
    $from_date=$_POST["from_date"];
    $to_date=$_POST["to_date"];
    $no_of_days=$_POST["no_of_days"];
    $description=$_POST["description"];
    $sql="SELECT * FROM leaves WHERE emp_id='".$emp_id."'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($row[$leave_type]==0)
    {
        echo "No ".$leave_type." are available";
        echo "APPLY LEAVE By loss of pay";
    }
    else if(($leave_type=='casual_leaves')&&($no_of_days>3))
    {
            echo "casual leaves cannot be applied more than 3 at a time";
    }
    else
    {
        $sql="INSERT INTO leave_application (emp_id,leave_type,from_date,to_date,no_of_days,description,leave_app_status) VALUES ('".$emp_id."','".$leave_type."','".$from_date."','".$to_date."','".$no_of_days."','".$description."','PENDING')";
        if(mysqli_query($conn,$sql))
        {
            echo "Applied leave successfully";
        }
        else
        {
            echo "ERROR:".$sql."<br>".mysqli_error($conn);
        }
    }
?>
    
    
