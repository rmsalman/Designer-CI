<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Description of MyAuthorize
 *
 * @author wahyu widodo
 */
 
include("./vendor/autoload.php"); 
 
class MyAuthorize {
	
	public $merchanAuthentication;
	public $refId;

	public function __construct(){		
		$this->merchanAuthentication = new net\authorize\api\contract\v1\MerchantAuthenticationType(); 
		$this->merchanAuthentication->setName("9PbmL5KV3f"); 
		$this->merchanAuthentication->setTransactionKey("98c3M97TD7Lej486");
		$this->refId = 'ref'.time();
	}

	public function chargerCreditCard($detCus){	
		$creditCard = new net\authorize\api\contract\v1\CreditCardType();
		$creditCard->setCardNumber($detCus['cnumber']);
		$creditCard->setExpirationDate($detCus['cexpdate']);					 	
		$creditCard->setCardCode($detCus['ccode']);

		$paymentOne = new net\authorize\api\contract\v1\PaymentType();
		$paymentOne->setCreditCard($creditCard);

		$order = new net\authorize\api\contract\v1\OrderType();
		$order->setDescription($detCus['cdesc']);

		// Preparin customer information object
		$billto = new net\authorize\api\contract\v1\CustomerAddressType();
		$billto->setFirstName($detCus['fname']);
		$billto->setLastName($detCus['lname']);
		$billto->setAddress($detCus['address']);
		$billto->setCity($detCus['city']);
		$billto->setState($detCus['state']);
		$billto->setCountry($detCus['country']);
		$billto->setZip($detCus['zip']);
		$billto->setPhoneNumber($detCus['phone']);
		$billto->setEmail($detCus['email']);


		// create transaction 
		$transactionRequestType = new net\authorize\api\contract\v1\TransactionRequestType();
		$transactionRequestType->setTransactionType("authCaptureTransaction");
		$transactionRequestType->setAmount($detCus['amount']); 
		$transactionRequestType->setOrder($order);
		$transactionRequestType->setPayment($paymentOne);
		$transactionRequestType->setBillTo($billto);

		$request = new net\authorize\api\contract\v1\CreateTransactionRequest();
		$request->setMerchantAuthentication($this->merchanAuthentication);
		$request->setRefId($this->refId); 				  	
		$request->setTransactionRequest($transactionRequestType);
		$controllerx = new net\authorize\api\controller\CreateTransactionController($request);
		$response = $controllerx->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

		if ($response != null){
		    $tresponse = $response->getTransactionResponse();

		    if (($tresponse != null) && ($tresponse->getResponseCode()=="1") ) {

		    	return $arrayName = array('message' => "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n"."Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n", 'status' => true, 'code' => $tresponse->getResponseCode() );
		    }else{
		    	return $arrayName = array('message' => "Charge Credit Card ERROR :  Invalid response\n", 'status' => false, 'code' => $tresponse->getResponseCode());
		    }

		} else{

		    	return $arrayName = array('message' => "Charge Credit card Null response returned", 'status' => false, 'code' => $tresponse->getResponseCode());

		}
	}
}