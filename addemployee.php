<?php
    $servername="localhost";
    $username="root";
    $password="";
    $dbname="flms1";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
    if(!$conn)
    {
        die("Connection failed:".mysqli_connect_error());
    }
    $emp_id=$_POST["emp_id"];
    $name=$_POST["emp_name"];
    $sex=$_POST["sex"];
    $password=$_POST["pwd"];
    $type_of_faculty=$_POST["type_of_faculty"];
    $join_date=$_POST["join_date"];
    $designation=$_POST["designation"];
    $sql="INSERT INTO employee (emp_id,name,sex,password,type_of_faculty,date_of_join,designation) VALUES ('".$emp_id."','".$name."','".$sex."','".$password."','".$type_of_faculty."','".$join_date."','".$designation."')";
    $result=mysqli_query($conn,$sql);
    if($type_of_faculty=="Teaching")
    {
        $sql="INSERT INTO leaves (emp_id,casual_leaves,medical_leaves,on_duty_leaves,earned_leaves,maternity_leaves,academic_leaves) VALUES ('".$emp_id."','10','10','10','0','0','100')";
        $result=mysqli_query($conn,$sql);
        if($sex="Female")
        {
            $sql="UPDATE leaves SET maternity_leaves='60' WHERE emp_id='".$emp_id."'";
            $result=mysqli_query($conn,$sql);
        }
    }
    else
    {
        $sql="INSERT INTO leaves (emp_id,casual_leaves,medical_leaves,on_duty_leaves,earned_leaves,maternity_leaves,academic_leaves) VALUES ('".$emp_id."','20','10','30','0','0','0')";
        $result=mysqli_query($conn,$sql);
        if($sex="Female")
        {
            $sql="UPDATE leaves SET maternity_leaves='60' WHERE emp_id='".$emp_id."'";
            $result=mysqli_query($conn,$sql);
        }
 
    }
    if($result)
    {
        echo "successfully added employee";
    }
    else
    {
        echo "ERROR:".$sql."<br>".mysqli_error($conn);
    }
?>
