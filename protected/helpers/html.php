<?php

class Html{
    public static function pr($str, $die = null) {
        echo '<pre>';
        print_r($str);
        echo '</pre>';
        if ($die != null)
            die('Сарботал die');
    }
}
