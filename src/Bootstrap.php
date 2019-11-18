<?php

namespace fakof\dwte;

use Yii;
use yii\web\Application;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param Application $app the application currently running
     */
    public function bootstrap($app)
    {
        if (!(Yii::$app instanceof Application)) {
            return;
        }

        $app->on(Application::EVENT_BEFORE_REQUEST, function () {
            Yii::$app->user->loginUrl = ['cabinet/login'];
            Yii::$app->controllerMap = [
                'cabinet' => 'fakof\dwte\controllers\CabinetController',
            ];
        });
    }
}