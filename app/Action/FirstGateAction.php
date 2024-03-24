<?php

namespace App\Action;

use App\UseCase\PaymentUseCase;
use app\Repository\Read\PaymentReadRepositoryInterface;
use app\Repository\Write\PaymentWriteRepositoryInterface;

class FirstGateAction
{
    public string $result;

    public function __construct(
        public PaymentUseCase $paymentUseCase,
        public PaymentReadRepositoryInterface $paymentReadRepository,
        public PaymentWriteRepositoryInterface $paymentWriteRepository,
    ) {}

    public function run(array $data): string
    {
        $payment = $this->paymentReadRepository->getByMerchantIdAndPaymentId($data['merchant_id'], $data['payment_id']);

        if ($payment) {
            $payment->limit -= $data['amount_paid'];

            if($payment->limit >= 0){
                $this->paymentWriteRepository->update($data['status'], $payment->limit);

                $this->result = 'updated';
            } else {
                $this->result = 'You have limit expired, transaction will be done after 2 days';
            }
        } else {
            $this->result = $this->paymentUseCase->run($data, 'GATE_1', env('APP_MERCHANT_KEY'), env("GATE_1_LIMIT"), );
        }

        return $this->result;
    }
}
