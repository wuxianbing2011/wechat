<?php
include "wechat.class.php";
include "wechat_demo.php";
$options = array(
// //1149231566@qq.com 这个微信公众测试账号信息
// 		'token'=>'weixins', //填写你设定的key
//         'encodingaeskey'=>'gYyg9GkDriPttVknZGS9qtQSaIGkTFt9Ue0dhEdaK93',
//         'appsecret'=>'ee4dc56ed87f48dc6862026f330e97e9',//填写高级调用功能的密钥
// 		'appid'=>'wxb65a8b4c4ac712ef'	//填写高级调用功能的appid

		
		//Thomas 微信公众测试账号		
		'token'=>'weixin', //填写你设定的key
		'encodingaeskey'=>'xM8mTqo30A9f28E9Nn86wVLj3JcGUdE2Mxp22F4OqRD', //填写加密用的EncodingAESKey，如接口为明文模式可忽略
		'appsecret'=>'1613b40685163ac572488114d63c2ce9',//填写高级调用功能的密钥
		'appid'=>'wxf4d34b9a9a7500e8'	//填写高级调用功能的appid
	);
$weObj = new Wechat($options);
$wechatdemo = new Wechat_demo();

// $weObj->valid();//明文或兼容模式可以在接口验证通过后注释此句，但加密模式一定不能注释，否则会验证失败
$type = $weObj->getRev()->getRevType();
$data = $weObj->getRevData();
switch($type) {
	case Wechat::MSGTYPE_TEXT:
			$weObj->text($data['Content'])->reply();
			exit;
			break;
	case Wechat::MSGTYPE_EVENT:
// 			$weObj->text("最新消息")->reply();

			//上传永久素材 获取到永久的media_id
// 			$uploadForeverMedia = $weObj->uploadForeverMedia(array("media"=>'@D:\website\prcappzone.intel.com\wechat-ssl\guozu.png'),thumb);
// 			$media_ids = $uploadForeverMedia($uploadForeverMedia['media_id']);


// --------------------↓↓↓↓↓		

// 			//新增永久图文素材	获取到图文消息素材的media_id
// 			$uploadArticles = $weObj->uploadForeverArticles(
// 					array(
// 					"articles"=> array(
// 						array(
// 								"title"=> '15年了，国足昨晚终于创造"奇迹"！',
// 								"thumb_media_id"=> 'MLzX2fd81gIem4BZn5DDiDa-tLw_271gy7wNbleORGM',
// 								"author"=> '央视新闻',
// 								"digest"=> '北京时间3月29日，世界杯预选赛亚洲区40强赛最后一轮关键战打响，中国队坐镇西安主场，以2-0战胜卡塔尔队，成功晋级世界杯预选赛亚洲区12强赛。',
// 								"show_cover_pic"=> 1,
// 								"content"=> '中国队本场首发阵容出现了多个位置的调整，而提前出线的卡塔尔也在多名主将伤停的情况下大面积调整了首发。背水一战的中国队开场后迅速展开积极冲击。上半场中国队最好的机会出现在第26分钟，武磊禁区内的凌空扫射，可惜被后卫挡出。卡塔尔虽然大幅轮换，但中后场防守仍展现出积极的面貌，几次防守反击也给中国队的防线带来了威胁。半场结束时两队均未能破门。易边再战，中国队继续保持攻势，第53分钟，中国队用于大宝换下姜宁。做出人员调整以后，中国队连续发动攻势，终于在第57分钟有所收获。武磊禁区内横传制造混乱，中国队连续两次射门先后被门将和横梁拒绝。一阵混战后，黄博文在禁区外远射为国家队一锤定音。1-0！',
// 								"content_source_url"=> 'https://www.baidu.com/',
// 						),
// 					),
// 				)
// 				);
			
// 			//获取永久素材（getForeverMedia）
// 			$getForeverMedia = $weObj->getForeverMedia($uploadArticles['media_id']);
// // 			$getForeverMedia = $weObj->getForeverMedia("__0c2XN1Xq0Nv1oCYPPQ-pL9g8vlcM14orM_fyIUoq4");
// // 			$weObj->text(implode(',',$getForeverMedia['news_item'][0]))->reply();

// 			//设置回复图文
// 			$weObj->news(
// 			array(
// 					"0"=>array(
// 							'Title'=>$getForeverMedia['news_item'][0]['title'],
// 							'Description'=>$getForeverMedia['news_item'][0]['digest'],
// 							'PicUrl'=>$getForeverMedia['news_item'][0]['thumb_url'],
// 							'Url'=>$getForeverMedia['news_item'][0]['url'],
// 					),		
// 			)
// 		)->reply();
			
// -----------------------↑↑↑↑		

		
		
// --------------------↓↓↓↓↓		

			//新增永久图文素材	获取到图文消息素材的media_id
// 			$uploadArticles = $weObj->uploadForeverArticles(
// 					array(
// 					"articles"=> array(
// 						array(
// 								"title"=> '15年了，国足昨晚终于创造"奇迹"！',
// 								"thumb_media_id"=> 'MLzX2fd81gIem4BZn5DDiDa-tLw_271gy7wNbleORGM',
// 								"author"=> '央视新闻',
// 								"digest"=> '北京时间3月29日，世界杯预选赛亚洲区40强赛最后一轮关键战打响，中国队坐镇西安主场，以2-0战胜卡塔尔队，成功晋级世界杯预选赛亚洲区12强赛。',
// 								"show_cover_pic"=> 1,
// 								"content"=> '中国队本场首发阵容出现了多个位置的调整，而提前出线的卡塔尔也在多名主将伤停的情况下大面积调整了首发。背水一战的中国队开场后迅速展开积极冲击。上半场中国队最好的机会出现在第26分钟，武磊禁区内的凌空扫射，可惜被后卫挡出。卡塔尔虽然大幅轮换，但中后场防守仍展现出积极的面貌，几次防守反击也给中国队的防线带来了威胁。半场结束时两队均未能破门。易边再战，中国队继续保持攻势，第53分钟，中国队用于大宝换下姜宁。做出人员调整以后，中国队连续发动攻势，终于在第57分钟有所收获。武磊禁区内横传制造混乱，中国队连续两次射门先后被门将和横梁拒绝。一阵混战后，黄博文在禁区外远射为国家队一锤定音。1-0！',
// 								"content_source_url"=> 'https://www.baidu.com/',
// 						),
						
// 						array(
// 								"title"=> '为中国足球喝彩',
// 								"thumb_media_id"=> 'MLzX2fd81gIem4BZn5DDiDa-tLw_271gy7wNbleORGM',
// 								"author"=> '央视新闻',
// 								"digest"=> '北京时间3月29日，世界杯预选赛亚洲区40强赛最后一轮关键战打响，中国队坐镇西安主场，以2-0战胜卡塔尔队，成功晋级世界杯预选赛亚洲区12强赛。',
// 								"show_cover_pic"=> 1,
// 								"content"=> '根据亚足联安排，12强赛的抽签仪式将在4月12日进行。届时12支球队会分成两组，每组前两名直接晋级俄罗斯世界杯决赛圈，两个小组第三决出参加附加赛的球队，胜者和其他大洲的球队争夺另一个世界杯决赛阶段参赛资格。12强赛的具体赛期为2016年9月1日、9月6日、10月6日、10月11日、11月15日；2017年3月23日、3月28日、6月13日、8月31日、9月5日。
						
// 值得一提的是，抽签前，12支球队将根据4月7日国际足联排名进行分档，一共分为六个档，每档两个球队。上一期排名中，12强亚足联内部排名顺序是伊朗、日本、韩国、沙特、阿联酋、澳大利亚、乌兹别克斯坦、卡塔尔、伊拉克、中国、泰国、叙利亚。
						
// 在12支球队中，澳大利亚、韩国和日本实力明显高出其他对手，是出线最大热门。对中国队来说，相对有利的分组情况是日本、沙特、阿联酋、乌兹别克、叙利亚/泰国。当然，以中国队目前的实力，无论什么分组形势都要全力以赴。',
// 								"content_source_url"=> 'https://www.baidu.com/',
// 						),
						
						
// 					),
					
// 				)
// 				);
			
			//获取永久素材（getForeverMedia）
// 			$getForeverMedia = $weObj->getForeverMedia($uploadArticles['media_id']);
			$getForeverMedia = $weObj->getForeverMedia("MLzX2fd81gIem4BZn5DDiJRKo2pVlCrN8rw59pkCX8s");
// 			$weObj->text(implode(',',$getForeverMedia['news_item'][0]))->reply();

			//设置回复图文
			$weObj->news(
			array(
					"0"=>array(
							'Title'=>$getForeverMedia['news_item'][0]['title'],
							'Description'=>$getForeverMedia['news_item'][0]['digest'],
							'PicUrl'=>$getForeverMedia['news_item'][0]['thumb_url'],
							'Url'=>$getForeverMedia['news_item'][0]['url'],
					),	
					
					"1"=>array(
							'Title'=>$getForeverMedia['news_item'][1]['title'],
							'Description'=>$getForeverMedia['news_item'][1]['digest'],
							'PicUrl'=>$getForeverMedia['news_item'][1]['thumb_url'],
							'Url'=>$getForeverMedia['news_item'][1]['url'],
					),
					
			)
		)->reply();
			
// -----------------------↑↑↑↑		
			
			
			break;
	case Wechat::MSGTYPE_IMAGE:
			$media_id = $weObj->getMedia($data['MediaId']);
			$wechatdemo->down_media($media_id);
			$weObj->text("文件已保存")->reply();
			break;
	default:
			$weObj->text("help info")->reply();
}

//设置菜单
$newmenu = $wechatdemo->menu();
$weObj->createMenu($newmenu);


