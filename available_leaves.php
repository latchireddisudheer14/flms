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
    $sql="SELECT * FROM leaves WHERE emp_id='".$emp_id."'";
    $result=mysqli_query($conn,$sql);
    echo "</br> <table border='1'>";
    echo "<th>emp_id</th><th>casual_leaves</th><th>medical_leaves</th><th>on_duty_leaves</th><th>earned_leaves</th><th>maternity_leaves</th><th>academic_leaves</th></br>";
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>".$row['emp_id']."</td><td>".$row['casual_leaves']."</td><td>".$row['medical_leaves']."</td><td>".$row['on_duty_leaves']."</td><td>".$row['earned_leaves']."</td><td>".$row['maternity_leaves']."</td><td>".$row['academic_leaves']."</td></tr>";
    }
    echo "</table>";
?>

