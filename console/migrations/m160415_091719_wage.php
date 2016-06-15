<?php

use yii\db\Migration;

class m160415_091719_wage extends Migration
{
    const TBL_WAGE = '{{%wage}}';
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable(self::TBL_WAGE, [
        	'id'         => $this->primaryKey(),
        	'name'   	 => $this->string(16)->notNull(),
        	'zhiWu'   	 => $this->string(4)->notNull(),
        	'yCQ'   	 => $this->double(3,1)->notNull(),
        	'sCQ'   	 => $this->double(3,1)->notNull(),
            'flag'   	 => $this->integer(6)->notNull(),
        	'baseGZ'   	 => $this->integer(4)->notNull(),
        	'fullWork'   => $this->integer(3)->notNull(),
        	'jobGZ'   	 => $this->integer(4)->notNull()->defaultValue('0'),
        	'salesFood'  => $this->integer(4)->notNull()->defaultValue('0'),
        	'salesCard'  => $this->integer(4)->notNull()->defaultValue('0'),
        	'salesDrink' => $this->integer(3)->notNull()->defaultValue('0'),
            'holidays' 	 => $this->integer(3)->notNull()->defaultValue('0'),
        	'cups'   	 => $this->integer(4)->notNull()->defaultValue('0'),
        	'late'       => $this->integer(4)->notNull()->defaultValue('0'),
            'others'     => $this->integer(4)->notNull()->defaultValue('0'),
            'total'      => $this->integer(4)->notNull(),
            'des'        => $this->string()->notNull()->defaultValue('无'),
        ], $tableOptions);        
    }

    public function safeDown()
    {
    	$this->dropTable(self::TBL_WAGE);

    }
}
