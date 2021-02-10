<?php
function send_mail($to, $subject, $html_content, $cc = "")
{
	$key = "key-54a3fafb596d89d4ace965997c00e031";
	$key = "key-54a3fafb596d89d4ace965997c00e031";
	$url = "https://api.mailgun.net/v3/mg.redcomm.co.id/messages";




	$config = [
		'api_key'	=> $key,
		'api_url'	=> $url
	];

	$message = [
		'from'			=> 'Nestle Professional <no-reply@nestleprofessional.co.id>',
		'to'			=> $to,
		'h:Reply-To'	=> 'no-reply@nestleprofessional.co.id',
		'subject'		=> $subject,
		'html'			=> $html_content,
		'text'			=> ''
	];
	if ($cc){
		$message['cc'] = $cc;
	}
  	// echo $html_content;exit();
  	
	$ch = curl_init();
 
	curl_setopt($ch, CURLOPT_URL, $config['api_url']);
	curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($ch, CURLOPT_USERPWD, "api:{$config['api_key']}");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_POST, true); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
 	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
	
	$result = curl_exec($ch);

	//$ch = curl_init("http://google.com");    // initialize curl handle
    //curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    //$data = curl_exec($ch);
    //print($data);
	
	//phpinfo();
//	if( ! $result = curl_exec($ch)) 
    //{ 
	//echo "error with curl";
  //      trigger_error(curl_error($ch));
//	echo curl_error($ch);
//exit(); 
  //  } 
//	 print_r($ch);

}

function prepare_mail($config)
{
	
	$body = $config['content'];

	if ($config['to'])
	{
		send_mail($config['to'], $config['subject'], $body, isset($config['cc'])?$config['cc']:"");
	}
	else
	{
		echo $body;
	}
}
