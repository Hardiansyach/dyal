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



		else if($pesan_datang=='menu'){
			$balas = array(
				'replyToken' => $replyToken,														
				'messages' => 
						array(
					      	array(
						'type' => 'template',	
						'altText' => 'Pilihan Menu',
						'template' =>[
						'type' => 'carousel',
						'text' => 'Pilih Handphone Anda',
						'columns'=>[
				          	
				          	[
				          	"thumbnailImageUrl"=> "https://example.com/bot/images/item1.jpg",
				          	"imageBackgroundColor"=> "#FFFFFF",
				          	"title"=> "this is menu",
				            "defaultAction"=> [
				                            "type"=> "uri",
				                            "label"=> "View detail",
				                            "uri"=> "http://example.com/page/123"
				                        ],

				           ]
						]
				]


					  			)
							)
				     );
			}
		}
			else if(!empty($groupid))
			{	
				$balas = array(
					'userId' => $profil->$userId,
					'replyToken' => $replyToken,														
					'messages' => array(
							array(
									'type' => 'text',									
									'text' => 'Bye semua'
								
									)
									)
									);
				$client->replyMessage($balas);
				sleep(10);
				$client->leave($groupid);
				
				
				
		$response = $bot->leaveRoom('<groupId>');
		echo $response->getHTTPStatus() . ' ' . $response->getRawBody();		
			}
			$result =  json_encode($balas);
			//$result = ob_get_clean();
			file_put_contents('./balasan.json',$result);
			$client->replyMessage($balas);
