<?php
header("Content-type: text/html; charset=utf-8");
include "wechat.class.php";
// include "wechat_demo.php";
$options = array(
		//1149231566@qq.com 未认证得订阅号
// 		'token'=>'weixin', //填写你设定的key
//         'encodingaeskey'=>'fgtPjtrKJgHIBFLKhL776FPFnBfVoBEcdh783pKMeqn',
//         'appsecret'=>'078e7c32bb4446a051ac87ca680ccba3',//填写高级调用功能的密钥
// 		'appid'=>'wxc42e1df7a9e00886'	//填写高级调用功能的appid
		
//1149231566@qq.com 这个微信公众测试账号信息
		'token'=>'weixins', //填写你设定的key
        'encodingaeskey'=>'gYyg9GkDriPttVknZGS9qtQSaIGkTFt9Ue0dhEdaK93',
        'appsecret'=>'ee4dc56ed87f48dc6862026f330e97e9',//填写高级调用功能的密钥
		'appid'=>'wxb65a8b4c4ac712ef'	//填写高级调用功能的appid
				
		
// 1839346121@qq.com 这个微信公众测试账号信息
// 		'token'=>'weixina', //填写你设定的key
// 		'encodingaeskey'=>'gYyg9GkDriPttVknZGS9qtQSaIGkTFt9Ue0dhEdaK93',
// 		'appsecret'=>'81d67f0524486dc28ea2812c4647a6b9',//填写高级调用功能的密钥
// 		'appid'=>'wx9003f36f896e2630'	//填写高级调用功能的appid
				
	);
$weObj = new Wechat($options);
// print_r($weObj);
$type = $weObj->getRev()->getRevType();




// $data = $weObj->getRevData();
// $weObj->text(implode(',',$data))->reply();

// $event = $weObj->getRevEvent();
// $weObj->text(implode(',',$event))->reply();
// exit;

		
		$data = $weObj->getRevData();
// 		$mediaid = end($data);
// 		$mediaid = array_keys($data);
// 		$weObj->text(implode(',',$data))->reply();
// 		$weObj->text(implode(',', $mediaid))->reply();exit;

// 		$weObj->text($mediaid)->reply();
		


switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$weObj->text($data['Content'])->reply();
			exit;
			break;

	case Wechat::MSGTYPE_EVENT:
			
			break;
			
	case Wechat::MSGTYPE_IMAGE:
// 			$img=GrabImage($data['PicUrl'],'');
// 			if($img){
// 				$weObj->text("图片已经保存到服务器上")->reply();
// 			}else{
// 				$weObj->text("图片保存失败")->reply();
// 			}
			$downpic = $weObj->getMedia($data['MediaId']);
// 			$weObj->text($downpic)->reply();
// 			if ($downpic == TRUE){
// 				$weObj->text("图片保存到服务器")->reply();
// 			}else{
// 				$weObj->text("图片失败")->reply();
// 			}
			$weObj->image($data['MediaId'])->reply();		//与关注着互动图片
			break;
			
	default:
			$weObj->text("help info")->reply();
}

// $weObj->valid();//明文或兼容模式可以在接口验证通过后注释此句，但加密模式一定不能注释，否则会验证失败


//用户第一次关注的时候发送问候语‘welcome！’
// $weObj->text('welcome!')->reply();





//设置菜单
$menu = $weObj->getMenu();
$newmenu =  array(
		"button"=>
		array(
				array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
				array('type'=>'pic_photo_or_album','name'=>'拍照发图','key'=>'pic'),
				//array('type'=>'view','name'=>'历史消息','url'=>'http://mp.weixin.qq.com/mp/getmasssendmsg?__biz=wxid_swm1d8zncab921==#wechat_webview_type=1&wechat_redirect'),
		)
);
$result = $weObj->createMenu($newmenu);

//获取自定义菜单的图片发送事件信息
// $getRevSendPicsInfo = $weObj->getRevSendPicsInfo();
// var_dump($getRevSendPicsInfo);
// exit;

//获取事件推送
// $weObj->getRevEvent();

//回复图文消息
// $weObj->news(
// 		array(
// 				"0"=>array(
// 						'Title'=>'这是我的第一条图文消息',
// 						'Description'=>'您好，欢迎关注这里，这是第一条图文消息，也不知道写点什么',
// 						'PicUrl'=>'https://mmbiz.qlogo.cn/mmbiz/PibVSSOwNo6tWpJJT3GJtYcvdq1RaIfico3kojaE0EUe4YaqyVHdUBhodOFwmrHjwhElPcJ519AKkicp14l5UeQIg/0?wx_fmt=jpeg',
// 						'Url'=>'http://mp.weixin.qq.com/s?__biz=MzI0OTI1NzA5Nw==&mid=402472848&idx=1&sn=a44482cab0de4d3520795c3bf8b87110#rd'
// 				),
// 				"1"=>array(
// 						'Title'=>'这是我的第2条图文消息',
// 						'Description'=>'您好2，欢迎关注这里，这是第一条图文消息，也不知道写点什么',
// 						'PicUrl'=>'http://tupian.enterdesk.com/2013/xll/012/26/3/1.jpg',
// 						'Url'=>'http://www.baidu.com'
// 				),
					
// 		)
// 		)->reply();

//上传临时素材
// $uploadMedia = $weObj->uploadMedia(array("media"=>'@D:\website\prcappzone.intel.com\wechat-ssl\11.jpg'), image);
// var_dump($uploadMedia);

//获取接受图片消息
// $getRevPic = $weObj->getRevPic();
// var_dump($getRevPic);
		
//上传永久素材
// $weObj->uploadForeverMedia(array("media"=>'@D:\website\prcappzone.intel.com\wechat-ssl\11.jpg'),image);
		

//获取永久素材列表
// $ForeverList = $weObj->getForeverList(image, 0, 20);

//获取临时素材
// $weObj->getMedia(end($data));



//获取永久素材
// $getForeverMedia = $weObj->getForeverMedia("xvXKN5CszGpGTROXGKGshiqayPCvGGA56cCdr70aQYo");
		
//新增自定分组
// $createGroup = $weObj->createGroup(2);
// var_dump($createGroup);

//获取用户openid
// $weObj->getUserList();
		
//移动用户分组
// $updateGroupMembers = $weObj->updateGroupMembers(2, "oX-2lxEc3XDbScPjqsalsN8rQXxg");

// //获取用户所在的分组
// $getUserGroup = $weObj->getUserGroup("oX-2lxEc3XDbScPjqsalsN8rQXxg");
		
		
//给指定的分组发送消息
// $weObj->sendGroupMassMessage(
// 		array(
// 					"filter"=>array(
// 						"is_to_all"=>true,     //是否群发给所有用户.True不用分组id，False需填写分组id
// // 						"group_id"=>"2"     //群发的分组id
// 							     ),
// 					"msgtype"=>"image",
// 					"image" => array( "media_id"=>"xvXKN5CszGpGTROXGKGshiqayPCvGGA56cCdr70aQYo")
// 							      // 在下面5种类型中选择对应的参数内容
// 							      // mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
// 							      // text => array ( "content" => "hello")
// 		)
// 		);		

// 预览群发消息
// $weObj->previewMassMessage(
// 		array(
// 				"touser"=>"oX-2lxLOwd3HhhgGboyc4WDA_sBw",
// 				"msgtype"=>"image",
// 				"image" => array( "media_id"=>$mediaid)
// 				// 在下面5种类型中选择对应的参数内容
// 				// mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
// 				// text => array ( "content" => "hello")
// 		)
// 		);







// 		$weObj->uploadArticles(
// 			array(
// 				"articles" => array(
// 					"thumb_media_id" => "xvXKN5CszGpGTROXGKGshiqayPCvGGA56cCdr70aQYo",
// 					"author"		 => "wuxianbing",
// 					"title"			 => "Happy Day",
// 					"content_source_url" =>"www.qq.com",
// 					"content"		 => "这里是文章的Content",
// 					"digest"		 => "这里是文章的描述",
// 					"show_cover_pic" =>1,
// 				)
// 			)
// 		);

// $weObj->news(
// 		array(
// 				"0"=>array(
// 						'Title'=>'这是我的第一条图文消息',
// 						'Description'=>'您好，欢迎关注这里，这是第一条图文消息，也不知道写点什么',
// 						'PicUrl'=>'https://mmbiz.qlogo.cn/mmbiz/PibVSSOwNo6tWpJJT3GJtYcvdq1RaIfico3kojaE0EUe4YaqyVHdUBhodOFwmrHjwhElPcJ519AKkicp14l5UeQIg/0?wx_fmt=jpeg',
// 						'Url'=>'http://mp.weixin.qq.com/s?__biz=MzI0OTI1NzA5Nw==&mid=402472848&idx=1&sn=a44482cab0de4d3520795c3bf8b87110#rd'
// 				),
// 				"1"=>array(
// 						'Title'=>'这是我的第2条图文消息',
// 						'Description'=>'您好2，欢迎关注这里，这是第一条图文消息，也不知道写点什么',
// 						'PicUrl'=>'http://tupian.enterdesk.com/2013/xll/012/26/3/1.jpg',
// 						'Url'=>'http://www.baidu.com'
// 				),
	
// 		)
// 		)->reply();

// 		$datas = $weObj->previewMassMessage(
// 				array(
// 						"touser"=>"oX-2lxEc3XDbScPjqsalsN8rQXxg",
// 						"msgtype"=>"text",
// 						"text" => array( "content"=>"contentcontent")
// 						// 在下面5种类型中选择对应的参数内容
// 						// mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
// 						// text => array ( "content" => "hello")
// 				)
// 				);
// 		$weObj->text($datas)->reply();



$jsonArr = array(
		"articles"=> array(
				array(// 我就是少了这层array 才会报empty news data 错误
						"title"=> 'dingdingdemo',
						"thumb_media_id"=> '填写素材id',
						"author"=> 'martin',
						"digest"=> 'digest',
						"show_cover_pic"=> 0,
						"content"=> $content,
						"content_source_url"=> 'https://www.baidu.com/',
				),
				array(
						"title"=> 'dingdingdemo2',
						"thumb_media_id"=> '填写素材id',
						"author"=> 'martin',
						"digest"=> 'digest',
						"show_cover_pic"=> 0,
						"content"=> "content",
						"content_source_url"=> 'https://www.baidu.com/',
				)
		),
);





