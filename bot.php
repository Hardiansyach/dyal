	<?php
						date_default_timezone_set('Asia/Singapore');
						$wita= date('H.i.s');
						date_default_timezone_set('Asia/Jakarta');
						$wib= date('H.i.s');
						date_default_timezone_set('Asia/Jayapura');
						$wit= date('H.i.s');

				// Modul 1 : https://instaud.io/_/1R2o.mp3
				// Modul 2 : https://instaud.io/_/1R2q.mp3
				// Modul 3 : https://instaud.io/_/1R2r.mp3
				// Modul 4 : https://instaud.io/_/1R2s.mp3
				// Modul iPhone 1 : https://instaud.io/_/1R6P.mp3
				// Modul iPhone 2 : https://instaud.io/_/1R6S.mp3
				// Modul iPhone 3 : https://instaud.io/_/1R6T.mp3
				// Photo : https://raw.githubusercontent.com/alroysh/dyal/master/image/photo2.jpg


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
						$data4 = explode(".", $userx);
						$datac = "/ig:".$data[1]."";
						$datab = "/wiki:".$data[1]."";
						$databc = strtolower("h.".$data4[1]."");

					


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


					// else if($pesan_datang=='/modul'){
					// 	$balas = array(
					// 		'replyToken' => $replyToken,														
					// 		'messages' => array(
					// 			      	array(
					// 				'type' => 'template',	
					// 				'altText' => 'Pilih Handphone.',
					// 				'template' =>[
					// 					'type' => 'confirm',
					// 				'text' => 'Pilih Handphone Anda',
					// 				'actions' => 
					// 				[
					// 					[
					// 					'type' => 'message',
					// 					'label' => 'Android',														
					// 					'text' => 'Android' 
					// 					],
											
					// 					[
					// 					'type' => 'message',
					// 					'label' => 'iPhone',
					// 					'text' => 'iPhone'
					// 					]	
					// 				]
					// 			]
					// 			  )
					// 			)
					// 		     );
					// 	}



					else if($pesan_datang=='/penipuan'){
					    $balas = array(
					        'replyToken' => $replyToken,
					        'messages' => array(
					            array(
					                'type' => 'template', // 訊息類型 (模板)
					                'altText' => 'Penipuan', // 替代文字
					                'template' => array(
					                    'type' => 'carousel', // 類型 (旋轉木馬)
					                    'columns' => array(
					                        array(
					                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
					                            'title' => 'Penipuan Transfer', // 標題 1 <不一定需要>
					                            'text' => 'Hati Hati Dengan Bukti TF Palsu', // 文字 1
					                            'actions' => array(
					                                array(
					                                    'type' => 'message', // 類型 (連結)
					                                    'label' => 'Lihat Selengkapnya', // 標籤 3
					                                    'text' => '/penipuan-online' // 連結網址
					                                ),
					                            )
					                        ),
					                        array(
					                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
					                            'title' => 'Penipuan CS Propana', // 標題 2 <不一定需要>
					                            'text' => 'Hati Hati dengan CS Gadungan', // 文字 2
					                            'actions' => array(
					                                array(
					                                    'type' => 'message', // 類型 (連結)
					                                    'label' => 'Lihat Selengkapnya', // 標籤 3
					                                    'text' => '/penipuan-cs' // 連結網址
					                                ),
					                            )
					                        ),

					                    )
					                )
					            )
					        )
					    );

						}


						else if($pesan_datang=='/bantuan'){
						    $balas = array(
						        'replyToken' => $replyToken,
						        'messages' => array(
						            array(
						                'type' => 'template', // 訊息類型 (模板)
						                'altText' => 'Bantuan', // 替代文字
						                'template' => array(
						                    'type' => 'carousel', // 類型 (旋轉木馬)
						                    'columns' => array(
						                        array(
						                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                            'title' => 'Mengapa Pulsa / Kuota Tidak Masuk?', // 標題 1 <不一定需要>
						                            'text' => 'Kak kok Pulsa / Kuota saya belum Masuk?', // 文字 1
						                            'actions' => array(
						                                array(
						                                    'type' => 'message', // 類型 (連結)
						                                    'label' => 'Lihat Selengkapnya', // 標籤 3
						                                    'text' => '/pulsa-belum-masuk' // 連結網址
						                                ),
						                            )
						                        ),
						                        array(
						                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                            'title' => 'Cara Registrasi Kartu', // 標題 2 <不一定需要>
						                            'text' => 'Bagaimana Cara Registrasi Kartu?', // 文字 2
						                            'actions' => array(
						                                array(
						                                    'type' => 'message', // 類型 (連結)
						                                    'label' => 'Lihat Selengkapnya', // 標籤 3
						                                    'text' => '/registrasi-kartu' // 連結網址
						                                ),
						                            )
						                        ),
						                        array(
						                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                            'title' => 'Apa itu Markup?', // 標題 1 <不一定需要>
						                            'text' => 'Kak apa sih itu Markup?', // 文字 1
						                            'actions' => array(
						                                array(
						                                    'type' => 'message', // 類型 (連結)
						                                    'label' => 'Lihat Selengkapnya', // 標籤 3
						                                    'text' => '/markup' // 連結網址
						                                ),
						                            )
						                        ),

						                        array(
						                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                            'title' => 'Tidak bisa masuk aplikasi?', // 標題 1 <不一定需要>
						                            'text' => 'Notifikasi Berhasil,tapi gk masuk Aplikasinya?', // 文字 1
						                            'actions' => array(
						                                array(
						                                    'type' => 'message', // 類型 (連結)
						                                    'label' => 'Lihat Selengkapnya', // 標籤 3
						                                    'text' => '/gagal-masuk-aplikasi' // 連結網址
						                                ),
						                            )
						                        ),

						                       array(
						                        //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                           'title' => 'Batas Tiket Deposit', // 標題 1 <不一定需要>
						                           'text' => 'Berapa lama Batas Tiket Deposit?', // 文字 1
						                           'actions' => array(
						                               array(
						                                   'type' => 'message', // 類型 (連結)
						                                   'label' => 'Lihat Selengkapnya', // 標籤 3
						                                   'text' => '/batas-tiket-deposit' // 連結網址
						                               ),
						                           )
						                       ),

						                       array(
						                        //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                           'title' => 'Transaksi Nomor yang Sama dalam 1 Hari', // 標題 1 <不一定需要>
						                           'text' => 'Transaksi Nomor yang Sama dalam 1 Hari?', // 文字 1
						                           'actions' => array(
						                               array(
						                                   'type' => 'message', // 類型 (連結)
						                                   'label' => 'Lihat Selengkapnya', // 標籤 3
						                                   'text' => '/transaksi-1hari' // 連結網址
						                               ),
						                           )
						                       ),

						                       array(
						                        //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                           'title' => 'Bagaimana Cara memasukan Voucher?', // 標題 1 <不一定需要>
						                           'text' => 'Bagaimana Cara memasukan Voucher?', // 文字 1
						                           'actions' => array(
						                               array(
						                                   'type' => 'message', // 類型 (連結)
						                                   'label' => 'Lihat Selengkapnya', // 標籤 3
						                                   'text' => '/kode-voucher' // 連結網址
						                               ),
						                           )
						                       ),

						                       array(
						                        //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
						                           'title' => 'Syarat Dan Ketentuan Deposit di Alfamart', // 標題 1 <不一定需要>
						                           'text' => 'Apa Syarat Dan Ketentuan Deposit di Alfamart', // 文字 1
						                           'actions' => array(
						                               array(
						                                   'type' => 'message', // 類型 (連結)
						                                   'label' => 'Lihat Selengkapnya', // 標籤 3
						                                   'text' => 'syarat-kententuan-deposit-alfa' // 連結網址
						                               ),
						                           )
						                       ),

						                    )
						                )
						            )
						        )
						    );

							}


					else if($pesan_datang=='/modul'){
						    $balas = array(
						        'replyToken' => $replyToken,
						        'messages' => array(
						            array(
						                'type' => 'template', // 訊息類型 (模板)
						                'altText' => 'Modul', // 替代文字
						                'template' => array(
						                    'type' => 'carousel', // 類型 (旋轉木馬)
						                    'columns' => array(
						                    	array(
						                    	    'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
						                    	    'title' => 'Aplikasi', // 標題 1 <不一定需要>
						                    	    'text' => 'Pilihan Menu', // 文字 1
						                    	    'actions' => array(
						                    	        array(
						                    	            'type' => 'message', // 類型 (訊息)
						                    	            'label' => 'Android', // 標籤 2
						                    	            'text' => 'Android' // 用戶發送文字
						                    	        ),
						                    	        array(
						                    	            'type' => 'message', // 類型 (訊息)
						                    	            'label' => 'iPhone', // 標籤 2
						                    	            'text' => 'iPhone' // 用戶發送文字
						                    	        ),
						                    	        array(
						                    	            'type' => 'message', // 類型 (訊息)
						                    	            'label' => 'Website', // 標籤 2
						                    	            'text' => 'Website' // 用戶發送文字
						                    	        )
						                    	    )
						                    	),
						                     //   array(
						                    	//     'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
						                    	//     'title' => 'Aplikasi', // 標題 1 <不一定需要>
						                    	//     'text' => 'Pilihan Menu', // 文字 1
						                    	//     'actions' => array(
						                    	//         array(
						                    	//             'type' => 'message', // 類型 (訊息)
						                    	//             'label' => 'Pendaftaran OVO', // 標籤 2
						                    	//             'text' => 'pendaftaran-ovo' // 用戶發送文字
						                    	//         ),
						                    	//         array(
						                    	//             'type' => 'message', // 類型 (訊息)
						                    	//             'label' => 'Upgrade OVO', // 標籤 2
						                    	//             'text' => 'upgrade-ovo' // 用戶發送文字
						                    	//         )
						                    	//     )
						                    	// ),
						                        // array(
						                        //     'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
						                        //     'title' => 'Pengaturan', // 標題 2 <不一定需要>
						                        //     'text' => 'Pilihan Menu', // 文字 2
						                        //     'actions' => array(
						                    	   //      array(
						                    	   //          'type' => 'uri', // 類型 (訊息)
						                    	   //          'label' => 'Web Report', // 標籤 2
						                    	   //          'uri' => 'http://bit.ly/2rmAIOR' // 用戶發送文字
						                    	   //      ),
						                    	   //      array(
						                    	   //          'type' => 'message', // 類型 (訊息)
						                    	   //          'label' => 'Hati-Hati Penipuan', // 標籤 2
						                    	   //          'text' => '/penipuan-online' // 用戶發送文字
						                    	   //      ),
						                        //         array(
						                        //             'type' => 'uri', // 類型 (連結)
						                        //             'label' => 'Data Center', // 標籤 3
						                        //             'uri' => 'http://dyalbalistore.blogspot.co.id/p/data-center.html' // 連結網址
						                        //         )
						                        //     )
						                        // ),
						                        // array(
						                        //     'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
						                        //     'title' => 'Contact Admin', // 標題 2 <不一定需要>
						                        //     'text' => 'Pilihan Menu', // 文字 2
						                        //     'actions' => array(
						                        //         array(
						                        //             'type' => 'uri', // 類型 (連結)
						                        //             'label' => 'Admin I', // 標籤 3
						                        //             'uri' => 'https://line.me/ti/p/~dejody31' // 連結網址
						                        //         ),
						                        //         array(
						                        //             'type' => 'uri', // 類型 (連結)
						                        //             'label' => 'Admin II', // 標籤 3
						                        //             'uri' => 'https://line.me/ti/p/~alroysh' // 連結網址
						                        //         ),
						                        //         array(
						                        //             'type' => 'uri', // 類型 (連結)
						                        //             'label' => 'Line Official', // 標籤 3
						                        //             'uri' => 'https://line.me/ti/p/%40vds1946l' // 連結網址
						                        //         )
						                        //     )
						                        // )
						                    )
						                )
						            )
						        )
						    );

							}




	//////////////////////ANDROID

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

				                    )
				                )
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
							// array(
							// 	"type" => "audio",
							// 	"originalContentUrl" => "https://docs.google.com/a/wlavikings.org/file/d/1r5uEA2ymt3A4vOF3MwT5z6FYXiRfyFVN/preview",
							// 	"duration" => 15000
							// ),
							// 
							array(
								"type" => "text",
								"text" => "Bagi Pengguna Android,silahkan downlaod aplikasi di link Download yang sudah disediakan. Setelah itu masuk ke Aplikasi dan masukan Kode Agen dan No Telp Yang Terdaftar."

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
								"type" => "text",
								"text" => "Setelah itu akan muncul kata kata 'Saya ingin mendaftarkan HP saya...'(seperti gambar diatas) lalu Copy kata kata tersebut dan pastekan ke sms lalu kirim ke salah satu Nomor Center"

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
								"type" => "text",
								"text" => "Disini saya akan memberi penjelasan singkat.\n
	1.itu ada menu untuk Daftarkan Agen,Transfer Saldo ke Downline, Kunci Aplikasi,Mengunjung Web Report
	\n
	2. Untuk melakukan Transaksi seperti isi pulsa,kuota,voucher game,PLN, dll
	\n
	3. Menu Cetak Struk\n
	4. Menu News berguna untuk mengetahui info  baru dari Propana Reload\n
	5. Messenger untuk melakukan transaksi dengan manual kode & Komplain Transaksi\n
	6.Info Akun\n
	7. Cek Harga unutk melihat kode dan harga modal\n
	8. +Saldo untuk melakukan Tiket Saldo(isi ulang saldo)\n
	9. History Transaksi"
							),

							array(
				        		   'type' => 'template',	
				        		   'altText' => 'Modul Selesai',
				        		   'template' =>[
				        		   		'type' => 'buttons',	
				        		   		//'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
				        				'title' => 'Modul Selesai',
				        				'text' => 'Modul Android telah selesai, silahkan mencoba 1 Transaksi',
				        				'actions' => [
				        					[
				        			    		'type' => 'message',
				        			    		'label' => 'Menu',
				        			    		'text' => 'menu'
				        					]
				        				]
				        			]
				        		),
				           )
				    );

				}

	//////////////////////ANDROID



					else if($pesan_datang=='website'){
				    $balas = array(
				        'replyToken' => $replyToken,
				        'messages' => array(
				            array(
				                'type' => 'template', // 訊息類型 (模板)
				                'altText' => 'Website', // 替代文字
				                'template' => array(
				                    'type' => 'carousel', // 類型 (旋轉木馬)
				                    'columns' => array(
				                        array(
				                         //   'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
				                            'title' => 'Aplikasi', // 標題 1 <不一定需要>
				                            'text' => 'Link Otoreport Propana Reload', // 文字 1
				                            'actions' => array(
				                                array(
				                                    'type' => 'uri', // 類型 (連結)
				                                    'label' => 'Menuju Link', // 標籤 3
				                                    'uri' => 'http://propana.otoreport.com/' // 連結網址
				                                ),
				                            )
				                        ),
				                        array(
				                           // 'thumbnailImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 圖片網址 <不一定需要>
				                            'title' => 'Modul', // 標題 2 <不一定需要>
				                            'text' => 'Belajar Memulai Aplikasi di Website', // 文字 2
				                            'actions' => array(
				                                array(
				                                    'type' => 'message', // 類型 (連結)
				                                    'label' => 'Mulai Belajar', // 標籤 3
				                                    'text' => '/mulai-website-1' // 連結網址
				                                ),
				                            )
				                        ),

				                    )
				                )
				            )
				        )
				    );

					}

					else if($pesan_datang=='/mulai-website-1'){
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
					        		   		//'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
					        				'title' => 'Link Otoreport Propana Reload',
					        				'text' => 'Otoreport Propana Reload',
					        				'actions' => [
					        					[
					        			    		'type' => 'uri',
					        			    		'label' => 'Menuju Link',
					        			    		'uri' => 'http://propana.otoreport.com/'
					        					]
					        				]
					        			]
					        		),
								// array(
								// 	"type" => "audio",
								// 	"originalContentUrl" => "https://docs.google.com/a/wlavikings.org/file/d/1r5uEA2ymt3A4vOF3MwT5z6FYXiRfyFVN/preview",
								// 	"duration" => 15000
								// ),
								// 
								array(
									"type" => "text",
									"text" => "Silahkan klik link diatas , lalu Pilih masuk dengan OTP\n\nMasukan No HP yang terdaftar di Propana Reload & PIN anda."

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
					        			    		'text' => '/mulai-website-2'
					        					]
					        				]
					        			]
					        		),


					           )
					    );
					}

					else if($pesan_datang=='/mulai-website-2'){
						$balas = array(
					        'replyToken' => $replyToken,
					        'messages' => array(
					        	array(
										'type' => 'image',
										'originalContentUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo6314162109570721842.jpg",
										'previewImageUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo6314162109570721842.jpg"				
										),
								array(
									"type" => "text",
									"text" => "Setelah itu klik 'Klik Kirim OTP ke Saya' , Tunggu beberapa saat akan ada SMS dari Center. lalu masukan kode OTP ke Website\n\nNB : Jangan memberi tahu siapa siapa OTPnya (Bersifat Rahasia)\n\nSukses menggunakan Web Report , silahkan Transaksi , Cek Kode Produk , Cek Status Transaksi dll"

								),
								array(
				        		   'type' => 'template',	
				        		   'altText' => 'Modul Selesai',
				        		   'template' =>[
				        		   		'type' => 'buttons',	
				        		   		//'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
				        				'title' => 'Modul Selesai',
				        				'text' => 'Modul Website telah selesai, silahkan mencoba 1 Transaksi',
				        				'actions' => [
				        					[
				        			    		'type' => 'message',
				        			    		'label' => 'Menu',
				        			    		'text' => 'menu'
				        					]
				        				]
				        			]
				        		),

					           )
					    );

					}


	//////////////////////IPHONE



					else if($pesan_datang=='iphone'){
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
				                                    'uri' => 'https://goo.gl/UnXm8U' // 連結網址
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

				                    )
				                )
				            )
				        )
				    );

					}


				else if($pesan_datang=='/mulai-iphone-1'){
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
				        		   		'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo.png',
				        				'title' => 'Download Aplikasi',
				        				'text' => 'Telegram',
				        				'actions' => [
				        					[
				        			    		'type' => 'uri',
				        			    		'label' => 'Aplikasi Telegram',
				        			    		'uri' => 'http://bit.ly/2F01wyE'
				        					]
				        				]
				        			]
				        		),
							array(
								"type" => "text",
								"text" => "Bagi Pengguna iPhone silahkan Download aplikasinya di link yan g sudah di sediakan lalu Daftarkan Nomor anda di Aplikasi tersebut."

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
				        			    		'text' => '/mulai-iphone-2'
				        					]
				        				]
				        			]
				        		),


				           )
				    );
				}




				else if($pesan_datang=='/mulai-iphone-2'){
					$balas = array(
				        'replyToken' => $replyToken,
				        'messages' => array(
				        	array(
									'type' => 'image',
									'originalContentUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo5.jpg",
									'previewImageUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo5.jpg"				
									),
							array(
								"type" => "text",
								"text" => "Setelah melakukan registrasi Telegram , silahkan cari '@tembak_propanabot' dikolom pencarian / klik t.me/tembak_propanabot untuk melakukan transaksi vai Telegram"

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
				        			    		'text' => '/mulai-iphone-3'
				        					]
				        				]
				        			]
				        		),

				           )
				    );

				}

				else if($pesan_datang=='/mulai-iphone-3'){
					$balas = array(
				        'replyToken' => $replyToken,
				        'messages' => array(
				        	array(
									'type' => 'image',
									'originalContentUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo6.jpg",
									'previewImageUrl' => "https://raw.githubusercontent.com/alroysh/dyal/master/image/photo6.jpg"				
									),
							array(
								"type" => "text",
								"text" => "Setelah itu klik 'Start' pada telegram. Lalu kamu mendapatkan ID Telegrammu. Segera daftarkan ID Telegrammu agar bisa melakukan Transaksi. Daftarkan Id Telegrammu dengan cara SMS ID Telegrammu kirim ke Nomor Center"

							),

							array(
				        		   'type' => 'template',	
				        		   'altText' => 'Modul Selesai',
				        		   'template' =>[
				        		   		'type' => 'buttons',	
				        		   		//'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/logo2.png',
				        				'title' => 'Modul Selesai',
				        				'text' => 'Modul iPhone telah selesai, silahkan mencoba 1 Transaksi',
				        				'actions' => [
				        					[
				        			    		'type' => 'message',
				        			    		'label' => 'Menu',
				        			    		'text' => 'menu'
				        					]
				        				]
				        			]
				        		),
				           )
				    );

				}

	//////////////////////IPHONE


					else if($pesan_datang=='/tutorial'){
					    $balas = array(
					        'replyToken' => $replyToken,
					        'messages' => array(
					            array(
					                'type' => 'template', // 訊息類型 (模板)
					                'altText' => 'Tutorial', // 替代文字
					                'template' => array(
					                    'type' => 'carousel', // 類型 (旋轉木馬)
					                    'columns' => array(
					                    	array(
					                    	    //'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
					                    	    'title' => 'Tutorial', // 標題 1 <不一定需要>
					                    	    'text' => 'Pilihan Menu', // 文字 1
					                    	    'actions' => array(
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' =>'Cara Mengisi Pulsa di Aplikasi', // 標籤 2
					                    	            'text' => '/isi-pulsa' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' =>'Cara Mengisi Pulsa di Telegram', // 標籤 2
					                    	            'text' => '/depo-apps' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' =>'Cara Mengambil Deposit', // 標籤 2
					                    	            'text' => 'syarat-kentetuan-deposit-alfa' // 用戶發送文字
					                    	        ),

					                    	    )
					                    	),
					                       array(
					                    	    //'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
					                    	    'title' => 'Tutorial', // 標題 1 <不一定需要>
					                    	    'text' => 'Pilihan Menu', // 文字 1
					                    	    'actions' => array(
					                    	    	array(
					                    	    	    'type' => 'message', // 類型 (訊息)
					                    	    	    'label' => 'Deposit Alfamart', // 標籤 2
					                    	    	    'text' => 'deposit-alfamart' // 用戶發送文字
					                    	    	),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Pendaftaran OVO', // 標籤 2
					                    	            'text' => 'pendaftaran-ovo' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Upgrade OVO', // 標籤 2
					                    	            'text' => 'upgrade-ovo' // 用戶發送文字
					                    	        )
					                    	    )
					                    	),
					                        // array(
					                        //     'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
					                        //     'title' => 'Pengaturan', // 標題 2 <不一定需要>
					                        //     'text' => 'Pilihan Menu', // 文字 2
					                        //     'actions' => array(
					                    	   //      array(
					                    	   //          'type' => 'uri', // 類型 (訊息)
					                    	   //          'label' => 'Web Report', // 標籤 2
					                    	   //          'uri' => 'http://bit.ly/2rmAIOR' // 用戶發送文字
					                    	   //      ),
					                    	   //      array(
					                    	   //          'type' => 'message', // 類型 (訊息)
					                    	   //          'label' => 'Hati-Hati Penipuan', // 標籤 2
					                    	   //          'text' => '/penipuan-online' // 用戶發送文字
					                    	   //      ),
					                        //         array(
					                        //             'type' => 'uri', // 類型 (連結)
					                        //             'label' => 'Data Center', // 標籤 3
					                        //             'uri' => 'http://dyalbalistore.blogspot.co.id/p/data-center.html' // 連結網址
					                        //         )
					                        //     )
					                        // ),
					                        // array(
					                        //     'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
					                        //     'title' => 'Contact Admin', // 標題 2 <不一定需要>
					                        //     'text' => 'Pilihan Menu', // 文字 2
					                        //     'actions' => array(
					                        //         array(
					                        //             'type' => 'uri', // 類型 (連結)
					                        //             'label' => 'Admin I', // 標籤 3
					                        //             'uri' => 'https://line.me/ti/p/~dejody31' // 連結網址
					                        //         ),
					                        //         array(
					                        //             'type' => 'uri', // 類型 (連結)
					                        //             'label' => 'Admin II', // 標籤 3
					                        //             'uri' => 'https://line.me/ti/p/~alroysh' // 連結網址
					                        //         ),
					                        //         array(
					                        //             'type' => 'uri', // 類型 (連結)
					                        //             'label' => 'Line Official', // 標籤 3
					                        //             'uri' => 'https://line.me/ti/p/%40vds1946l' // 連結網址
					                        //         )
					                        //     )
					                        // )
					                    )
					                )
					            )
					        )
					    );

						}


						else if($pesan_datang=='/komplain-transaksi'){
						    $balas = array(
						        'replyToken' => $replyToken,
						        'messages' => array(
						            array(
						                'type' => 'template', // 訊息類型 (模板)
						                'altText' => 'Tutorial', // 替代文字
						                'template' => array(
						                    'type' => 'carousel', // 類型 (旋轉木馬)
						                    'columns' => array(
						                    	array(
						                    	    'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
						                    	    'title' => 'Tutorial', // 標題 1 <不一定需要>
						                    	    'text' => 'Klik Tombol dibawah', // 文字 1
						                    	    'actions' => array(
						                    	        array(
						                    	           'type' => 'uri', // 類型 (訊息)
						                    	           'label' => 'Customer Service I', // 標籤 2
						                    	           'uri' => 'https://t.me/propanareload_cs' // 用戶發送文字
						                    	        )
						                    	    )
						                    	),
						                       array(
						                    	    'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
						                    	    'title' => 'Customer Service', // 標題 1 <不一定需要>
						                    	    'text' => 'Klik Tombol dibawah', // 文字 1
						                    	    'actions' => array(
						                    	        array(
						                    	            'type' => 'uri', // 類型 (訊息)
						                    	            'label' => 'Customer Service II', // 標籤 2
						                    	            'uri' => 'https://t.me/cspropana' // 用戶發送文字
						                    	        )
						                    	    )
						                    	),
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
					                    	            'text' => '/modul' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Tutorial', // 標籤 2
					                    	            'text' => '/tutorial' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Bantuan', // 標籤 2
					                    	            'text' => '/bantuan' // 用戶發送文字
					                    	        ),
					                    	    )
					                    	),
					                        array(
					                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
					                            'title' => 'Pengaturan', // 標題 1 <不一定需要>
					                            'text' => 'Pilihan Menu', // 文字 1
					                            'actions' => array(
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Nomor Center', // 標籤 2
					                    	            'text' => '/nomor-center' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'uri', // 類型 (訊息)
					                    	            'label' => 'Format Transaksi', // 標籤 2
					                    	            'uri' => 'http://dyalbalistore.blogspot.co.id/p/format-transaksi.html' // 用戶發送文字
					                                ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Komplain Transaksi', // 標籤 2
					                    	            'text' => '/komplain-transaksi' // 用戶發送文字
					                    	        ),
					                            )
					                        ),
					                        array(
					                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
					                            'title' => 'Pengaturan', // 標題 2 <不一定需要>
					                            'text' => 'Pilihan Menu', // 文字 2
					                            'actions' => array(
					                    	        array(
					                    	            'type' => 'uri', // 類型 (訊息)
					                    	            'label' => 'Web Report', // 標籤 2
					                    	            'uri' => 'http://bit.ly/2rmAIOR' // 用戶發送文字
					                    	        ),
					                    	        array(
					                    	            'type' => 'message', // 類型 (訊息)
					                    	            'label' => 'Hati-Hati Penipuan', // 標籤 2
					                    	            'text' => '/penipuan' // 用戶發送文字
					                    	        ),
					                                array(
					                                    'type' => 'uri', // 類型 (連結)
					                                    'label' => 'Data Center', // 標籤 3
					                                    'uri' => 'http://dyalbalistore.blogspot.co.id/p/data-center.html' // 連結網址
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




				else if($pesan_datang=='/modul-video'){
				    $balas = array(
				        'replyToken' => $replyToken,
				        'messages' => array(
				            array(
				                'type' => 'template', // 訊息類型 (模板)
				                'altText' => 'Modul Video', // 替代文字
				                'template' => array(
				                    'type' => 'carousel', // 類型 (旋轉木馬)
				                    'columns' => array(
				                    	array(
				                    	    'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
				                    	    'title' => 'Aplikasi Android', // 標題 1 <不一定需要>
				                    	    'text' => 'Modul Video Aplikasi Android', // 文字 1
				                    	    'actions' => array(
				                    	        array(
				                    	            'type' => 'message', // 類型 (訊息)
				                    	            'label' => 'Kirim Video', // 標籤 2
				                    	            'text' => '/video-android' // 用戶發送文字
				                    	        )
				                    	    )
				                    	),
				                        array(
				                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
				                            'title' => 'Telegram', // 標題 1 <不一定需要>
				                            'text' => 'Modul Video Telegram', // 文字 1
				                            'actions' => array(
				                    	        array(
				                    	            'type' => 'message', // 類型 (訊息)
				                    	            'label' => 'Kirim Video', // 標籤 2
				                    	            'text' => '/video-telegram' // 用戶發送文字
				                    	        )
				                            )
				                        ),
				                        array(
				                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
				                            'title' => 'Xabber', // 標題 2 <不一定需要>
				                            'text' => 'Modul Video Xabber', // 文字 2
				                            'actions' => array(
				                    	        array(
				                    	            'type' => 'message', // 類型 (訊息)
				                    	            'label' => 'Kirim Video', // 標籤 2
				                    	            'text' => '/video-xabber' // 用戶發送文字
				                    	        )
				                            )
				                        ),
				                        array(
				                            'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
				                            'title' => 'WhatsApp', // 標題 2 <不一定需要>
				                            'text' => 'Modul Video WhatsApp', // 文字 2
				                            'actions' => array(
				                    	        array(
				                    	            'type' => 'message', // 類型 (訊息)
				                    	            'label' => 'Kirim Video', // 標籤 2
				                    	            'text' => '/video-whatsapp' // 用戶發送文字
				                    	        )
				                            )
				                        )
				                    )
				                )
				            )
				        )
				    );

					}

					// else if($pesan_datang=="test"){
					// 	$no = 1;
					// 	$balas = array(
					// 	        'replyToken' => $replyToken,
					// 	        'messages' => array(
					// 	    	)
						                        
					// 		 );

					// 	while($no <= 2){ 
					// 	$bajing = array(
					// 		'type' => 'text',
					// 		'text' => 're'					
					// 		);
					// 	   	array_push($balas['messages'], $bajing);
					// 	   $no++;
					// 	}
					// }


					else if($pesan_datang==$databc){


					$url = "https://api-propana.herokuapp.com/clone.php?kode=".$data4[1]."&up=200";
					$content = file_get_contents($url);
					$json = json_decode($content,true);
					$judul = html_entity_decode($json['judul']);
					$no = 1;
					$jumlahpesan = 1;
					if(count($json['detail']) > 10){
						//$jumlah = ceil(count($json['detail'])/10);
						while($jumlahpesan <= 2){
							$balas = array(
	                        'replyToken' => $replyToken,
	                        'messages' => array(
	                            array(
	                                'type' => 'template', // 訊息類型 (模板)
	                                'altText' => 'Harga '.$judul, // 替代文字
	                                'template' => array(
	                                    'type' => 'carousel', // 類型 (旋轉木馬)
	                                    'columns' =>  array()

	                                    )
	                                )
	                            )
	                        
		                    );


								while($no <= count($json['detail'])){ 
									$kode = $json['detail'][$no]['kode'];
									$nama = $json['detail'][$no]['nama'];
									$harga = $json['detail'][$no]['harga'];
									$status = $json['detail'][$no]['status'];

									if($status == "open"){
										$status = "Tersedia";
									}
									else{
										$status = "Gangguan";
									}

									$bajing = 	array(
							   	                        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
							   	                        'title' => $judul, // 標題 1 <不一定需要>
							   	                        'text' => $nama, // 文字 1
							   	                        'actions' => array(
							   	                            array(
							   	                                'type' => 'postback', // 類型 (回傳)
							   	                                'label' => "Kode : ".$kode, // 標籤 1
							   	                                'data' => '/mulai-android-1' // 資料
							   	                            ),
							   	                            array(
							   	                                'type' => 'postback', // 類型 (回傳)
							   	                                'label' => "Harga : ".$harga, // 標籤 1
							   	                                'data' => '/mulai-android-1' // 資料
							   	                            ),
							   	                            array(
							   	                                'type' => 'postback', // 類型 (回傳)
							   	                                'label' => "Status : ".$status, // 標籤 1
							   	                                'data' => '/mulai-android-1' // 資料
							   	                            )
							   	                        )
							   	                    );
								   	array_push($balas['messages'][0]['template']['columns'], $bajing);
								   $no++;
							}
						}

					}else{

						$no = 1;
						$balas = array(
		                        'replyToken' => $replyToken,
		                        'messages' => array(
		                            array(
		                                'type' => 'template', // 訊息類型 (模板)
		                                'altText' => 'Harga '.$judul, // 替代文字
		                                'template' => array(
		                                    'type' => 'carousel', // 類型 (旋轉木馬)
		                                    'columns' =>  array()

		                                    )
		                                )
		                            )
		                        
			                    );


									while($no <= count($json['detail'])){ 
										$kode = $json['detail'][$no]['kode'];
										$nama = $json['detail'][$no]['nama'];
										$harga = $json['detail'][$no]['harga'];
										$status = $json['detail'][$no]['status'];

										if($status == "open"){
											$status = "Tersedia";
										}
										else{
											$status = "Gangguan";
										}

										$bajing = 	array(
								   	                        'thumbnailImageUrl' => 'https://raw.githubusercontent.com/alroysh/dyal/master/image/photo4.jpg', // 圖片網址 <不一定需要>
								   	                        'title' => $judul, // 標題 1 <不一定需要>
								   	                        'text' => $nama, // 文字 1
								   	                        'actions' => array(
								   	                            array(
								   	                                'type' => 'postback', // 類型 (回傳)
								   	                                'label' => "Kode : ".$kode, // 標籤 1
								   	                                'data' => '/mulai-android-1' // 資料
								   	                            ),
								   	                            array(
								   	                                'type' => 'postback', // 類型 (回傳)
								   	                                'label' => "Harga : ".$harga, // 標籤 1
								   	                                'data' => '/mulai-android-1' // 資料
								   	                            ),
								   	                            array(
								   	                                'type' => 'postback', // 類型 (回傳)
								   	                                'label' => "Status : ".$status, // 標籤 1
								   	                                'data' => '/mulai-android-1' // 資料
								   	                            )
								   	                        )
								   	                    );
									   	array_push($balas['messages'][0]['template']['columns'], $bajing);
									   $no++;
								}
					}
		    

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
