<?php

/**
 * 
 */
class User extends CActiveRecord
{

	public $password;
	public $password_repeat;

	public function rules()
	{
		return[
			['username, email, password', 'required'],
			['username, email', 'unique'],
			['email', 'email'],
			['password', 'compare'],
			['password_repeat', 'safe']
		];
	}


	/**
	 * [model description]
	 * @param  [type] $className [description]
	 * @return [type]            [description]
	 */
	static public function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * [tableName description]
	 * @return [type] [description]
	 */
	public function tableName()
	{
		return 'users';
	}

	protected function beforeValidate()
	{
		parent::beforeValidate();

		$this->salt = uniqid() . uniqid();
		$this->crypted_password = Helpers::encrypt($this->password , $this->salt);

		return true;
	}
}