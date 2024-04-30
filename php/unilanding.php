<?php

// ini_set('display_errors',1);
// ini_set('display_startup_errors',1);
// error_reporting(E_ALL);

require_once "../database/database.php";

require_once "./htmlFormat.php";

session_start();
if(isset($_POST['add']) && ($_SERVER['REQUEST_METHOD']=="POST")){
        $name=$_POST["name"];
        $aEmail=$_POST["aEmail"];
        $address=$_POST["address"];
        $phoneNumber=$_POST["phoneNumber"];
        $uniType=$_POST["uniType"];
        $aboutUniversity=$_POST["aboutUniversity"];
        $availablePrograms=$_POST["availablePrograms"];
        $scholarship=$_POST["scholarship"];
        $feeStructure=$_POST["feeStructure"];

        //Check if an image filee was uploaded
        if(isset($_FILES["image"]))
        {
            // var_dump($_FILES['image']);         
            //For uploaded image
            $fileName = $_FILES["image"]["name"];
            $type = $_FILES["image"]["type"];
            $size = $_FILES["image"]["size"];
            $temp = $_FILES["image"]["tmp_name"];
            $error = $_FILES["image"]["error"];

            if ($error > 0){
                die("Error uploading file! Code $error.");
            }
            else
            {
                if($size > 10000000) //conditions for the file
                {
                    $fileName="Format is not allowed or file size is too big";
                }
                else
                {
                   
                    move_uploaded_file($temp,"../images/clzLogo/".$fileName);
                }
            } 
        }
        else
        {
            $fileName="No image selected";  
        }

        $sql="INSERT INTO universityInformation (name,aEmail,address,phoneNumber,uniType,aboutUniversity,availablePrograms,scholarship,feeStructure,fileName) VALUES(?,?,?,?,?,?,?,?,?,?)";

        $stmt=mysqli_prepare($data,$sql);

        mysqli_stmt_bind_param($stmt,"ssssssssss",$name,$aEmail,$address,$phoneNumber,$uniType,$aboutUniversity,$availablePrograms,$scholarship,$feeStructure,$fileName);

        if(mysqli_stmt_execute($stmt))
        {   
            $sql="SELECT *FROM universityInformation WHERE aEmail=?";
            
            $stmt=mysqli_prepare($data,$sql);
            
            mysqli_stmt_bind_param($stmt,"s",$aEmail);

            if(mysqli_stmt_execute($stmt))
            {
                $result=mysqli_stmt_get_result($stmt);
                $user=mysqli_fetch_assoc($result);
                $_SESSION['uniInfoId']=$user['id'];
            }
            $text = "";
            $subject="College Added Succesfully";
            $url="landing-page.php";
            echo htmlFormat($subject,$url,$text);

        }
        else
        {
            $subject=mysqli_error($data);
            $text="Please try again";
            $url="./html/dashboard.html";
            echo htmlFormat($subject,$url,$text);
        }


}


if(isset($_POST['edit']) && ($_SERVER['REQUEST_METHOD']=="POST")){
        $name=$_POST["name"];
        $aEmail=$_POST["aEmail"];
        $address=$_POST["address"];
        $phoneNumber=$_POST["phoneNumber"];
        $uniType=$_POST["uniType"];
        $aboutUniversity=$_POST["aboutUniversity"];
        $availablePrograms=$_POST["availablePrograms"];
        $scholarship=$_POST["scholarship"];
        $feeStructure=$_POST["feeStructure"];

        //Check if an image filee was uploaded
        if(isset($_FILES["image"]))
        {
            // var_dump($_FILES['image']);         
            //For uploaded image
            $fileName = $_FILES["image"]["name"];
            $type = $_FILES["image"]["type"];
            $size = $_FILES["image"]["size"];
            $temp = $_FILES["image"]["tmp_name"];
            $error = $_FILES["image"]["error"];

            if ($error > 0){
                die("Error uploading file! Code $error.");
            }
            else
            {
                if($size > 10000000) //conditions for the file
                {
                    $fileName="Format is not allowed or file size is too big";
                }
                else
                {
                   
                    move_uploaded_file($temp,"../images/clzLogo/".$fileName);
                }
            } 
        }
        else
        {
            $fileName="No image selected";  
        }

        $sql="UPDATE universityInformation SET 
        name=?, 
        aEmail=?, 
        address=?, 
        phoneNumber=?, 
        uniType=?, 
        aboutUniversity=?, 
        availablePrograms=?, 
        scholarship=?, 
        feeStructure=?, 
        fileName=?
        WHERE id=?";

        $stmt=mysqli_prepare($data,$sql);

        mysqli_stmt_bind_param($stmt,"ssssssssssi",$name,$aEmail,$address,$phoneNumber,$uniType,$aboutUniversity,$availablePrograms,$scholarship,$feeStructure,$fileName,$_SESSION['uniInfoId']);

        if(mysqli_stmt_execute($stmt))
        {   
            $text = "";
            $subject="Updated Succesfully";
            $url="landing-page.php";
            echo htmlFormat($subject,$url,$text);

        }
        else
        {
            $subject=mysqli_error($data);
            $text="Please try again";
            $url="./html/dashboard.html";
            echo htmlFormat($subject,$url,$text);
        }

}

?>