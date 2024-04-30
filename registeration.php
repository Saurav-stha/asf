<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once "./database.php";
if (isset($_POST['Submit'])) {
    $fname = mysqli_real_escape_string($data, $_POST['firstName']);
    $mname = mysqli_real_escape_string($data, $_POST['middleName']);
    $lname = mysqli_real_escape_string($data, $_POST['lastName']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $provinceName = mysqli_real_escape_string($data, $_POST['province']);
    $districtName = mysqli_real_escape_string($data, $_POST['district']);
    $city = mysqli_real_escape_string($data, $_POST['city']);
    $dateOfBirth = mysqli_real_escape_string($data, $_POST['dob']);
    $password = mysqli_real_escape_string($data, $_POST['password']);
    $cpassword = mysqli_real_escape_string($data, $_POST['cpassword']);
    $gender = mysqli_real_escape_string($data, $_POST['Gender']);

    // Hashing the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $hashedCPassword = password_hash($cpassword,PASSWORD_BCRYPT);

    $sql = "INSERT INTO studentInformation (FirstName, MiddleName, LastName, Email_ID, provinceName, districtName, city, DateOfBirth, password, Cpassword, gender) VALUES ('$fname', '$mname', '$lname', '$email', '$provinceName', '$districtName', '$city', '$dateOfBirth', '$hashedPassword', '$hashedCPassword', '$gender')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        // $_SESSION['message']="You registered successfully";
        header('location: login.php');
    } else {
        echo "Error: " . mysqli_error($data);
    }
}

// Close the database connection
mysqli_close($data);
?>

<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);
require_once "./database.php";
if (isset($_POST['Submit'])) {
    $fname = mysqli_real_escape_string($data, $_POST['firstName']);
    $mname = mysqli_real_escape_string($data, $_POST['middleName']);
    $lname = mysqli_real_escape_string($data, $_POST['lastName']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $provinceName = mysqli_real_escape_string($data, $_POST['province']);
    $districtName = mysqli_real_escape_string($data, $_POST['district']);
    $city = mysqli_real_escape_string($data, $_POST['city']);
    $dateOfBirth = mysqli_real_escape_string($data, $_POST['dob']);
    $password = mysqli_real_escape_string($data, $_POST['password']);
    $cpassword = mysqli_real_escape_string($data, $_POST['cpassword']);
    $gender = mysqli_real_escape_string($data, $_POST['Gender']);

    // Hashing the password using bcrypt
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $hashedCPassword = password_hash($cpassword,PASSWORD_BCRYPT);

    $sql = "INSERT INTO studentInformation (FirstName, MiddleName, LastName, Email_ID, provinceName, districtName, city, DateOfBirth, password, Cpassword, gender) VALUES ('$fname', '$mname', '$lname', '$email', '$provinceName', '$districtName', '$city', '$dateOfBirth', '$hashedPassword', '$hashedCPassword', '$gender')";

    $result = mysqli_query($data, $sql);

    if ($result) {
        // $_SESSION['message']="You registered successfully";
        header('location: login.php');
    } else {
        echo "Error: " . mysqli_error($data);
    }
}

// Close the database connection
mysqli_close($data);
?>
