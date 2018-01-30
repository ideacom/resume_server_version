<?php

/**
 * @Author: lichao
 * @Date:   2018-01-14 13:15:06
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-16 17:57:15
 */
//引入MYSQL公共类
include_once("./class/mysql.class.php");
/**
* 登录控制器类
*/
class Sign extends Mysql
{
	public $sql;
	/**
	 * Login方法-->登录
	 * @param  $openid wx.request的openId
	 * @return $this->result  parent内的$result数组
	 */
	public function login($openid){
		$this->sql = "SELECT * FROM userInfo WHERE openid = '{$openid}'";
		$this->getAll($this->sql);
		var_dump($this->result);
		return $this->result;
	}
	/**
	 * Register方法
	 * @param  $openid wx.request的openId
	 * @return $this->result  parent内的$result数组
	 */
	public function register($openid){
		$this->sql = "INSERT INTO userResume (`openId`) VALUES('{$openid}')";
		$this->query($this->sql);
		$this->login($openid);
		return $this->result;
	}
}

?>