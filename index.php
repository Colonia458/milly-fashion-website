<?php

if(isset($_POST['uname']) && isset($_POST['password'])) {
    function validate ($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $uname = validate($_POST ['uname']);
    $pass = validate($_POST ['password']);

    if(empty($uname)) { 
        header("Location: login.html?error=Username is required");
        exit();
    }
    elseif ($pass) {
        header("Location: login.html?error=Please enter your password.");
        exit();
    }
    else{
        echo "Valid input";
    }
}


else {
    header("Location: login.html?error=");
    exit();
}
?>