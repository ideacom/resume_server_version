<?php

/**
 * @Author: lichao
 * @Date:   2018-01-14 12:19:28
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-19 01:16:04
 */
/**
 * 过滤微信request请求参数
 * @param $uri 获得路由后的请求控制器&参数
 */
	$argument = array();
	$uri = trim(str_replace($_SERVER['SCRIPT_NAME'], '', $_SERVER['REQUEST_URI']),'/');
	$notfund = '<meta http-equiv=refresh content="0;URL=https://ideacom.cn/resume/public/view/404.html"/>';
	$login = '<meta http-equiv=refresh content="0;URL=https://ideacom.cn/resume/application/wxUserAdmin/index.php/index/getLoginPage"/>';
 
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
	if (strpos($_SERVER['SCRIPT_NAME'], 'index.php') == FALSE) {
		//无参数或方法直接跳转登录
		echo $login;
	}else{
		$argument = explode('/', $uri);
		if(count($argument) < 2){
			//无参数或方法直接跳转登录
			echo $login;
		}else{
			//请求成功，验证是否已经登录，调用参数中的对应模板&对应方法
			$controller = $argument[0];
			$function = $argument[1];
			
		}
	}
	//判断所请求的类或方法是否存在
	if (!file_exists('./controller/' . $controller . '.controller.class.php')) {
	 	echo $notfund;
	}
	//存在即引入相应控制器并实例化该类
	include_once('./controller/' . $controller . '.controller.class.php');
	$object = new $controller;
	//判断所请求的方法在该类中是否存在
	if (method_exists($object, $function)) {
		call_user_func_array(array($object,$function), array_slice($argument, 2));
	}else{
	 	echo $notfund;
	}
	

?>