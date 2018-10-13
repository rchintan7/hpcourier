<?php
#API access key from Google API's Console
    define( 'API_ACCESS_KEY', 'AAAA0lzwxw8:APA91bG5y5vC9aC7WCU4witNR7ZMoE5a1_ZbhgZW8qZ0BhodMsu_5K6KZSEkn6DIq4YEzBqD3M228Dqj8ZHNG1YuupCj2pxsRMS5DnW2Y6xqKFntcjR2a9PK5J9rdWeHry2ZNsYRgN8Wz-KGRVTlQyLk1waeQmcPZA' );
    $registrationIds = 'cMIPzHGGSNo:APA91bGCK2TfKjbJiGLT1hCYREKSKrRy3rA1wGWWsLiGx5jOllht6uvqPhlsBfxnxfibmmHDv0MNI-6lHuksC4WMM7EFImVDzR0tEqEKkrCB3BNaA5ITOGRrcfRKC0jI9wbMg1ErOUX-zRkP7fEjy7yajJXQluTxnQ';
#prep the bundle
     $msg = array
          (
		'body' 	=> 'Body  Of Notification',
		'title'	=> 'Title Of Notification',
             	'icon'	=> 'myicon',/*Default Icon*/
              	'sound' => 'mySound'/*Default sound*/
          );
	$fields = array
			(
				'to'		=> $registrationIds,
				'notification'	=> $msg
			);
	
	
	$headers = array
			(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
			);
#Send Reponse To FireBase Server	
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
		$result = curl_exec($ch );
		curl_close( $ch );
#Echo Result Of FireBase Server
echo $result;