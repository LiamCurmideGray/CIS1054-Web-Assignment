<?php
function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

function createGuid($token)
{
    $hash = strtoupper(md5($token));

    // Create formatted GUID
    $guid = '';

    // GUID format is XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX for readability
    $guid .= substr($hash, 0, 8) .
    '-' .
    substr($hash, 8, 4) .
    '-' .
    substr($hash, 12, 4) .
    '-' .
    substr($hash, 16, 4) .
    '-' .
    substr($hash, 20, 12);

    return $guid;

}

function createHash($token)
{
    return $options = [
        'salt' => createGuid($token),
    ];
}

function deHash($password, $email)
{
    //$Value is retrieved from the form just inserted

/*
Require to inject SQL Code to retreive appropriate record
then
Example:
$passwordHash =
{   Select password
    From User
    Where $email = email
     }

$passwordHash = hash value stored on the database to be compared
 */

    // To unhash the password use
    if (password_verify($password, $passwordHash)) {
        echo 'They match <br>';
        echo $passwordHash;
        echo '<br>';
        echo $password;
    } else {
        echo 'They dont match <br>';
        echo $passwordHash;
        echo '<br>';
        echo $password;
    }


    //NOTE THIS FUNCTION NEEDS TO BE ALTERED FOR LOGIN

}
// function to set up db connection

// func to insert user

//func to get user
