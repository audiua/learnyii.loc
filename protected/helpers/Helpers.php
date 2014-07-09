<?php

class Helpers
{

	public static function encrypt( $str , $salt )
	{
		$options = [
		    'salt' => $salt, //write your own code to generate a suitable salt
		    'cost' => 12 // the default cost is 10
		];

		return password_hash($str, PASSWORD_DEFAULT, $options);
	}

	public static function createUrl($url)
	{	
		return Yii::app()->params->test . Yii::app()->createUrl($url);
	}
}
