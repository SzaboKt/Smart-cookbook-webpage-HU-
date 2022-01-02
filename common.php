<?php
    function LoadUsers(){
        $file=fopen("users.txt", "r");
        if($file === false){
            die("HIBA: Nem lézetik ez a file!");
        }
        $users=[];
        $i=0;
        while(($line=fgets($file))!==false){
            $users[$i]=unserialize($line);
            $i++;
        }
        fclose($file);
        return $users;
    }

    function SaveUser($user){
        $file=fopen("users.txt", "w");
        if($file === false){
            die("HIBA: Nem lézetik ez a file!");
        }
        fwrite($file, unserialize($user)."\n");
        fclose($file);
    }
?>
