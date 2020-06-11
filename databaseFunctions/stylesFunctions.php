<?php

function getStylesheet($URL) {
    $URL = basename($URL);

    if (strpos($URL, "?") !== false) {
        $split = explode("?", $URL);
        $URL = $split['0'];
    }

    $URL = substr($URL, 0, -4);
    $link = "<link rel=\"stylesheet\" href=\"stylesheets\\";
    echo "<title> $URL </title>";
    
    if (strcmp($URL, "index") == 0 || strcmp($URL, "CIS1054-Web-Assign") == 0  ) {
        return $link . "indexStyles.css\">";

    } else if (strcmp($URL, "about") == 0) {
        return $link . "aboutStyles.css\">";

    } else if (strcmp($URL, "contact") == 0) {
        return $link . "contactStyles.css\">";

    } else if (strcmp($URL, "login") == 0) {
        return $link . "loginStyles.css\">";

    } else if (strcmp($URL, "register") == 0 ||
        strcmp($URL, "newItem") == 0) {
        return $link . "registerStyles.css\">";

    } else if (strcmp($URL, "userAccount") == 0) {
        return $link . "userAccountStyles.css\">";

    } else if (strcmp($URL, "menu") == 0 ||
        strcmp($URL, "itemDetails") == 0 ||
        strcmp($URL, "favourites") == 0) {
        return $link . "menuStyles.css\">";
    
    } else if(strcmp($URL, "editUser") == 0) {
        return $link . "editUserStyle.css\">\r\n" . $link . "registerStyles.css\">";
    
    } else if (strcmp($URL, "adminPage") == 0) {
        return $link . "adminPageStyles.css\">";
    
    } else if(strcmp($URL, "editItem") == 0) {
        return $link . "editItemStyle.css\">\r\n" . $link . "registerStyles.css\">";
    }
    
    else {
        return "";
    }    
}
?>

