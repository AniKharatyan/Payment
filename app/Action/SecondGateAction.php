<?php

namespace App\Action;

use app\Repository\Read\PaymentReadRepositoryInterface;
use app\Repository\Write\PaymentWriteRepositoryInterface;
use App\UseCase\PaymentUseCase;

class SecondGateAction
{
    public string $result;

    public function __construct(
        public PaymentUseCase $paymentUseCase,
        public PaymentReadRepositoryInterface $paymentReadRepository,
        public PaymentWriteRepositoryInterface $paymentWriteRepository,
    ) {}

    public function run(array $data): string
    {
        $payment = $this->paymentReadRepository->getByProjectAndInvoice($data['project'], $data['invoice']);

        if (!$payment) {
            $payment->limit -= $data['amount_paid'];

            if ($payment->limit >= 0) {
                $this->paymentWriteRepository->update($data['status'], $payment->limit);

                $this->result = 'updated';
            } else {
                $this->result = 'You have limit expired, transaction will be done after 2 days';
            }
        } else {
            $this->result = $this->paymentUseCase->run($data, 'GATE_2', env('APP_KEY'), env("GATE_2_LIMIT"), );
        }

        return $this->result;
    }
}
