<?php

/**
 * @Author: lichao
 * @Date:   2018-01-16 18:03:46
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-18 10:08:13
 */
//引入MYSQL公共类
include_once("./class/mysql.class.php");
/**
* 上传控制器类
* 暂未设置限制图片/视频格式，图片/视频大小
*/
class Upload extends MySql
{
	public $openId = $_POST['openId'];//应该会有错误
	public $suffix = substr($_FILES["image"]["name"], strrpos($_FILES["image"]["name"],'.'));
	public $size;
	public $content;
	public $resumeContentName = 'RESUME_'.$this->openId.date('H:i:s');
	public $sql;
	/**
	 * 新浪SAE服务器上传方法
	 * @return 返回消息类型数据
	 */
	public function upload($field){
		//小程序采用二进制编码上传，因此使用OB
		ob_start();
			readfile($_FILES['image']['tmp_name']);
			$this->content = ob_get_contents();
   		ob_end_clean();
   		$this->size = strlen($this->content);
		file_put_contents(SAE_TMP_PATH.$this->resumeContentName.$this->suffix, $this->content);
		//上传图片绝对路径至数据库
		$this->sql = "INSERT INTO userInfo (`{$field}`) VALUES ('{$field}')";
		$this->getAll($this->sql);
		if (upload("ideacom",$this->resumeContentName.$this->suffix,SAE_TMP_PATH.$this->resumeContentName.$this->suffix)) {
			echo "上传成功";//调试
			return $this->message = '上传成功';
		}else{
			echo "上传失败";//调试
			return $this->message = '上传失败';
		}
	}
	/**
	 * 上传logo方法
	 * @return 返回消息类型数据
	 */
	public function uploadLogoByOpenid(){
		$this->upload($field = 'logo');
	}
	/**
	 * 上传内容图片方法
	 * @return 返回消息类型数据
	 */
	public function uploadPicByOpenid(){
		$this->upload($field = 'pic');
	}
	/**
	 * 上传视频方法
	 * @return 返回消息类型数据
	 */
	public function uploadVideoByOpenid(){
		$this->upload($field = 'video');
	}
}




?>