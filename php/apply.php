<?php

if (isset($_POST['applyStud'])){

    require_once "../database/database.php";
    require_once "htmlFormat.php";

    $applyStudName = mysqli_real_escape_string($data,$_POST['name']);
    $applyStudAddr = mysqli_real_escape_string($data,$_POST['address']);
    $applyStudMail = mysqli_real_escape_string($data,$_POST['aEmail']);
    $applyStudCont = mysqli_real_escape_string($data,$_POST['phoneNumber']);
    $applyStudQualif = mysqli_real_escape_string($data,$_POST['academicQualification']);
    $applyStudStatus = 1;

    $sql = "INSERT INTO applystudInfo (applyStudName,applyStudAddr,applyStudMail,applyStudCont,applyStudQualif,applyStudStatus) VALUES(?,?,?,?,?,?)";
    $stmt=mysqli_prepare($data,$sql);
    mysqli_stmt_bind_param($stmt,"sssssi",$applyStudName,$applyStudAddr,$applyStudMail,$applyStudCont,$applyStudQualif,$applyStudStatus);
    if(mysqli_stmt_execute($stmt)){
        $subject="Applied Succesfully";
        $text="";
        $url="../student/landing-page.php?apply=success";

        echo htmlFormat($subject,$url,$text);
    }else{
        echo "Server error";
    }

}


