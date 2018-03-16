<?php

namespace backend\components;

use Yii;
use yii\base\Component;

require_once '../../vendor/autoload.php';

class SendMail extends Component{

    public $smtp      = '';
    public $port      = 465;
    public $security  = null;
    public $from      = '';
    public $pass      = '';
    public $fromName  = '';

    public $bcc = array();

    public function __construct(){
        
    }


    public function addBcc($address){
    	$this->bcc = $address;
    }

    /**
    * Enviar por email o token com a confirmação
    * @param  String $email Email a receber
    * @return Bool          TRUE se enviou FALSE se não enviou
    */

	public function send($email, $subject, $body){

	    if($this->smtp == ''){
	        $this->smtp      = '';
          $this->port      = '';
          $this->security  = '';
          $this->from      = ''; 
          $this->pass      = '';
          if($this->fromName == ''){
	           $this->fromName  = '';
          }
	    }

	    // Create the Transport
        $transport = (new \Swift_SmtpTransport($this->smtp, $this->port, $this->security))
          ->setUsername($this->from)
          ->setPassword($this->pass);

        // Create the Mailer using your created Transport
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $message = (new \Swift_Message($subject))
          ->setFrom([$this->from => $this->fromName])
          ->setTo([$email])
          ->setBody($body, 'text/html')
          ;

		try {
			if($mailer->send($message)){
				return true;
			}else{
				throw new Exception('Mensagem não enviada!', 1);
			}
		} catch (Exception $e) {
			// return false;
			throw new Exception($e->getMessage(), 500);
		}
	}
}