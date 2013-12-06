<?php
Yii::import('zii.widgets.CMenu');
class Menu extends CMenu {
    protected function isItemActive($item, $route) {
        $route_trim = trim($route,'/');
        //echo '<pre>';
        //print_r($item);
        //echo '!' .$item['url'][0] . '!';
        if (strpos($route_trim , trim($item['url'][0], '/'))  === false ){
           return false;
        }
        else{
            return true;
        }
    }
}
?>




