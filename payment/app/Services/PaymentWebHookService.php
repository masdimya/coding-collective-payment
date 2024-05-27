<?php

namespace App\Services;

use App\Models\PaymentWebHookModel;
use GuzzleHttp\Client;

class PaymentWebHookService
{
  public function sendRequest($url, $method, $body){
    $client = new Client();

    return $client->request($method, $url, [
      'headers' => [
          'Accept'        => 'application/json',
          'Content-Type'  => 'application/json',
      ],
      'json' => $body,
    ]);
  }

  public function transactionSendResult($custId, $body){
    $url = PaymentWebHookModel::where('cust_id',$custId)->first()->url;
    $this->sendRequest($url,'POST',$body);
  }
}
