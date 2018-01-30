<?php

/**
 * @Author: lichao
 * @Date:   2018-01-12 21:03:03
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-29 15:49:13
 */
/**
* 简历内容控制器
*/
//引入MYSQL公共类
include_once("./class/mysql.class.php");
/**
* myResume控制器类
*/
class Resume extends Mysql
{
	public $sql;
	/**
	 * 获取用户简历文本内容方法
	 * @param  $openid 过滤条件
	 * @return $this->result 返回数据类型数据
	 */
	public function getResumeByOpenid($openid){
		//由于学习经历&工作经历可有多条，因此分表连接查询
		$this->sql = "SELECT * FROM userInfo 
			JOIN userResume ON userInfo.openId = userResume.openId 
			WHERE userInfo.openId = '{$openid}'";
		$this->getAll($this->sql);
		//由于json_encode后的数据是对象数组，因此这里利用PHP内置空类stdclass来传递数据
		$tempObj = new stdClass();
		foreach ($this->result as $key => $value) {
		 	$tempObj->$key = $value;
		}
		//传递后的对象
		//print_r($tempObj);
		//传递后被解析为json格式的数据
		//echo 'json:'.json_encode($tempObj,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		//var_dump($this->result);
		$this->result = json_encode($tempObj,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);

		return $json = $this->result;
	}
	/**
	 * 获取简历模板内容方法 (后续开启下载请求)
	 * @param  $openid 过滤条件
	 * @return $this->result 返回数据类型数据
	 */
	public function getTemplateByRand($tempClass){
		//根据简历模板对应的类型关键值选择(0=>all,1=>hot,2=>new,3=>sale,.....详见参考文档)
		$this->sql = "SELECT * FROM template WHERE class = '{$tempClass}'";
		$this->getAll($this->sql);
		$tempObj = new stdClass();
		foreach ($this->result as $key => $value) {
		 	$tempObj->$key = $value;
		}
		//传递后的对象
		//print_r($tempObj);
		//传递后被解析为json格式的数据
		//echo 'json:'.json_encode($tempObj,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
		//var_dump($this->result);
		$this->result = json_encode($tempObj,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT); 
		return $json = $this->result;
	}
	/**
	 * 简历内容更新方法
	 * @param  $openid 过滤条件
	 * @return $this->message返回消息类型数据
	 */
	public function updateResumeByOpenid($openid){
		include_once("./public/date.config.php");
		//由于学习经历&工作经历可有多条，因此分表连接更新
		$this->sql = "UPDATE userInfo INNER JOIN userResume ON userInfo.openId = userResume.openId SET
			userName = '{$this->myResume['userName']}',
			sex = {$this->myResume['sex']},
			age = '{$this->myResume['age']}',
			phone = '{$this->myResume['phone']}',
			email = '{$this->myResume['email']}',
			location = '{$this->myResume['location']}',
			workYears = '{$this->myResume['workYears']}',
			intention = '{$this->myResume['intention']}',
			skill = '{$this->myResume['skill']}',
			hobby = '{$this->myResume['hobby']}',
			comment = '{$this->myResume['comment']}',
			studyTime = '{$this->myResume['studyTime']}',
			studyLocation = '{$this->myResume['studyLocation']}',
			workTime = '{$this->myResume['workTime']}',
			workLocation = '{$this->myResume['workLocation']}'
		WHERE userInfo.openId = '{$openid}'";
		$this->getAll($this->sql);
		var_dump($this->result);
		return $this->message = '修改成功';
	}
	/**
	 * 新建简历方法
	 * @return $this->message返回消息类型数据
	 */
	public function newResumeByOpenid(){
		$this->sql = "INSERT INTO (
			`openId`,`userName`,`sex`,`age`,`phone`,`email`,`location`,`workYears`,`intention`,`skill`,`hobby`,`comment`,`studyTime`,`studyLocation`,`workTime`,`workLocation`
		)
		VALUES(
			openId = '{$this->myResume['openId']}',
			userName = '{$this->myResume['userName']}',
			sex = {$this->myResume['sex']},
			age = '{$this->myResume['age']}',
			phone = '{$this->myResume['phone']}',
			email = '{$this->myResume['email']}',
			location = '{$this->myResume['location']}',
			workYears = '{$this->myResume['workYears']}',
			intention = '{$this->myResume['intention']}',
			skill = '{$this->myResume['skill']}',
			hobby = '{$this->myResume['hobby']}',
			comment = '{$this->myResume['comment']}',
			studyTime = '{$this->myResume['studyTime']}',
			studyLocation = '{$this->myResume['studyLocation']}',
			workTime = '{$this->myResume['workTime']}',
			workLocation = '{$this->myResume['workLocation']}'
		)";
		$this->getAll($this->sql);
		var_dump($this->result);
		return $this->message = '新建成功';
	}

}







?>