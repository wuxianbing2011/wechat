<?php
include "wechat.class.php";
include "WechatFactory.php";
$options = array(
		//1149231566@qq.com 这个微信公众测试账号信息
		'token'=>'weixinw', //填写你设定的key
        'encodingaeskey'=>'gYyg9GkDriPttVknZGS9qtQSaIGkTFt9Ue0dhEdaK93',
        'appsecret'=>'ee4dc56ed87f48dc6862026f330e97e9',//填写高级调用功能的密钥
		'appid'=>'wxb65a8b4c4ac712ef'	//填写高级调用功能的appid

		
		//1149231566@qq.com 未认证得订阅号
// 		'token'=>'weixin', //填写你设定的key
//         'encodingaeskey'=>'fgtPjtrKJgHIBFLKhL776FPFnBfVoBEcdh783pKMeqn',
//         'appsecret'=>'078e7c32bb4446a051ac87ca680ccba3',//填写高级调用功能的密钥
// 		'appid'=>'wxc42e1df7a9e00886'	//填写高级调用功能的appid
	);
$weObj = new Wechat($options);
$wechatdemo = new WechatFactory($weObj);

$weObj->valid();//明文或兼容模式可以在接口验证通过后注释此句，但加密模式一定不能注释，否则会验证失败
$type = $weObj->getRev()->getRevType();
$data = $weObj->getRevData();
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			switch ($data['Content']){
				case "你好":
					$weObj->text("我很好，你呢？")->reply();
				break;
				case "你是谁":
					$weObj->text("我是帅哥")->reply();
				break;
				case "h":
					$weObj->text("h是英文字母")->reply();
				break;
				case "sendtorepoman":
					$wechatdemo->replay_mass();
				break;
				default:
					$weObj->text($data['Content'])->reply();
			}
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
		
		$wechatdemo->replay_news();

			break;
	case Wechat::MSGTYPE_IMAGE:
			$media_id = $weObj->getMedia($data['MediaId']);
			$wechatdemo->down_media($media_id);
			$weObj->text("文件已保存")->reply();
			break;
	default:
			$weObj->text("help info")->reply();
}