<?php

class UserTest extends CDbTestCase
{
	/**
	 * [$valid description]
	 * @var [type]
	 */
	private $valid = [
		'username'=>'testuser01',
		'email'=>'test@test.com',
		'password'=>'123456',
		'password_repeat'=>'123456'
	];

	protected $fixtures = [
		'users'=>':users'
	];


	/**
	 * [testSignUpWithValidData description]
	 * @return [type] [description]
	 */
	public function testSignUpWithValidData()
	{
		$user = new User;
		$user->attributes = $this->valid;
		$this->assertTrue($user->save());

		$user = User::model()->findByPk($user->id);
		$this->assertEquals($this->valid['username'], $user->username, 'username is not equals');
		$this->assertEquals($this->valid['email'], $user->email, 'email');
		$this->assertNotEquals('', $user->salt, 'Salt is empty');
		$this->assertNotEquals('', $user->crypted_password, 'Crypted password is empty');
	}

	/**
	 * [testSignUpWithEmptyUsername description]
	 * @return [type] [description]
	 */
	public function testSignUpWithEmptyUsername()
	{
		$user = new User;
		$invalid = $this->valid;
		$invalid['username'] ='';
		$user->attributes = $invalid;
		$this->assertFalse($user->save());
	}

	/**
	 * [testSignUpWithEmptyEmail description]
	 * @return [type] [description]
	 */
	public function testSignUpWithEmptyEmail()
	{
		$user = new User;
		$invalid = $this->valid;
		$invalid['email'] ='';
		$user->attributes = $invalid;
		$this->assertFalse($user->save());
	}

	/**
	 * [testSignUpWithEmptyPassword description]
	 * @return [type] [description]
	 */
	public function testSignUpWithEmptyPassword()
	{
		$user = new User;
		$invalid = $this->valid;
		$invalid['password'] ='';
		$user->attributes = $invalid;
		$this->assertFalse($user->save());
	}

	/**
	 * [testSignUpWithWrongEmail description]
	 * @return [type] [description]
	 */
	public function testSignUpWithWrongEmail()
	{
		$user = new User;
		$invalid = $this->valid;
		$invalid['email'] ='wrong email';
		$user->attributes = $invalid;
		$this->assertFalse($user->save());
	}

	/**
	 * [testSignUpWithNonUniqueUsernaeOrEmail description]
	 * @return [type] [description]
	 */
	public function testSignUpWithNonUniqueUsernaeOrEmail()
	{
		$user = new User;
		$user->attributes = $this->valid;
		$user->save();

		$invalid = $this->valid;
		$invalid['username'] = 'unique';

		$user = new User;
		$user->attributes = $invalid;
		$this->assertFalse($user->save(), 'Email must be unique');
	
		$invalid = $this->valid;
		$invalid['email'] = 'unique@test.com';

		$user = new User;
		$user->attributes = $invalid;
		$this->assertFalse($user->save(), 'Username must be unique');
	}

	public function testSidnUpWithWrongConfirmation()
	{
		$user = new User;
		$invalid = $this->valid;
		$invalid['password_repeat'] = '123';
		$user->attributes = $invalid;
		$this->assertFalse($user->save());
	}
}