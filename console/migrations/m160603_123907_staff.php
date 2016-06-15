<?php

use yii\db\Migration;

class m160603_123907_staff extends Migration
{
	const TBL_STAFF = '{{%staff}}';

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_STAFF, [
        	'id'            => $this->primaryKey(),
        	'NO'	   		=> $this->string(8)->notNull(),
        	'name'   		=> $this->string(16)->notNull(),
        	'gender'   		=> $this->string(8)->notNull(),
        	'birthday'   	=> $this->date()->notNull(),
        	'phone' 	  	=> $this->string(11)->notNull(),
        	'ED' 		  	=> $this->date()->notNull(),
        	'flag'       	=> $this->integer(1)->notNull(),
        	'BC'	   		=> $this->string(19)->notNull(),
			'openid'   		=> $this->string(28)->notNull(),


        ], $tableOptions);        
    }

    public function safeDown()
    {
    	$this->dropTable(self::TBL_STAFF);

    }
}
