<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ConversionController extends Controller
{
    public function convert(Request $request)
    {
        $amount = $request->input('amount');
        $currency = $request->input('currency');

        // Fetch the conversion rate from an external API and calculate the equivalent amount in Bitcoin
        $rate = $this->getConversionRate($currency);
        $convertedAmount = round($amount / $rate ?? 0, 8);
//
//        return response()->json(['amount' => $convertedAmount]);
        return view('widgets.converter-results', ['amount' => $amount, 'currency' => $currency, 'result' => $convertedAmount]);
    }

    private function getConversionRate(string $currency): float
    {
        $client = new Client();
        $response = $client->get('https://blockchain.info/ticker');
        $data = json_decode($response->getBody(), true);

        return $data[strtoupper($currency)]['last'] ?? 0.0;
    }

    public function converter()
    {
        return view('widgets.converter-view');
    }
}

