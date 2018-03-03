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
        			    		'text' => '/mulai-iphone-2'
        					]
        				]
        			]
        		),


           )
    );
}
