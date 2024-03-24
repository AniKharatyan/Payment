<?php

namespace App\Http\Controllers;

use App\Action\FirstGateAction;
use Illuminate\Http\JsonResponse;
use App\Request\FirstCallbackRequest;

class FirstGateController extends Controller
{
    public function __construct(
        public FirstGateAction $firstCallbackAction
    ) {}

    public function gateCallback(FirstCallbackRequest $request): JsonResponse
    {
        $data = [
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            "merchant_id" => $request->getMerchantId(),
            "payment_id" => $request->getPaymentId(),
            "status" => $request->getStatus(),
            "amount" => $request->getAmount(),
            "amount_paid" => $request->getAmountPaid(),
        ];

        $result = $this->firstCallbackAction->run($data);

        return response()->json(['message' => $result]);
    }
}
