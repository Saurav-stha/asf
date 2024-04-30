<?php

if(isset($_POST['deleteColl']))
{
    require_once "../database/database.php";
    $deleteCollId = $_POST['deleteCollId'];
    $sql = "DELETE FROM universityinformation WHERE id = '$deleteCollId'";
    if(mysqli_query($data,$sql))
    {
        echo "<script> alert('vayo delete!!');</script>";
        echo "<script>window.location.href = '../admin/admin.php'</script>";
    }else{
        echo "<script> alert('vayena!!');</script>";
        echo "<script>window.location.href = '../admin/admin.php'</script>";
    }
}