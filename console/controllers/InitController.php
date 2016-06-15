<?php 
namespace console\controllers;

use common\models\Admin;

class InitController extends \yii\console\Controller 

{
	public function actionUser() 
	
	{
		echo 'Create init user...\n';
		$username = $this->prompt('Input UserName: ');
		$email = $this->prompt('Input Email for $username : ');
		$password = $this->prompt('Input password for $username : ');
		
		$model = new Admin();
		$model->username = $username;
		$model->email = $email;
		$model->password = $password;
		
		if (!$model->save()) {
			foreach ($model->getErrors() as $errors) {
				foreach ($errors as $e) {
					echo '$e\n';
					
				}
			}
			return 1;
		}
		return 0;
	}
}
?>