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
    $sql="SELECT * FROM leave_application WHERE leave_app_status='PENDING'";
    $result=mysqli_query($conn,$sql);
    echo "<form method='post' action='update.php'>";
    echo "</br> <table border='1'>";
    echo "<th>select</th><th>leave_app_id</th><th>emp_id</th><th>leave_type</th><th>from_date</th><th>to_date</th><th>no_of_leaves</th><th>description</th></br>";
    while($row=mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td><input type='radio' name='select' value='".$row['leave_app_id']."'></td><td>".$row['leave_app_id']."</td><td>".$row['emp_id']."</td><td>".$row['leave_type']."</td><td>".$row['from_date']."</td><td>".$row['to_date']."</td><td>".$row['no_of_days']."</td><td>".$row['description']."</td></tr>";
    }
    echo "</table>";
   echo "select decison:<select name='Decison'> <option value='APPROVED'>Approve</option> <option value='REJECTED'>Reject</option> </select></br>";
    echo "<input type='submit' value='submit'> </form>";

?>
