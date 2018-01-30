<?php

/**
 * @Author: lichao
 * @Date:   2018-01-14 13:15:06
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 14:32:54
 */
//引入MYSQL公共类
include_once("./class/mysql.class.php");
/**
* 登录控制器类
*/
class Sign extends Mysql
{
	public $sql;
	public $notfund = '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/public/view/404.html"/>';
	public $login = '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/application/wxUserAdmin/index.php/index/getLoginPage"/>';
	public $index = '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/application/wxUserAdmin/index.php/index/getIndexBySigned"/>';
	/**
	 * getLogin方法-->登录
	 * @param  $openid wx.request的openId
	 * @return $this->result  parent内的$result数组
	 */
	public function getLogin(){
		include_once("./public/date.config.php");
		$this->sql = "SELECT * FROM wxAdminUser WHERE email = '{$config['email']}' AND password = '{$config['password']}'";
		$this->getAll($this->sql);
		if(!empty($this->result)){
			$_SESSION['id'] = $this->result[0]['id'];
			$_SESSION['name'] = $this->result[0]['name'];
			echo $this->index;
		} else{
			echo $this->login;
		}
	}
	/**
	 * getLoginOut方法-->退出
	 */
	public function getLoginOut(){
		$_SESSION['id'] = '';
		$_SESSION['name'] = '';
		echo $this->login;
	}
	/**
	 * getMySetting方法-->转到账户设置页
	 */
	public function getMySetting(){
		if ($_SESSION['id'] !== '') {
			include("./view/mysetting.html");
		}else{
			echo $this->login;
		}
		
	}
	/**
	 * Register方法 暂未启用
	 * @param  $openid wx.request的openId
	 * @return $this->result  parent内的$result数组
	 */
	public function getRegister(){
		/**
		 * 暂未放开注册
		 * @var string
		$this->sql = "INSERT INTO wxAdminUser (`email`,`password`,`name`) VALUES('{$this->config['email']}','{$this->config['password']}','{$this->config['name']}')";
		$this->query($this->sql);
		$this->login($email,$password);
		return $this->result;*/
		echo '暂未开放注册，如有需求请联系管理员<a href="">lichao_works@163.com</a>';
	}
	
}

?>