<?php
/**
 * Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
 * @author Joost van Veen
 * @version 1.0
 */
if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

/**
 * Filter input based on a whitelist. This filter strips out all characters that
 * are NOT: 
 * - letters
 * - numbers
 * - Textile Markup special characters.
 * 
 * Textile markup special characters are:
 * _-.*#;:|!"+%{}@
 * 
 * This filter will also pass cyrillic characters, and characters like � and �.
 * 
 * Typical usage:
 * $string = '_ - . * # ; : | ! " + % { } @ abcdefgABCDEFG12345 ��???????????????? ' . "\nAnd another line!";
 * echo textile_sanitize($string);
 * 
 * @param string $string
 * @return string The sanitized string
 * @author Joost van Veen
 */
function textile_sanitize($string){
    $whitelist = '/[^a-zA-Z0-9?-??-?��???????????????? \.\*\+\\n|#;:!"%@{} _-]/';
    return preg_replace($whitelist, '', $string);
}

function escape($string){
    return textile_sanitize($string);
}

