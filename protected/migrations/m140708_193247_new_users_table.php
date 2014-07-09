<?php

class m140708_193247_new_users_table extends CDbMigration
{

	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('users',[
			'id'=>'pk',
			'username'=>'varchar(20) NOT NULL',
			'crypted_password'=>'varchar(20) NOT NULL',
			'email'=>'varchar(20) NOT NULL',
			'salt'=>'varchar(20) NOT NULL'
		], 'engine=innodb character set = utf8');
	}

	public function safeDown()
	{
		$this->dropTable('users');
	}
}