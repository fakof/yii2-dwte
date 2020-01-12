<?php

namespace fakof\dwte;

use fakof\dwte\models\User;
use fakof\dwte\modules\admin\Module as AdminModule;
use fakof\dwte\modules\cabinet\Module as CabinetModule;
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
                $app->controllerMap = array_merge(
                    $app->controllerMap,
                    [
                        'main' => 'fakof\dwte\controllers\MainController',
                    ]
                );
                $app->setModules([
                    'admin' => [
                        'class' => AdminModule::class,
                    ],
                    'cabinet' => [
                        'class' => CabinetModule::class
                    ]
                ]);
                $app->urlManager->addRules([
                    'login' => 'main/login',
                ]);
            }
            $app->setComponents([
                'authManager' => [
                    'class' => 'yii\rbac\DbManager',
                ],
                'user' => [
                    'class' => \yii\web\User::class,
                    'identityClass' => User::class,
                    'enableAutoLogin' => true,
                    'loginUrl' => ['/login'],
                ]
            ]);
        });
    }
}