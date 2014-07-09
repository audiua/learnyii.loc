<?php

/**
 * 
 */
class UsersController extends Controller
{
	/**
	 * [actionNew description]
	 * @return [type] [description]
	 */
	public function actionNew()
	{
		$user = new User;
		$this->render('new',['user'=>$user]);
	}

	/**
	 * [actionCreate description]
	 * @return [type] [description]
	 */
	public function actionCreate()
	{
		$user = new User;
		$user->attributes = $_POST['User'];
		if($user->save()){
			Yii::app()->user->setFlash('success', 'You have been signed up successfully');
			$this->redirect('/');
		} else {
			$this->render('new', ['user'=>$user]);
		}
	}
}