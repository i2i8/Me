<?php

use yii\db\Migration;

class m160601_050131_member extends Migration
{
	const TBL_MEMBER = '{{%member}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_MEMBER, [
        	'id'            => $this->primaryKey(),
        	'vip_iden'   	=> $this->string(8)->notNull(),
        	'username'   	=> $this->string(16)->notNull(),
        	'gender'   		=> $this->string(8)->notNull(),
        	'phonenum'   	=> $this->string(11)->notNull(),
        	'openiden'   	=> $this->string(28)->notNull(),
        	'birthday'   	=> $this->date()->notNull(),
        	'flag'       	=> $this->integer(5)->notNull(),
        	'modified'   	=> $this->integer(5)->notNull(),
        	'status'   	 	=> $this->smallInteger()->notNull(),
        	'created_at' 	=> $this->integer()->notNull(),
        	'updated_at' 	=> $this->integer()->notNull(),
        	'auth_key'   	=> $this->string(32)->notNull(),
        	'password_hash' => $this->string(60)->notNull(),

        ], $tableOptions);        
    }

    public function safeDown()
    {
    	$this->dropTable(self::TBL_MEMBER);

    }
}
