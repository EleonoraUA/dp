<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $doc = $auth->createRole('doc');
        $manager = $auth->createRole('manager');

        $auth->add($admin);
        $auth->add($doc);
        $auth->add($manager);

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Перегляд адмінки';

        $registerNewDocs = $auth->createPermission('register');
        $registerNewDocs->description = 'Реєстрація нового співробітника';

        $auth->add($viewAdminPage);
        $auth->add($registerNewDocs);

        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($doc, $manager);
        $auth->addChild($manager, $registerNewDocs);

        $auth->assign($admin, 1);
        $auth->assign($doc, 2);
        $auth->assign($manager, 3);
    }
}