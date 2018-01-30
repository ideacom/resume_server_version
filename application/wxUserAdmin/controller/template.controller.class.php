<?php

/**
 * @Author: lichao
 * @Date:   2018-01-12 21:03:03
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 14:23:42
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
class Template extends Mysql
{
	public $sql;
	public $login = '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/application/wxUserAdmin/index.php/index/getLoginPage"/>';
	/**
	 * 获取简历模板列表方法 (后续开启上传请求)
	 * @param  $openid 过滤条件
	 * @return $this->result 返回数据类型数据
	 */
	public function getTemplateByRand(){
		if ($_SESSION['id'] == '') {
			echo $this->login;
		}else{			
			$this->sql = "SELECT * FROM template";
			$this->getAll($this->sql);
			include("./view/template.html");
			return $this->result;
		}

	}
}







?>