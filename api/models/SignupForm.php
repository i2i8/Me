<?php
namespace api\models;

use api\models\Member;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
	public $vip_iden;
    public $username;
    public $gender;
    public $phonenum;
    public $openiden;
    public $birthday;
    public $flag;
 
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        	[['username','gender'], 'required'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'string', 'min' => 2, 'max' => 255],
        		
        	['phonenum', 'required'],
        	['phonenum', 'unique', 'targetClass' => '\api\models\Member', 'message' => '手机号码已被注册.'],
        	['phonenum', 'string', 'min' => 11, 'max' => 11],

			[['birthday'], 'safe'],
                
            [['gender'], 'string'],
        		
        	['openiden', 'required'],
        	['openiden', 'unique', 'targetClass' => '\api\models\Member', 'message' => 'OPENID已被注册.'],
        	['openiden', 'string', 'min' => 2, 'max' => 255],
        ];
    }
    
     /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {

        if (!$this->validate()) {
            return null;
        }
        
        $user = new Member();
        $user->vip_iden = $this->vip_iden;
        $user->username = $this->username;
        $user->gender   = $this->gender;
        $user->phonenum = $this->phonenum;
        $user->openiden = $this->openiden;
        $user->birthday = $this->birthday;
        $user->flag	    = '1';
        $user->setPassword($this->openiden);
        $user->generateAuthKey();
        /**如下若能获取数据却提交不到数据库，一定是因为member里的规则不对，由common里的User借鉴。
        echo "<pre>";
        print_r($user);
        echo "</pre>";
        exit();
        */
        return $user->save() ? $user : null;
    }
    
    public function attributeLabels()
    {
    	return [
    			'username' => '姓名',
    			'phonenum' => '电话',
    			'birthday' => '生日',
    			'openiden' => 'OpenID',
    			'gender'   => '性别',
    	];
    }
}
