<?php

/**
 * @Author: lichao
 * @Date:   2018-01-12 21:03:03
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 14:24:51
 */
//引入MYSQL公共类
file_exists("./class/mysql.class.php") ? $path = "./class/mysql.class.php" : $path = "../class/mysql.class.php";
include_once($path);
/**
* 后台获取用户管理列表控制器类
*/
class User extends Mysql
{
	public $sql;
	public $login = '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/application/wxUserAdmin/index.php/index/getLoginPage"/>';
	/**
	 * 获取用户列表方法
	 * @param  $openid 过滤条件
	 * @return $this->result 返回数据类型数据
	 */
	public function getResumeByOpenid(){
		if ($_SESSION['id'] == '') {
			echo $this->login;
		}else{			
			$this->sql = "SELECT `openId`,`userName`,`phone`,`email` FROM userInfo";
			$this->getAll($this->sql);
			include("./view/userlist.html");
			return $this->result;
		}
	}
	/**
	 * 获取用户详情方法
	 * @param  $openid 过滤条件
	 * @return $this->result 返回数据类型数据
	 */
	public function getDetilByOpenid(){
		if ($_SESSION['id'] == '') {
			echo $this->login;
		}else{			
			$this->sql = "SELECT `openId`,`userName`,`phone`,`email` FROM userInfo";
			$this->getAll($this->sql);
			include("./view/detil.html");
			return $this->result;
		}

	}
}








?>