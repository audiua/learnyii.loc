<?php

class SignupTest extends WebTestCase
{

	protected $fixtures = [
		'users'=>':users'
	];

	/**
	 * [testSuccessfulSineUp description]
	 * @return [type] [description]
	 */
	public function testSuccessfulSineUp(){
		$this->open('signup');
		$this->assertElementPresent('css=#signup_form');
		$this->type('css=#User_username', 'testuser01');
		$this->type('css=#User_email', 'test@test.com');
		$this->type('css=#User_password', '123456');
		$this->type('css=#User_password_repeat', '123456');
		$this->clickAndWait('css=#create_user_button');
		$this->assertTextPresent('You have been signed up successfully');
	}

	/**
	 * [testUnsuccessfulSignup description]
	 * @return [type] [description]
	 */
	public function testUnsuccessfulSignup()
	{
		$this->open('signup');
		$this->assertElementPresent('css=#signup_form');
		$this->clickAndWait('css=#create_user_button');
		$this->assertElementPresent('css=#signup_form');
	}
}