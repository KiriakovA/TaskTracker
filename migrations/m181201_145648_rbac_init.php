<?php

use yii\db\Migration;

/**
 * Class m181201_145648_rbac_init
 */
class m181201_145648_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $am = yii::$app->authManager;
        $admin = $am->createRole('admin');
        $user = $am->createRole('user');
        $am->add($admin);
        $am->add($user);
        
        $permissionCreateTask = $am->createPermission('createTask');
        $permissionDeleteTask = $am->createPermission('deleteTask');
        $permissionUpdateTask = $am->createPermission('updateTask');
        $permissionAdminTask = $am->createPermission('adminTask');
        
        $am->add($permissionCreateTask);
        $am->add($permissionDeleteTask);
        $am->add($permissionAdminTask);
        $am->add($permissionUpdateTask);
        
        
        $am->addChild($admin, $permissionCreateTask);
        $am->addChild($admin, $permissionDeleteTask);
        $am->addChild($admin, $permissionAdminTask);
        $am->addChild($admin, $permissionUpdateTask);
        
        $am->addChild($user, $permissionCreateTask);
        $am->addChild($user, $permissionUpdateTask);
        
        $am->assign($admin,1);
        $am->assign($user, 2);
        $am->assign($user, 3);
        $am->assign($user, 4);
        
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181201_145648_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181201_145648_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
