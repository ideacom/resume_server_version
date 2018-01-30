<?php

/**
 * @Author: lichao
 * @Date:   2018-01-14 12:19:28
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 01:21:05
 */
/**
 * 过滤微信request请求参数
 * @param $uri 获得路由后的请求控制器&参数
 */
	$argument = array();
	$uri = trim(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']),'/');

/**
 * 调试用服务器变量
 * @var [type]
 *
 *	foreach ($_SERVER as $key => $value) {
 *		echo $key.'===>'.$value.'<br/><br/>';	
 *	}
 */

/**
 * 判断请求地址的控制器&参数情况
 * 自动加载相应class并实例化对象
 * @param $controller 控制器变量
 * @param $function 方法名变量
 */
	if (empty($uri)||($uri == 'resume/application/wxUserSubmit')) {
		//参数为空直接调用错误模板控制器的nullController方法
		$controller = "error";
		$function = "nullController";
	}else{
		$argument = explode('/', $uri);
		if(count($argument) < 3){
			//function为空直接调用错误模板控制器的noArgument方法
			$controller = "error";
			$function = "noArgument";
		}else{
			//请求成功，调用参数中的对应模板&对应方法
			$controller = $argument[0];
			$function = $argument[1];
		}
	}
	//判断所请求的类或方法是否存在
	if (!file_exists('./controller/' . $controller . '.controller.class.php')) {
	 	echo '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/public/view/404.html"/>';
	 	//正式服则去掉自动跳转，换成返回错误信息
	}
	//存在即引入相应控制器并实例化该类
	include_once('./controller/' . $controller . '.controller.class.php');
	$object = new $controller;
	//判断所请求的方法在该类中是否存在
	if (method_exists($object, $function)) {
		call_user_func_array(array($object,$function), array_slice($argument, 2));
	}else{
	 	echo '<meta http-equiv="refresh" content="0;URL=https://ideacom.cn/resume/public/view/404.html"/>';
	}

?>