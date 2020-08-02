<?php session_start() ?>
<html>
<meta charset="utf-8"/>
<head>
 <link rel="stylesheet" href="assets/css/styles.css"/>
</head>
<body>
<form action="backend.php" method="POST" enctype="multipart/form-data">
<div class="main">
    <div class="main-table">
        <div class="data-table">           
                <p>Podaj swoje dane:</p>
                <?php 
                if(isset($_SESSION["err"]) && $_SESSION["err"] != "") 
                echo "<p style = color:Red;>Podano błędne dane</p>"; 
                ?>
                <div class="name-field" id="name">Imię:
                    <div class="alert" id="alert-name">(3-20 znaków, tylko litery i cyfry)</div>
                </div>
                <input type="text" class="data-field" id="name-get" name = "namePhp">
                <div class="name-field" id="surname">Nazwisko:
                    <div class="alert" id="alert-surname">(3-20 znaków, tylko litery i cyfry)</div>
                </div>
                <input type="text" class="data-field" id="surname-get" name = "surnamePhp">
                <div class="name-field" id="nick">Nick:
                    <div class="alert" id="alert-nick">(3-20 znaków, tylko litery i cyfry)</div>
                </div>
                <input type="text" class="data-field" id="nick-get" name = "nickPhp">
                <div class="name-field" id="password">Hasło:
                    <div class="alert" id="alert-password">(6-10 znaków, jedna duża litera i cyfry)</div>
                </div>
                <input type="text" class="data-field" id="password-get" name = "passwordPhp">
                <div class="name-field" id="phone">Numer telefonu:
                    <div class="alert" id="alert-number">(Tylko cyfry)</div>
                </div>
                <input type="text" class="data-field" id="number-get" name = "numberPhp">
                <div class="name-field" id="email">Email:
                    <div class="alert" id="alert-email">(Podany ciąg znaków nie jest adresem email)</div>
                </div>
                <input type="text" class="data-field" id="email-get" name = "emailPhp">
                <div class="name-field" id="avatar">Avatar</div>
                <label for="file-upload" class="inputButton">
                <input type="file" name="avatar" class="inputfile" id="file-upload" accept =".jpg, .jpeg, .png, .gif">
                Wybierz avatara
                </label>
                <input type="submit" class="user-field"id="get-info" value="Wyślij">                
        </div>
    </div>   
</div>
</form>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
<?php session_destroy()?>