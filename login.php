<?php
    $hibak=[];
    $k=0;
    if(isset($_POST["button_login"])){
        if(!isset($_POST["email_reg"]) || trim($_POST["email_reg"]) ===""){
            $hibak[$k]="Az e-mail cím megadása kötelező!";
            $k++;
        }
    }
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Regisztráció</title>
    <meta charset="UTF-8"/>
    <meta name="author" content="Szabó Katalin">
    <meta name="keywords" content="szakácskönyv, mit főzzek ma?, meglévő hozzávalókból étel, okos szakácskönyv, konverziós táblázat">
    <link rel="icon" href="ramenicon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <ul class="user">
        <li class="user_list"><a class="user_commands" href="mainmenu.php" target="_self">Vissza a főoldalra</a></li>
    </ul>
</nav>
<header>
    <h1>Okos szakácskönyv </h1>
    <p><span>Bejelentkezés</span></p>
</header>
<main>
    <form class="form" method="post" action="login.php" autocomplete="off">
        <label for="email_reg">E-mail cím*</label></br>
        <input type="email" size="30" id="email_reg" name="email_reg" required></br>

        <label for="pass_reg">Jelszó*</label></br>
        <input type="password" size="30" id="pass_reg" name="pass_reg" required></br>

        <label>Közelező kitölteni a * jelölt mezőket</label></br>

        <input class="button" name="button_login" type="submit" value="Bejelentkezés">
    </form>
</main>
</body>
<footer>
    <aside class="aside_list">
        <p>Néhány hasznos link</p>
        <ul class="user">
            <li><a class="aside_list_format" href="conversiontable.php">Konverziós táblázatok</a></li>
        </ul>
    </aside>
</footer>

