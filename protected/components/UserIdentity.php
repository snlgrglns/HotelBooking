<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
//		$admins = Admin::model()->findByAttributes(array('user_name'=>$this->username));
        $admins=Admin::model()->find('LOWER(user_name)=?',array(strtolower($this->username)));

        if($admins == null){
            $admins=Admin::model()->find('LOWER(email)=?',array(strtolower($this->username)));
//            $admins = Admin::model()->findByAttributes(array('email'=>$this->username));
		}

		if($admins === null)
		{
			$this->_id = 'user Null';
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}
		else if(sha1(md5($this->password)) != $admins->password)
		{
			$this->_id = $this->id;
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{
			$this->setState('id', $admins->id);
			$this->setState('uname', $admins->user_name);
            $this->setState('fullname', $admins->fname.' '.$admins->mname.' '.$admins->lname);
			$this->_id = $admins->id;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	public function getId()
	{
		return $this->_id;
	}
}