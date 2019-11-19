<?php

namespace fakof\dwte;

use yii\base\Application as BaseApp;
use yii\console\Application as ConsoleApp;
use yii\web\Application as WebApp;
use yii\base\BootstrapInterface;

class Bootstrap implements BootstrapInterface
{
    /**
     * Bootstrap method to be called during application bootstrap stage.
     * @param ConsoleApp|WebApp $app the application currently running
     */
    public function bootstrap($app)
    {
        $app->on(BaseApp::EVENT_BEFORE_REQUEST, function () use ($app) {
            if ($app instanceof WebApp) {
                $app->user->loginUrl = ['cabinet/login'];
                $app->controllerMap = [
                    'cabinet' => 'fakof\dwte\controllers\CabinetController',
                    'admin' => 'fakof\dwte\controllers\AdminController',
                ];
            }
            $app->setComponents([
                'authManager' => [
                    'class' => 'yii\rbac\DbManager',
                ],
            ]);
        });
    }
}