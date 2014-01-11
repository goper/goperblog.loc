<?php
Yii::import('zii.widgets.CMenu');
class Menu extends CMenu {
    protected function isItemActive($item, $route) {
        //return false;

        $route_trim = trim($route, '/');

        //html::pr($item['url']);
        //die;

        //print_r($item['url']);
        if(!is_array($item['url'])){
           // echo '!'.$item['url'] .'-'.$route_trim.'<br>';
        }
        //echo '<pre>';
        //print_r($item);
        //echo '!' .$item['url'][0] . '!';

        if ( ! is_array($item['url'])){
            $url = $item['url'] == '/' ? 'index/index' : trim($item['url'], '/');

            if (strpos($route_trim , $url)  !== false){
                return true;
            }
            else{

                return false;
            }

           //
        }
    }
}
?>




