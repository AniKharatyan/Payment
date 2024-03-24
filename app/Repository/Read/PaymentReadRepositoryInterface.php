<?php

namespace app\Repository\Read;

interface PaymentReadRepositoryInterface
{
    public function getByMerchantIdAndPaymentId(int $merchantId, int $paymentId);
    public function getByProjectAndInvoice(int $project, int $invoice);
}
