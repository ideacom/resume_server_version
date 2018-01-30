<?php

/**
 * @Author: lichao
 * @Date:   2018-01-16 17:42:39
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-16 21:02:18
 */
//引入MYSQL公共类
include_once("./class/mysql.class.php");
/**
* 小程序公共类控制器&杂项功能控制器
*/
class Public extends Mysql
{
	public $sql;
	public $field = $_POST['field'];
	/**
	 * 搜索方法
	 * @param $field 搜索字段过滤
	 * @param $table 表字段过滤
	 * @return 返回数据类型数据
	 */
	public function getSearch($field,$table){
		$this->sql = "SELECT * FROM {$table} WHERE field LIKE '%{$field}%'";
		$this->getAll($this->sql);
		return $this->result;
	}
	/**
	 * 搜索意向职位标签方法
	 * @param  $field 搜索字段过滤
	 * @return 返回数据类型数据
	 */
	public function getIntenByFiled($field){
		$table = 'intention';
		$this->getSearchSkillByFiled($this->field,$table);
		var_dump($this->result);
		return $this->result;
	}
	/**
	 * 搜索技能标签方法
	 * @param  $field 搜索字段过滤
	 * @return 返回数据类型数据
	 */
	public function getSkillByFiled($field){
		$table = 'skill';
		$this->getSearchSkillByFiled($this->field,$table);
		var_dump($this->result);
		return $this->result;
	}
}
?>