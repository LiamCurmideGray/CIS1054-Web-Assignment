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

function trimString($data)
{
    if (strpos($data, '\'') !== false) {
        $data = str_replace("'", "\'", $data);
    }

    return $data;
}
