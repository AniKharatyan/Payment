<?php

namespace app\Repository\Write;

use App\Models\Payment;

interface PaymentWriteRepositoryInterface
{
    public function update(string $status, int $limit): void;
    public function save(Payment $payment): bool;
}
