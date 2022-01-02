<?php
    session_start();
    include "common.php";
    $hibak=[];
    $k=0;
    $all_users=LoadUsers();
    if(isset($_POST["button_login"])){
        if(!isset($_POST["email_login"]) || trim($_POST["email_login"]) ===""){
            $hibak[$k]="Az e-mail cím megadása kötelező!";
            $k++;
        }
        if(!isset($_POST["pass_login"]) || trim($_POST["pass_login"]) ===""){
            $hibak[$k]="Az jelszó megadása megadása kötelező!";
            $k++;
            echo "asd";
        }
        if($k<1){
            $user=[
                "email"=>($_POST["email_login"]),
                "pass_login" => $_POST["pass_login"]
            ];
            foreach($all_users as $u){
                if($user["email"] === $u["email"] && $user["pass_login"] === $u["password"]){
                    $_SESSION["user"]=$user;
                }
                else{
                    $hibak[$k]="Helytelen e-mail/jelszó!";
                    $k++;
                }
            }
        }
        $HIBA="";
        foreach ($hibak as $hiba){
            $HIBA=$HIBA . $hiba . "<br/>";
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
        <label for="email_login">E-mail cím*</label></br>
        <input type="email" size="30" id="email_login" name="email_login" required></br>

        <label for="pass_login">Jelszó*</label></br>
        <input type="password" size="30" id="pass_login" name="pass_login" required></br>

        <label>Közelező kitölteni a * jelölt mezőket</label></br>

        <input class="button" name="button_login" type="submit" value="Bejelentkezés">
        <?php
        if(isset($_POST["button_login"])){
            if($k<1){
                echo "<p class='echo'> Sikeres belépés! </p>";
                header("Location: mainmenu.php");
            }
            else{
                echo "<p class='echo'>" . $HIBA . "</p></br>";
            }
        }
        ?>
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

