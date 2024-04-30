<?php

if (isset($_POST['approve']))
{
    require_once "../database/database.php";
    $approveId = $_POST['approveId'];
    $sql = "UPDATE universityinformation SET approve = 1 WHERE id = '$approveId'";
    if(mysqli_query($data,$sql)){
        echo "<script> alert('vayo approve!!');</script>";
        echo "<script>window.location.href = '../admin/admin.php'</script>";
        
    }
}