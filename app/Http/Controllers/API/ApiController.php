<?php

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\CompanyRates;

class ApiController extends Controller
{


    public function getCompanyRates(): \Illuminate\Http\JsonResponse
    {
        try {

            $companyRates=CompanyRates::all();
            return response()->json([
                'rates' => $companyRates
            ], 200);

        } catch (\Exception  $ex) {
            return response()->json([
                "message" => $ex->getMessage()
            ], 400);
        }


    }

    public function receiveCompanyRatesAll($amount): \Illuminate\Http\JsonResponse
    {
        try {

            $companyRates=CompanyRates::all();
            foreach ($companyRates as $p) {
                 $p->company_total= round(($amount*$p->company_exchange_rate)+$p->company_charges_rate,2);
            }
            return response()->json([
                'rates' => $companyRates
            ], 200);

        } catch (\Exception  $ex) {
            return response()->json([
                "message" => $ex->getMessage()
            ], 400);
        }


    }

}