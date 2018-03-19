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
    $leaveid=$_POST['select'];
    $decison=$_POST['Decison'];
    $sql="UPDATE leave_application SET leave_app_status='".$decison."' WHERE leave_app_id='".$leaveid."'";
    $result=mysqli_query($conn,$sql);
    if($decison=='APPROVED')
    {
        $sql="SELECT * FROM leave_application WHERE leave_app_id='".$leaveid."'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $count=$row["no_of_days"];
        $leavetype=$row["leave_type"];
        $emp_id=$row["emp_id"];
        $sql="SELECT * FROM leaves WHERE emp_id='".$emp_id."'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $leaves1=$row[$leavetype];
        $leaves=$leaves1-$count;
        $sql="UPDATE leaves SET ".$leavetype."='".$leaves."' WHERE emp_id='".$emp_id."'";
        $result=mysqli_query($conn,$sql);
    }
    if($result)
    {
        header("Location:application_request.php");
    }
    else
    {
        echo "failed";
    }
?>
    
