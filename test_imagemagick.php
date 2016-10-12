<?php

if (extension_loaded('gd') && function_exists('gd_info')) {
    echo "PHP GD library is installed on your web server";
}
else {
    echo "PHP GD library is NOT installed on your web server";
}

function alist ($array) {
    $alist = "<ul>";
    for ($i = 0; $i < sizeof($array); $i++) {
        $alist .= "<li>$array[$i]";
    }
    $alist .= "</ul>";
    return $alist;
}

exec("convert -version", $out, $rcode);
//Print the return code: 0 if OK, nonzero if error.
echo "Version return code is $rcode <br>";
//Print the output of "convert -version"
echo alist($out);

if (!extension_loaded('imagick'))
    echo 'imagick not installed';

?>
