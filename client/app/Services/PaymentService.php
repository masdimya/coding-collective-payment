<?php
namespace App\Services;
use GuzzleHttp\Client;

class PaymentService 
{
  protected $url;
  protected $token;

  public function __construct() {
    $this->token = base64_encode(env('PAYMENT_PLAINTEXT_TOKEN'));
    $this->url   = env('PAYMENT_HOST').'/payments';
  }

  protected function paymentRequest($path, $method, $body ){
    $client = new Client();
    $url    =  $this->url.$path;

    return $client->request($method, $url, [
      'headers' => [
          'Authorization' => 'Bearer ' . $this->token,
          'Accept'        => 'application/json',
          'Content-Type'  => 'application/json',
      ],
      'json' => $body,
    ]);

  }

  public function paymentWithdraw($orderId, $amount, $timestamp){
    return $this->paymentRequest('/withdraw','POST', [
      'order_id' => $orderId,
      'amount'   => $amount,
      'timestamp' => $timestamp
    ]);
  }

  public function paymentDeposit($orderId, $amount, $timestamp){
    return $this->paymentRequest('/deposit','POST', [
      'order_id' => $orderId,
      'amount'   => $amount,
      'timestamp' => $timestamp
    ]);
  }
}
