<?php

/**
 * @Author: lichao
 * @Date:   2018-01-12 21:03:03
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 14:18:13
 */
/**
* 简历内容控制器
*/
//引入MYSQL公共类
file_exists("./class/mysql.class.php") ? $path = "./class/mysql.class.php" : $path = "../class/mysql.class.php";
include_once($path);

/**
* myResume控制器类
*/
class Index extends Mysql
{
	public $sql;
	public $login = '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/application/wxUserAdmin/index.php/index/getLoginPage"/>';
	/**
	 * 获取登录页面
	 */
	public function getLoginPage(){
		include("./view/login.html");
	}
	/**
	 * 获取首页方法
	 */
	public function getIndexBySigned(){
		//$this->sql = "SELECT `openId`,`userName`,`phone`,`email` FROM userInfo";
		//$this->getAll($this->sql);
		if ($_SESSION['id'] !== '') {
			include("./view/index.html");
		}else{
			echo $this->login;
		}
		
	}
	/**
	 * 获取帮助文档方法
	 */
	public function getHelpByAll(){
		if ($_SESSION['id'] !== '') {
			include("./view/documentation/documentation.html");
		}else{
			echo $this->login;
		}
	}

}








?>