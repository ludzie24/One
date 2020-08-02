<?php
session_start();
$name = $_POST['namePhp'];
$surname = $_POST['surnamePhp'];
$nick = $_POST['nickPhp'];
$password = $_POST['passwordPhp'];
$number = $_POST['numberPhp'];
$email = $_POST['emailPhp'];
$illegalCharacters = ["<",">"];
$emailCharacters = ["@","."];
$max_size = 1024*1024;
function stringLenght($string,$minValue,$maxValue){
    if(strlen($string)>=$minValue and strlen($string)<=$maxValue)
    {
        return true;
    }else{
        return false;
    };
};
function illegalCharacters($string,$table){
    if(preg_match($table,string) == 1){
        return true;
    }else{
        return false;
    };
};
function checkName($string,$minValue,$maxValue){
    $statusLenght = stringLenght($string,$minValue,$maxValue);
    $statusCharacters = preg_match('/^[a-zA-Z0-9]+/',$string);
    if ($statusLenght == true and $statusLenght == true){
        return true;
    }else{
        return false;
    };
};
function checkPassword($password,$minValue,$maxValue){
    $statusLenght = stringLenght($password,$minValue,$maxValue);
    if(preg_match('/[A-Z]/',$password) and preg_match('/[a-z]/',$password) and preg_match('/[0-9]/',$password)){
        $statusCharacters = true;
    }else{
        $statusCharacters = false;
    };
    if($statusLenght == true and $statusCharacters == true){
        return true;
    }else{
        return false;
    };
};
function checkNumber($number){
    if(preg_match('/^[0-9]+/',$number) == 1){
        return true;
    }else{
        return false;
    };
};
function checkEmail($email,$minValue,$maxValue, $illegalCharacters,$emailCharacters){
    $statusLenght = stringLenght($email,$minValue,$maxValue);
    if(strpos($email,$illegalCharacters[0]) == true or strpos($email,$illegalCharacters[1]) == true){
        $statusIllegalCharacters = false;
    }else{
        $statusIllegalCharacters = true;
    };
    if(strpos($email,$emailCharacters[0]) == true and strpos($email,$emailCharacters[1]) == true){
        $statusAllowedCharacters = true;
    }else{
        $statusAllowedCharacters = false;
    };
    if($statusLenght == true and $statusIllegalCharacters == true and $statusAllowedCharacters == true){
        return true;
    }else{
        return false;
    }   
};
function uploadFile(){
    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        };
    };
    if (file_exists($target_file)) {
        $uploadOk = 0;
    };
    if ($_FILES["avatar"]["size"] > 10240) {
        $uploadOk = 0;
    };
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $uploadOk = 0;
        };
    if ($uploadOk == 0) {
        }else{
        if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
            $image=$_FILES["avatar"]["name"]; 
            $img="assets/img/".$image;
            $im1 ='<img src="'.$img.'">';
            echo'<img src="'.$img.'">';
            return true;
    }else{
        return false;
    };
    };
};
$statusName = checkName($name,3,20);
$statusSurName = checkName($surname,3,20);
$statusNick = checkName($nick,3,20);
$statusPassword = checkPassword($password,6,10);
$statusNumber = checkNumber($number);
$statusEmail = checkEmail($email,3,30,$illegalCharacters,$emailCharacters);
$statusFile = uploadFile();

if ($statusName and $statusSurName and $statusNick and $statusPassword and $statusNumber and $statusEmail){
    $_SESSION["name"] = $_POST['namePhp'];
    $_SESSION["surname"] = $_POST['surnamePhp'];
    $_SESSION["nick"] = $_POST['nickPhp'];
    $_SESSION["password"] = $_POST['passwordPhp'];
    $_SESSION["number"] = $_POST['numberPhp'];
    $_SESSION["email"] = $_POST['emailPhp'];
    $image=$_FILES["avatar"]["name"]; 
    $img="assets/img/".$image;
    $im1 ='<img src="'.$img.'"id="images">';
    $_SESSION["avatar"] =  $im1;
    header("Location: profile.php");
}else{
    $_SESSION["err"] = "Błąd";
    header("Location: index.php");
};

