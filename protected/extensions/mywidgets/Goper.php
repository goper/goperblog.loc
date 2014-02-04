<?php
class Goper extends CWidget{
    public function run()
    {
        $model = new Login;
        // этот метод будет вызван внутри CBaseController::beginWidget()
        $this->render('goper',  array('model' => $model));
    }
}
?>




