<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use Yii;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionIndex($message = 'hello world')
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
