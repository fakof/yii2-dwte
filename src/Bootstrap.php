<?php

namespace fakof\dwte;

use fakof\dwte\modules\admin\Module;
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
                ];
                $app->setModule('admin', [
                    'class' => Module::class,
                ]);
                $app->urlManager->addRules([
                    '<module:admin>' => '<module>/default/index',
                ]);
            }
            $app->setComponents([
                'authManager' => [
                    'class' => 'yii\rbac\DbManager',
                ],
            ]);
        });
    }
}