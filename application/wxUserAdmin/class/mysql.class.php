<?php

/**
 * @Author: lichao
 * @Date:   2018-01-14 13:15:06
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 14:33:09
 */
/**
* mysql类
*/
class Mysql
{
	public $conn = null;
	public $result;
	public $message;
	/**
	 * 设置Login类初始化连接
	 */
	public function __construct(){
		$config = array(
			'host' => 'localhost',
			'userName' => 'root',
			'passWord' => 'LCDZZ.06359147',
			'dateBase' => 'resume',
			'port' => '3306'
		);
		$this->conn = mysqli_connect(
			$config['host'],
			$config['userName'],
			$config['passWord'],
			$config['dateBase'],
			$config['port']
		);
		mysqli_query($this->conn,'SET NAMES UTF8');
		session_start();
	} 
	public function query($sql){
		return mysqli_query($this->conn,$sql);
	}
	public function getAll($sql){
		$queryResult = $this->query($sql);
		$resultArray = array();
		while($row = mysqli_fetch_array($queryResult)){
			 $resultArray[] = $row;
		}
		return $this->result = $resultArray;
	}

	/**
	 * 设置Login类销毁结果集
	 */
	public function __destruct(){
		mysqli_close($this->conn);
	}
	
}
?>