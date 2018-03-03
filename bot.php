<?php
		date_default_timezone_set('Asia/Singapore');
		$wita= date('H.i.s');
		date_default_timezone_set('Asia/Jakarta');
		$wib= date('H.i.s');
		date_default_timezone_set('Asia/Jayapura');
		$wit= date('H.i.s');



		require_once('./line_class.php');
		

		$channelAccessToken = '9JQUK2JLGt6Zc+iKf15mZ5+UxfaZTsiCXBi/PZPAXmNVv8lF47gZljRMwnaFadIPKkQI6HYakZuW7Svl/Zl85DTfNsYkMFNfziMR6PzGgXVlpvoi9A+NaWNLxcUKe+QHIK0Br41U0o116uMvHOKG2wdB04t89/1O/w1cDnyilFU=';
		$channelSecret = '1d8303c95b4b30d27e967711a4d8118b';
		

		$client = new LINEBotTiny($channelAccessToken, $channelSecret);
		


        $userId 	= $client->parseEvents()[0]['source']['userId'];
		$replyToken = $client->parseEvents()[0]['replyToken'];
		$timestamp	= $client->parseEvents()[0]['timestamp'];
		$message 	= $client->parseEvents()[0]['message'];
		$messageid 	= $client->parseEvents()[0]['message']['id'];

		$profil = $client->profil($userId);
		$pesan_datang = strtolower($message['text']);
		$userx = $message['text'];
		$data = explode(":", $userx);
		$datac = "/ig:".$data[1]."";
		$datab = "/wiki:".$data[1]."";

function CallLineGetName($access_token,$userId)
{

  $url = 'https://api.line.me/v2/bot/profile/'.$userId;
  $headers = array('Authorization: Bearer ' .$access_token);
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}
$result = CallLineGetName($access_token,$userId);
$json = json_decode($result,TRUE); // CallLineGetName();

if(!is_null($json['displayName']))
{

  foreach ($json as $type => $value)
  {
     if($type == 'displayName')
     {
        $name = $value; // send reply text name
     }
  }
}


// Call DataBase
if (!is_null($datas['id'])) 
{
    foreach ($datas as $type => $value) 
    {
        
        if($type == 'id')
        {
          $id = $value;
        }
        elseif($type == 'humidity')
        {
          $humidity = $value;
        }
        elseif($type == 'tempC') 
        {
          $tempC = $value;
        }
        elseif($type == 'tempF') 
        {
          $tempF = $value;          
        }
        elseif($type == 'heatIndexC') 
        {
          $heatIndexC = $value;         
        }
        elseif($type == 'heatIndexF') 
        {
          $heatIndexF = $value;        
        }
        elseif($type == 'datetime') 
        {
          $datetime = $value;       
        }   
    } 
}



if($message['type']=='text'){
	if($pesan_datang=='link fotoku'){
		$balas = array(
				'replyToken' => $replyToken,														
				'messages' => 
							array(
								array(
									'type' => 'text',					
									'text' => 'Link Foto Kamu : ' .$profil->pictureUrl.''
										)
								)
					);
			}


	else if($pesan_datang==$datac){
		$api_ig = file_get_contents("https://www.instagram.com/".$data[1]."/?__a=1");
		$jss = json_decode($api_ig);
		$profile_pic_url_hd = $jss->user->profile_pic_url_hd;

		$text1 = 
		"Profil Instagram ".$data[1]."
		Username : ".$data[1]."
		Followers : ".$jss->user->followed_by->count."
		Following : ".$jss->user->follows->count."
		Post : ".$jss->user->media->count."
		Bio : ".$jss->user->biography."
		Website : ".$jss->user->external_url."
		Verified : ".$jss->user->is_verified."";		
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
			array(
				'type' => 'text',
				'text' => $text1					
				),
			array(
				'type' => 'image',
				'originalContentUrl' => $profile_pic_url_hd,
				'previewImageUrl' => $profile_pic_url_hd, 					
				)
			)
		);				
	}

	else if($pesan_datang=='hp'){
		$balas = array(
			'replyToken' => $replyToken,														
			'messages' => array(
				      	array(
					'type' => 'template',	
					'altText' => 'Pilih Handphone.',
					'template' =>[
						'type' => 'confirm',
					'text' => 'Pilih Handphone Anda',
					'actions' => 
					[
						[
						'type' => 'message',
						'label' => 'Android',														
						'text' => 'Android' 
						],
							
						[
						'type' => 'message',
						'label' => 'iPhone',
						'text' => 'iPhone'
						]	
					]
				]
				  )
				)
			     );
		}


else if($pesan_datang=='/mulai-android-1'){
	$balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
     //    	array(
					// 'type' => 'image',
					// 'originalContentUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo2.jpg",
					// 'previewImageUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo2.jpg"				
					// ),
        	 array(
        		   'type' => 'template',	
        		   'altText' => 'Download Aplikasi',
        		   'template' =>[
        		   		'type' => 'buttons',	
        		   		'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
        				'title' => 'Download Aplikasi',
        				'text' => 'Propana Reload',
        				'actions' => [
        					[
        			    		'type' => 'uri',
        			    		'label' => 'Aplikasi Propana',
        			    		'uri' => 'http://bit.ly/2F01wyE'
        					]
        				]
        			]
        		),
			array(
				"type" => "audio",
				"originalContentUrl" => "https://instaud.io/_/1R2o.mp3",
				"duration" => 14000
			),
			array(
        		   'type' => 'template',	
        		   'altText' => 'Lanjutkan Modul',
        		   'template' =>[
        		   		'type' => 'buttons',	
        		   		//'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
        				'title' => 'Lanjutkan Modul',
        				'text' => 'Pilih Lanjutkan',
        				'actions' => [
        					[
        			    		'type' => 'message',
        			    		'label' => 'Lanjutkan',
        			    		'text' => '/mulai-android-2'
        					]
        				]
        			]
        		),


           )
    );
}

else if($pesan_datang=='/mulai-android-2'){
	$balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
        	array(
					'type' => 'image',
					'originalContentUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo3.jpg",
					'previewImageUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo3.jpg"				
					),
			array(
				"type" => "audio",
				"originalContentUrl" => "https://instaud.io/_/1R2q.mp3",
				"duration" => 14000
			),
			array(
        		   'type' => 'template',	
        		   'altText' => 'Lanjutkan Modul',
        		   'template' =>[
        		   		'type' => 'buttons',	
        		   		//'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
        				'title' => 'Lanjutkan Modul',
        				'text' => 'Pilih Lanjutkan',
        				'actions' => [
        					[
        			    		'type' => 'message',
        			    		'label' => 'Lanjutkan',
        			    		'text' => '/mulai-android-3'
        					]
        				]
        			]
        		),

           )
    );

}


else if($pesan_datang=='/mulai-android-3'){
	$balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
        	array(
					'type' => 'image',
					'originalContentUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo2.jpg",
					'previewImageUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo2.jpg"				
					),
			array(
				"type" => "audio",
				"originalContentUrl" => "https://instaud.io/_/1R2r.mp3",
				"duration" => 14000
			),
			array(
				"type" => "audio",
				"originalContentUrl" => "https://instaud.io/_/1R2s.mp3",
				"duration" => 14000
			)
           )
    );

}

else if($pesan_datang=='android'){
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'template', // 訊息類型 (模板)
                'altText' => 'Handphone Android', // 替代文字
                'template' => array(
                    'type' => 'carousel', // 類型 (旋轉木馬)
                    'columns' => array(
                        array(
                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Aplikasi', // 標題 1 <不一定需要>
                            'text' => 'Download Aplikasi Propana Reload', // 文字 1
                            'actions' => array(
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Download Aplikasi', // 標籤 3
                                    'uri' => 'http://bit.ly/2F01wyE' // 連結網址
                                ),
                            )
                        ),
                        array(
                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Modul', // 標題 2 <不一定需要>
                            'text' => 'Belajar Memulai Aplikasi Android', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'message', // 類型 (連結)
                                    'label' => 'Mulai Belajar', // 標籤 3
                                    'text' => '/mulai-android-1' // 連結網址
                                ),
                            )
                        ),
                        array(
                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Penipuan', // 標題 2 <不一定需要>
                            'text' => 'Hati Hati Dengan Penipuan! Baca Selengkapnya,', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'message', // 類型 (連結)
                                    'label' => 'Penipuan', // 標籤 3
                                    'text' => '/penipuan-online' // 連結網址
                                ),
                            )
                        )
                    )
                )
            )
        )
    );

	}


	else if($pesan_datang=='iPhone'){
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'template', // 訊息類型 (模板)
                'altText' => 'Handphone iPhone', // 替代文字
                'template' => array(
                    'type' => 'carousel', // 類型 (旋轉木馬)
                    'columns' => array(
                        array(
                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Aplikasi', // 標題 1 <不一定需要>
                            'text' => 'Download Aplikasi Telegram', // 文字 1
                            'actions' => array(
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Download Aplikasi', // 標籤 3
                                    'uri' => 'https://itunes.apple.com/us/app/telegram-messenger/id686449807?mt=8' // 連結網址
                                ),
                            )
                        ),
                        array(
                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Modul', // 標題 2 <不一定需要>
                            'text' => 'Belajar Memulai Aplikasi di iPhone', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'message', // 類型 (連結)
                                    'label' => 'Mulai Belajar', // 標籤 3
                                    'text' => '/mulai-iphone-1' // 連結網址
                                ),
                            )
                        ),
                        array(
                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Penipuan', // 標題 2 <不一定需要>
                            'text' => 'Hati Hati Dengan Penipuan! Baca Selengkapnya,', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'message', // 類型 (連結)
                                    'label' => 'Penipuan', // 標籤 3
                                    'text' => '/penipuan-online' // 連結網址
                                ),
                            )
                        )
                    )
                )
            )
        )
    );

	}



else if($pesan_datang=='menu'){
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'template', // 訊息類型 (模板)
                'altText' => 'Pilihan Menu', // 替代文字
                'template' => array(
                    'type' => 'carousel', // 類型 (旋轉木馬)
                    'columns' => array(
                    	array(
                    	    'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
                    	    'title' => 'Pengaturan', // 標題 1 <不一定需要>
                    	    'text' => 'Pilihan Menu', // 文字 1
                    	    'actions' => array(
                    	        array(
                    	            'type' => 'message', // 類型 (訊息)
                    	            'label' => 'Modul', // 標籤 2
                    	            'text' => 'HP' // 用戶發送文字
                    	        ),
                    	        array(
                    	            'type' => 'uri', // 類型 (訊息)
                    	            'label' => 'Info Promo', // 標籤 2
                    	            'uri' => 'https://t.me/propana_info' // 用戶發送文字
                    	        ),
                    	        array(
                    	            'type' => 'uri', // 類型 (訊息)
                    	            'label' => 'Web Report', // 標籤 2
                    	            'uri' => 'http://bit.ly/2rmAIOR' // 用戶發送文字
                    	        )
                    	    )
                    	),
                        array(
                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Pengaturan', // 標題 1 <不一定需要>
                            'text' => 'Pilihan Menu', // 文字 1
                            'actions' => array(
                                array(
                                    'type' => 'uri', // 類型 (訊息)
                                    'label' => 'No Center', // 標籤 2
                                    'uri' => 'https://justpaste.it/1hsw3' // 用戶發送文字
                                ),
                    	        array(
                    	            'type' => 'uri', // 類型 (訊息)
                    	            'label' => 'Format Transaksi', // 標籤 2
                    	            'uri' => 'https://justpaste.it/1hsof' // 用戶發送文字
                                ),
                                array(
                                    'type' => 'uri', // 類型 (訊息)
                                    'label' => 'Komplain Transaksi', // 標籤 2
                                    'uri' => 'https://t.me/propanareload_cs' // 用戶發送文字
                                )
                            )
                        ),
                        array(
                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Contact Admin', // 標題 2 <不一定需要>
                            'text' => 'Pilihan Menu', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Admin I', // 標籤 3
                                    'uri' => 'https://line.me/ti/p/~dejody31' // 連結網址
                                ),
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Admin II', // 標籤 3
                                    'uri' => 'https://line.me/ti/p/~alroysh' // 連結網址
                                ),
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Line Official', // 標籤 3
                                    'uri' => 'https://line.me/ti/p/%40vds1946l' // 連結網址
                                )
                            )
                        )
                    )
                )
            )
        )
    );

	}


// else if($pesan_datang=='audio'){
// 	$balas = array(
// 		'replyToken' => $replyToken,														
// 		'messages' => array(
// 			array(
// 				"type" => "audio",
// 				"originalContentUrl" => "https://instaud.io/_/1R2o.mp3",
// 				"duration" => 14000
// 			)
// 		)
// 	);

// }


// Modul 1 : https://instaud.io/_/1R2o.mp3
// Modul 2 : https://instaud.io/_/1R2q.mp3
// Modul 3 : https://instaud.io/_/1R2r.mp3
// Modul 4 : https://instaud.io/_/1R2s.mp3
// Photo : https://raw.githubusercontent.com/alroysh/dyal/master/image/photo2.jpg

else if($pesan_datang=='.example'){
    $balas = array(
        'replyToken' => $replyToken,
        'messages' => array(
            array(
                'type' => 'template', // 訊息類型 (模板)
                'altText' => 'Example buttons template', // 替代文字
                'template' => array(
                    'type' => 'carousel', // 類型 (旋轉木馬)
                    'columns' => array(
                        array(
                            'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Example Menu 1', // 標題 1 <不一定需要>
                            'text' => 'Description 1', // 文字 1
                            'actions' => array(
                                array(
                                    'type' => 'postback', // 類型 (回傳)
                                    'label' => 'postback 1', // 標籤 1
                                    'data' => '/mulai-android-1' // 資料
                                ),
                                array(
                                    'type' => 'message', // 類型 (訊息)
                                    'label' => 'Message example 1', // 標籤 2
                                    'text' => 'Message example 1' // 用戶發送文字
                                ),
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Uri example 1', // 標籤 3
                                    'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                                )
                            )
                        ),
                        array(
                            'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
                            'title' => 'Example Menu 2', // 標題 2 <不一定需要>
                            'text' => 'Description 2', // 文字 2
                            'actions' => array(
                                array(
                                    'type' => 'postback', // 類型 (回傳)
                                    'label' => 'postback 2', // 標籤 1
                                    'data' => 'hp' // 資料
                                ),
                                array(
                                    'type' => 'message', // 類型 (訊息)
                                    'label' => 'Message example 2', // 標籤 2
                                    'text' => 'Message example 2' // 用戶發送文字
                                ),
                                array(
                                    'type' => 'uri', // 類型 (連結)
                                    'label' => 'Uri example 2', // 標籤 3
                                    'uri' => 'https://github.com/GoneTone/line-example-bot-php' // 連結網址
                                )
                            )
                        )
                    )
                )
            )
        )
    );

	}










	}


		$result =  json_encode($balas);
		//$result = ob_get_clean();
		file_put_contents('./balasan.json',$result);
		$client->replyMessage($balas);
