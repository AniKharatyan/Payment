<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use App\Action\SecondGateAction;
use Illuminate\Http\JsonResponse;
use App\Request\SecondCallbackRequest;

class SecondGateController extends Controller
{
    public function __construct(
        public SecondGateAction $secondGateAction
    ) {}

    public function gateCallback(SecondCallbackRequest $request): JsonResponse
    {
        $data = [
            "project" => $request->getProject(),
            "invoice" =>$request->getInvoice(),
            "status" => $request->getStatus(),
            "amount" => $request->getAmount(),
            "amount_paid" => $request->getAmountPaid(),
            "rand" => $request->getRand(),
            "timestamp" => Carbon::now(),
        ];

        $result = $this->secondGateAction->run($data);

        return response()->json(['message' => $result]);
    }
}
