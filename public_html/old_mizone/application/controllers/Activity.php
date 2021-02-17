<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {


	function __construct()
	{
		parent::__construct();
	}
	function submit($type = "")
	{
		
		$data_post = $this->input->post();
    		
		$insert["type"] = $type;
		$insert["json"] = json_encode($this->input->post());

		
		$insert["created_at"] = date('Y-m-d H:i:s');
		$this->db->insert("submit", $insert);	
		$id = $this->db->insert_id();
		set_flashdata("success_message", "Save Success");
		
		redirect($_SERVER['HTTP_REFERER'],'refresh');
		
	}
	function contact_us()
	{
		$data_post = $_POST;

		$data_post["created_at"] = date('Y-m-d H:i:s');
		$this->db->insert("contact_us", $data_post);	
		$id = $this->db->insert_id();

		$this->send_email($this->input->post());
		
		set_flashdata("message-information", "Success");
		
		redirect($_SERVER['HTTP_REFERER'],'refresh');
	}
	function send_email ($data_post) {

		// $to = "chino@redcomm.co.id, malik@redcomm.co.id, diah.setyorini@id.nestle.com";
		$to = "PuguhIwan.Purnama@ID.nestle.com, diah.setyorini@id.nestle.com,aan-nur.rahmah@id.nestle.com,antonius.suryawijayanto@id.nestle.com,ahmad-chairul.latief@id.nestle.com,Adistya.Dhani@ID.nestle.com,sahabat.nestle@id.nestle.com,selly@redcomm.co.id,chino@redcomm.co.id,yuwi@redcomm.co.id,malik@redcomm.co.id";
		$subject = "New Message on Nestle Professional";
		extract($data_post);
		$emailbody = 'Name: '.$name.'<br/>Company: '.$company_name.'<br/>Email Address: '.$email.'<br/><br/>Contact number: '.$phone_number.'<br/><br/>Topic: '.$topic.'<br/>Location: '.$subject.'<br/><br/>Message: '.$message.'<br/><br/>For more details, please view the message <a href="https://www.nestleprofessional.co.id/cw-admin/login">here</a>.';
		
		// ----------------------------------------------------------------------
		// MAILGUN
		// ----------------------------------------------------------------------
		//$this->load->helper('mailgun');
		//$subject = "New Message on Nestle Professional";
		//send_mail($to, $subject, $emailbody);
		// ----------------------------------------------------------------------
/*if(! function_exists(send_mail)){
	echo "sendmail not working";
	exit();
}*/
		
		// ----------------------------------------------------------------------
		// PHP EMAIL
		// ----------------------------------------------------------------------
		 require  APPPATH . 'libraries/phpmailer/PHPMailerAutoload.php';
		 $mail = new PHPMailer;
		 $mail->IsHTML(true);
		 $mail->setFrom('no-reply@nestleprofessional.co.id');
		 $mail->addAddress("chino@redcomm.co.id");
		 $mail->Subject = "New Message on Nestle Professional";
		 $mail->msgHTML($emailbody);
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailgun.org';                     // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'postmaster@mg.redcomm.co.id';   // SMTP username
$mail->Password = '12d10d70e0a209221c839e6da750c75a';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable encryption, only 'tls' is accepted
		 //$mail->send();
$mail->AddCC('PuguhIwan.Purnama@id.nestle.com');
$mail->AddCC('diah.setyorini@id.nestle.com');
$mail->AddCC('aan-nur.rahmah@id.nestle.com');
$mail->AddCC('antonius.suryawijayanto@id.nestle.com');
$mail->AddCC('ahmad-chairul.latief@id.nestle.com');
$mail->AddCC('Adistya.Dhani@id.nestle.com');
$mail->AddCC('sahabat.nestle@id.nestle.com');
$mail->AddCC('selly@redcomm.co.id');
$mail->AddCC('yuwi@redcomm.co.id');
$mail->AddCC('malik@redcomm.co.id');
//$mail->addCustomHeader("Cc: ".$to);
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    //echo 'Message has been sent';
}
		// ----------------------------------------------------------------------

		// ----------------------------------------------------------------------
		// CI EMAIL
		// ----------------------------------------------------------------------
		// $this->load->library('email');
		// $this->email->set_mailtype("html");
		// $this->email->from('no-reply@nestleprofessional.co.id', 'Nestle Professional');
		// $this->email->to($to);
		// $this->email->subject($subject);
		// $this->email->message($emailbody);
		// $r = $this->email->send();
		// if (!$r) {
		// 	ob_start();
		// 	$this->email->print_debugger();
		// 	$error = ob_end_clean();
		// 	$errors[] = $error;
		// }
		// echo "<pre>";echo var_dump($errors);echo "</pre>";exit();
		// ----------------------------------------------------------------------
	}
}

