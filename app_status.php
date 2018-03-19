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
    $sql="SELECT * FROM leave_application WHERE emp_id='".$emp_id."'";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
        echo "</br> <table border='1'>";
        echo "<th>leave_app_id</th><th>emp_id</th><th>leave_type</th><th>from_date</th><th>to_date</th><th>no_of_leaves</th><th>description</th><th>leave_app_status</th></br>";
        while($row=mysqli_fetch_assoc($result))
        {
                echo "<tr>";
                echo "<td>".$row['leave_app_id']."</td><td>".$row['emp_id']."</td><td>".$row['leave_type']."</td><td>".$row['from_date']."</td><td>".$row['to_date']."</td><td>".$row['no_of_days']."</td><td>".$row['description']."</td><td>".$row['leave_app_status']."</td></tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "ERROR:".$sql."<br>".mysqli_error($conn);
    }
?>
    
