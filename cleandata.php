<?php

/**
 * This class is used to clean user input data such as:
 * Remove whitespace and other predefined characters from both sides of a string
 * Remove the backslash
 * Converts some predefined characters to HTML entities
 * The htmlentities() function converts characters to HTML entities
 */
class cleandata
{
    public static function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data,ENT_QUOTES);
        return $data;
    }
}
?>