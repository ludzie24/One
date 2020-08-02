<?php session_start() ?>
<html>
<meta charset="utf-8"/>
<head>
 <link rel="stylesheet" href="assets/css/profileStyles.css"/>
</head>
<body>
<div class="main">
    <div class="upper">
        <div class= "boxUpper" id="leftu">
        <?php  echo $_SESSION["avatar"]; ?>
        </div>
        <div class= "boxUpper" id="centeru">
        <h2>Twój Profil</h2>
        </div>
        <div class= "boxUpper" id="rightu"></div>
    </div>
    <div class="center">
        <div class= "boxCenter" id="leftc">
            <div class="letter" id="name">Imię:
                <p id="output"><?php  echo $_SESSION["name"]; ?></p>
            </div>
            <div class="letter" id="surname">Nazwisko:
            <p id="output"><?php  echo $_SESSION["surname"]; ?></p>
            </div>
            <div class="letter" id="nick">Nick:
            <p id="output"><?php  echo $_SESSION["nick"]; ?></p>
            </div>
            <div class="letter" id="password">Hasło:
            <p id="output"><?php  echo $_SESSION["password"]; ?></p>
            </div>
            <div class="letter" id="number">Numer:
            <p id="output"><?php  echo $_SESSION["number"]; ?></p>
            </div>
            <div class="letter" id="email">Email:
            <p id="output"><?php  echo $_SESSION["email"]; ?></p>
            </div>
        </div>
        <div class= "boxCenter" id="centerc"></div>
        <div class= "boxCenter" id="rightc"></div>
    </div>
    <div class="lower">
        <div class= "boxLower" id="leftl"></div>
        <div class= "boxLower" id="centerl"></div>
        <div class= "boxLower" id="rightl"></div>
    </div>

</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="assets/js/scripts.js"></script>
</html>
<?php session_destroy()?>