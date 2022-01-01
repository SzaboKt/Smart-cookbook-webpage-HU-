<?php
    $hibak=[];
    $k=0;
     if(isset($_POST["button_reg"])){ //ha megnyomták a "button_reg" nevű gombot
         if(!isset($_POST["last_name_reg"]) || trim($_POST["last_name_reg"]) === ""){
             $hibak[$k]="Kötelező a vezetéknév!";
             $k=$k+1;
         }
         if(!isset($_POST["first_name_reg"]) || trim($_POST["first_name_reg"]) === ""){
             $hibak[$k]="Kötelező a keresztnév!";
             $k=$k+1;
         }
         if(!isset($_POST["email_reg"]) || trim($_POST["email_reg"]) === ""){
             $hibak[$k]="Kötelező a e-mail cím!";
             $k=$k+1;
         }
         if(!isset($_POST["pass_reg"]) || trim($_POST["pass_reg"]) === ""){
             $hibak[$k]="Kötelező a jelszó!";
             $k=$k+1;
         }
         if(!isset($_POST["pass_again_reg"]) || trim($_POST["pass_again_reg"]) === ""){
             $hibak[$k]="Kötelező a jelszót újra beírni!";
             $k=$k+1;
         }

         if(trim($_POST["pass_reg"]) !== trim($_POST["pass_again_reg"])){
             $hibak[$k]="Kötelező a két jelszónak ugyanannak lennie!";
             $k=$k+1;
         }

         $spec_characters="!'.%/=()[]{}<>*:´";
         for($i=0; $i<strlen($_POST["last_name_reg"]); $i+=1){
             if(strpos($spec_characters, $_POST["last_name_reg"][$i]) !== false){
                 $hibak[$k]="A névben nem lehet speciális karakter!";
                 $k=$k+1;
             }
         }

         if($k<1){
            $user=[
                    "lastname" => $_POST["last_name_reg"],
                    "firstname" => $_POST["first_name_reg"],
                    "email" =>$_POST["email_reg"],
                    "password" => $_POST["pass_reg"]
            ];
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
            <li class="user_list"><a class="user_commands" href="login.php" target="_self">Bejelentkezés</a></li>
        </ul>
    </nav>
    <header>
        <h1>Okos szakácskönyv </h1>
        <p><span>Regisztráció</span></p>
    </header>
    <main>
        <form class="form" method="post" action="registration.php" autocomplete="off">
            <label for="last_name_reg">Vezetéknév*</label></br>
            <input type="text" size="30" id="last_name_reg" name="last_name_reg" required></br>

            <label for="first_name_reg">Keresztnév*</label></br>
            <input type="text" size="30" id="first_name_reg" name="first_name_reg" required></br>

            <label for="email_reg">E-mail cím*</label></br>
            <input type="email" size="30" id="email_reg" name="email_reg" required></br>

            <label for="pass_reg">Jelszó*</label></br>
            <input type="password" size="30" id="pass_reg" name="pass_reg" required></br>

            <label for="pass_again_reg">Jelszó újra*</label></br>
            <input type="password" size="30" id="pass_again_reg" name="pass_again_reg" required></br>
            <label>Közelező kitölteni a * jelölt mezőket</label></br>

            <input class="button" type="submit" name="button_reg" value="Regisztrálás">
        </form>
        <?php
            if(isset($_POST["button_reg"])){
                if($k<1){
                    echo "<p class='echo'> Sikeres regisztráció! </p>";
                }
                else{
                    echo "<p class='echo'>" . $HIBA . "</p></br>";
                }
            }
        ?>
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
