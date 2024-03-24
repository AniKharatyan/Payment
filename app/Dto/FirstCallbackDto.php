<?php

namespace App\Dto;

use App\Request\FirstCallbackRequest;

class FirstCallbackDto
{
    public function __construct(
        public int $merchantId,
        public int $paymentId,
        public string $status,
        public int $amount,
        public int $amountPaid,
        public string $sign,
    ) {}

    public static function fromRequest(FirstCallbackRequest $request): FirstCallbackDto
    {
        return new self(
            merchantId: $request->getMerchantId(),
            paymentId: $request->getPaymentId(),
            status: $request->getStatus(),
            amount: $request->getAmount(),
            amountPaid: $request->getAmountPaid(),
            sign: $request->getSign()
        );
    }
}
