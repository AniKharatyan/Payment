<?php

namespace app\Repository\Read;

use App\Models\Payment;

class PaymentReadRepository implements PaymentReadRepositoryInterface
{
    public function getByMerchantIdAndPaymentId(int $merchantId, int $paymentId)
    {
        return Payment::query()->where('merchant_id', $merchantId)
            ->where('payment_id', $paymentId)
            ->first();
    }

    public function getByProjectAndInvoice(int $project, int $invoice)
    {
        return Payment::query()->where('project', $project)
            ->where('invoice', $invoice)
            ->first();
    }
}
