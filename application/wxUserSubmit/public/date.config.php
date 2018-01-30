<?php

/**
 * @Author: lichao
 * @Date:   2018-01-18 09:50:40
 * @Last Modified by:   lichao
 * @Last Modified time: 2018-01-18 09:53:21
 */
//配置wx.request传值数组
//数据分布在userinfo&userresume表
$myResume = array(
	'openId' => $_POST['openId'],
	'userName' => $_POST['userName'],
	'sex' => $_POST['sex'],
	'age' => $_POST['age'],
	'phone' => $_POST['phone'],
	'email' => $_POST['email'],
	'location' => $_POST['location'],
	'workYears' => $_POST['workYears'],
	'intention' => $_POST['intention'],
	'skill' => $_POST['skill'],
	'hobby' => $_POST['hobby'],
	'comment' => $_POST['comment'],
	'studyTime' => $_POST['studyTime'],
	'studyLocation' => $_POST['studyLocation'],
	'workTime' => $_POST['workTime'],
	'workLocation' => $_POST['workLocation']
);
?>