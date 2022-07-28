
<?php
    session_start();
    $id = 0;
    $author = '';
    $works_name = '';
    $update = false;
    $sql = 'SQL';
    include("connectMysql.php");

    // INSERT NEW DATA
    if (isset($_POST['add'])){
        $sql = $_POST['textarea2'];
        // echo $sql;
        $result=mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link));
        // echo $result;
        $_SESSION['message'] = $sql;
        // echo $_SESSION['message'];
        header("location: insert.php");
    }

    if (isset($_GET['delete'])){
        // echo $_GET['delete'];
        $primary_key = explode(" ",$_GET['delete']); 
        $author = $primary_key[0];
        $works_name = $primary_key[1];
        $sql = "DELETE FROM original_work WHERE author='$author' AND works_name='$works_name'";
        echo $sql;
        $result2=mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link));
        $_SESSION['message'] = $sql;
        header("location: insert.php");
    }

    if (isset($_GET['edit'])){
        $primary_key = explode(" ",$_GET['edit']); 
        $author = $primary_key[0];
        $works_name = $primary_key[1];
        $sql = "SELECT * FROM original_work WHERE author='$author' AND works_name='$works_name'";
        $result=mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link));        
        $row = $result->fetch_array();
        $type = $row['type'];
        $update = true;

    }

    if (isset($_POST['update'])){
        $sql = $_POST['textarea1'];
        $result = mysqli_query($db_link,$sql) or die("Query Fail! ".mysqli_error($db_link)); 
        $_SESSION['message'] = $sql;
        header("location: insert.php");
    }



?>