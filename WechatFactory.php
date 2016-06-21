<?php
class WechatFactory
{
	
	public $wechatobj;
	
	public function __construct($wechatobj){
		//获取永久素材（getForeverMedia）
		$this->wechatobj = $wechatobj;
	
	}
	/*
	 * 创建自定义菜单
	 * 
	 * */
	public function create_menu(){
		$newmenu =  array(
				"button"=>
				array(
						array('type'=>'click','name'=>'最新消息','key'=>'MENU_KEY_NEWS'),
						array('type'=>'pic_photo_or_album','name'=>'拍照发图','key'=>'pic'),
						//array('type'=>'view','name'=>'历史消息','url'=>'http://mp.weixin.qq.com/mp/getmasssendmsg?__biz=wxid_swm1d8zncab921==#wechat_webview_type=1&wechat_redirect'),
				)
		);
		$this->wechatobj->createMenu($newmenu);
	}
	
	/*
	 * 下载临时素材
	 * 
	 * */
	public function down_media($media_id){
		$filemame = date('dMYHis').'.jpg';
		file_put_contents($filemame, $media_id);
	}
	
	/*
	 * 
	 * 发图文消息
	 * @param 
	 * 
	 * $pic = D:\website\prcappzone.intel.com\wechat-ssl\FileName.jpg
	 * $content	= Text
	 * 
	 * 
	 * */
	
	public function send_news($pic,$title,$content,$author,$digest,$show_cover_pic){
		//获取图片，获取文字
		$uploadForeverMedia = $this->wechatobj->uploadForeverMedia(array("media"=>'@'.$pic),thumb);
		$thumb_media_id = $uploadForeverMedia($uploadForeverMedia['media_id']);
		$content_source_url =$uploadForeverMedia();
		//新增永久图文素材	获取到图文消息素材的media_id
			$uploadArticles = $this->wechatobj->uploadForeverArticles(
					array(
					"articles"=> array(
						array(
								"title"=> $title,
								"thumb_media_id"=> $thumb_media_id,
								"author"=> $author,
								"digest"=> $digest,
								"show_cover_pic"=> $show_cover_pic,
								"content"=> $content,
								"content_source_url"=> $content_source_url,
						),
					),
				)
				);
	}
	
	/*
	 * 设置回复图文
	 * 
	 * */
	
	public function replay_news(){
		
			//获取永久素材（getForeverMedia）
			$getForeverMedia = $this->wechatobj->getForeverMedia("HY6FtiSSAw8QUERj32gOKsvg2AMUwMOiamCdGMPPROA");

			//设置回复图文
			$this->wechatobj->news(
			array(
					"0"=>array(
							'Title'=>$getForeverMedia['news_item'][0]['title'],
							'Description'=>$getForeverMedia['news_item'][0]['digest'],
							'PicUrl'=>$getForeverMedia['news_item'][0]['thumb_url'],
							'Url'=>$getForeverMedia['news_item'][0]['url'],
					),	
					
// 					"1"=>array(
// 							'Title'=>$getForeverMedia['news_item'][1]['title'],
// 							'Description'=>$getForeverMedia['news_item'][1]['digest'],
// 							'PicUrl'=>$getForeverMedia['news_item'][1]['thumb_url'],
// 							'Url'=>$getForeverMedia['news_item'][1]['url'],
// 					),
					
			)
		)->reply();
	}
	
	
	/*
	 * 预览群发消息
	 * */
	public function preview_message(){
		$this->wechatobj->previewMassMessage(
				array(
							"touser"=>"oX-2lxLOwd3HhhgGboyc4WDA_sBw",
							"msgtype"=>"mpnews",
							"mpnews" => array( "media_id"=>$mediaid)
							// 在下面5种类型中选择对应的参数内容
							// mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
							// text => array ( "content" => "hello")
					)
		);
	}
	
	
	/*
	 * 群发消息文字
	 * 高级群发消息, 根据群组id群发图文消息
	 * */
	public function repaly_text(){
		$this->wechatobj->sendGroupMassMessage(
		array(
					"filter"=>array(
						"is_to_all"=>true,     //是否群发给所有用户.True不用分组id，False需填写分组id
// 						"group_id"=>"2"     //群发的分组id
							     ),
					"msgtype"=>"text",
					"text" => array( "content"=>"[微信红包]恭喜发财，大吉大利！    愚人节快乐！帅哥你好，我是最帅复读机，还可以保存你发送的图片。。。。")
							      // 在下面5种类型中选择对应的参数内容
							      // mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
							      // text => array ( "content" => "hello")
		)
		);		
	}

	/*
	 * 群发消息文字
	 * 高级群发消息, 根据OpenID列表群发图文消息
	 * */
	public function replay_mass(){
		$this->wechatobj->sendMassMessage(
				array(
						"touser"=>array(
								"oX-2lxLOwd3HhhgGboyc4WDA_sBw",	//repoman
// 								"oX-2lxHhuPu0G0vwqe9rKevwRc20",	//下雨了	武献雨
// 								"oX-2lxG3It3oFQbxg4UKnrIYegcU",	//武现冲
// 								"oX-2lxEc3XDbScPjqsalsN8rQXxg",	//回忆里的那个人
// 								"oX-2lxNwn8LSQHky6pp1Qx547Xa0",	//江海阔 天空腾	贾江腾
// 								"oX-2lxFxZmFQOqq0ks3ij2_BAlTE",	//代韩卡	
						),
						"msgtype"=>"text",
						"text" => array( "content"=>"[微信红包]恭喜发财，大吉大利！    愚人节快乐！帅哥你好，我是最帅复读机，还可以保存你发送的图片。。。。")
						// 在下面5种类型中选择对应的参数内容
						// mpnews | voice | image | mpvideo => array( "media_id"=>"MediaId")
						// text => array ( "content" => "hello")
				)
				);
	}
	
	
	
}
?>