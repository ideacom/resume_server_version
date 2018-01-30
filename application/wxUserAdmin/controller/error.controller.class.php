<?php

/**
 * @Author: lichao
 * @Date:   2018-01-14 15:45:15
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-14 18:52:02
 */
/**
* error错误类，当调用出错时自动查找相关错误并返回。
*/
class Error
{
	public function nullController(){
		echo "对不起，nullController，请求失败...";
		return "nullController";
	}
	public function noArgument(){
		echo "对不起，noArgument，请求失败...";
		return "noArgument";
	}
}