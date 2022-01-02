<?php
session_start();
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Okos szakácskönyv</title>
    <meta charset="UTF-8"/>
    <meta name="author" content="Szabó Katalin">
    <meta name="keywords" content="szakácskönyv, mit főzzek ma?, meglévő hozzávalókból étel, okos szakácskönyv">
    <link rel="icon" href="ramenicon.png">
    <link rel="stylesheet" href="style.css">

</head>
<body id="generatorPage">
    <nav>
        <ul class="user">
            <?php if(isset($_SESSION["user"])) {?>
                <li class="user_list"><a class="user_commands" href="profile.php" target="_self">Profilom</a></li>
                <li class="user_list"><a class="user_commands" href="logout.php" target="_self">Kijelentkezés</a></li>
            <?php } else{?>
            <li class="user_list"><a class="user_commands" href="registration.php" target="_self">Regisztráció</a></li>
            <li class="user_list"><a class="user_commands" href="login.php" target="_self">Bejelentkezés</a></li>
            <?php } ?>
        </ul>
    </nav>
    <header>
        <h1>Okos szakácskönyv </h1>
        <p>Ez az oldal arra szolgál, hogy már meglévő hozzávalókból recepteket generáljon, hogy mit is lehet belőlük főzni.</p>
    </header>
    <main id="asd">
        <div id="main_page_content">
            <p><span id="gen_style">Hogyan kell használni a generátort?</span></p>
            <ol>
                <li>Válaszd ki a legördülő listából/írd be a hozzávalók nevét.</li>
                <li>Nyomj a "Generálás" gombra.</li>
                <li>Kész is vagy! Válogathatsz a megjelenő receptek közül.</li>
            </ol>
        </div>
        <div id="form_mainmenu">
            <label id="ingredient_label" for="ingredients">Írj be egy hozzávalót!</label>
            <input  list="ingredient_list" id="ingredients" name="ingredients"/>
            <datalist id="ingredient_list">
                <script>
                    let l=[];
                    l[0]="alma";
                    l[1]="banán";
                    l[2]="csoki";

                    let options="";
                    for (let i = 0; i < l.length; i++) {
                        options += '<option value="' + l[i] + '" />';
                    }

                    document.getElementById("ingredient_list").innerHTML=options;
                </script>
            </datalist>
            <button type="button" id="add_ingredient" name="add_ingedient">Hozzáadás</button>
            <button type="button" id="generate" name="generate">Generálás</button><br/>
        </div>
    </main>
    <script>
        let ingredients="";
        function iadd(){
            if (document.contains(document.getElementById("paragraph"))) {
                document.getElementById("paragraph").remove();
            }
            const p = document.createElement("p");
            p.id="paragraph";
            let i=document.getElementById("ingredients")
            ingredients+=i.value + " ";
            let node = document.createTextNode(ingredients);
            p.appendChild(node);
            const parent = document.getElementById("form_mainmenu");
            parent.appendChild(p);

            let l=document.getElementById("ingredient_list");
            l.removeChild(i);
        }
        const e=document.getElementById("add_ingredient");
        e.addEventListener ("click", iadd)
    </script>
</body>

<footer>
    <aside class="aside_list">
        <p>Néhány hasznos link</p>
        <ul class="user">
            <li><a class="aside_list_format" href="conversiontable.php">Konverziós táblázatok</a></li>
        </ul>
    </aside>
</footer>
</html>
