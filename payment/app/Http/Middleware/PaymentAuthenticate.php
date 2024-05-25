<?php

namespace App\Http\Middleware;

use App\Models\PaymentCustomerModel;
use Closure;

class PaymentAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $authorizationHeader = $request->header('Authorization');

        if (!$authorizationHeader || !str_starts_with($authorizationHeader, 'Bearer ')) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $token = str_replace('Bearer ','',$authorizationHeader);
        $tokenDecode =  base64_decode($token); 

        if($tokenDecode != env('PAYMENT_PLAINTEXT_TOKEN')){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $customer = PaymentCustomerModel::findOne(['name' => $tokenDecode ]);
        $request->attributes->set('customer', $customer);

        return $next($request);
    }
}
