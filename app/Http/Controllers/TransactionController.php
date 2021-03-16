<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use DB;

class TransactionController extends Controller
{

    public function submitOrder(Request $request)
    {

        echo $request->amount;
        $responseData =  $this->prepareCheckout($request->amount);

        $decodedData = json_decode($responseData, true);

        if (isset($decodedData['ndc'])) {
            $checkoutId = $decodedData["ndc"];
        } else {
            $checkoutId = 'No Id Received while preparing checkout';
            echo $responseData;
            return;
        }

        $transaction = new Transaction();

        $transaction->userId = Auth::id();
        $transaction->amount = $request->amount;
        $transaction->merchantTransactionId = $request->merchantTransactionId;
        $transaction->checkoutId = $checkoutId;

        $transaction->save();


        return redirect('/payment')
            ->with(["amount" => $request->amount])
            ->with(["merchantTransactionId" => $request->merchantTransactionId])
            ->with(["responseData" => $responseData]);
    }

    public function completeOrder(Request $request)
    {

        $responseData = $this->requestPaymentStatus($request->resourcePath);

        $decodedData = json_decode($responseData, true);
        $checkoutId = $decodedData["ndc"];
        $resultCode = $decodedData["result"]["code"];
        $description = $decodedData["result"]["description"];

        $affected = DB::table('transactions')
            ->where('checkoutId', $checkoutId)
            ->update(['resultCode' => $resultCode, 'description' => $description]);

        return redirect('/home');
    }


    
    public function prepareCheckout($amount)
    {
        $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8ac7a4ca759cd78501759dd759ad02df" .
            "&amount={$amount}" .
            "&currency=EUR" .
            "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
    }

    function requestPaymentStatus($resourcePath)
    {
        $url = "https://test.oppwa.com/";
        $url .= $resourcePath; //"/v1/checkouts/{id}/payment";
        $url .= "?entityId=8ac7a4ca759cd78501759dd759ad02df";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        return $responseData;
    }
}
