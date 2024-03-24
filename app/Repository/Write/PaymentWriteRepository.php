<?php

namespace app\Repository\Write;

use App\Models\Payment;

class PaymentWriteRepository implements PaymentWriteRepositoryInterface
{
    public function update(string $status, int $limit): void
    {
        Payment::query()->update([
            'status' => $status,
            'limit' => $limit,
        ]);
    }

    public function save(Payment $payment): bool
    {
        if (!$payment->save()) {
            return false;
        }

        return true;
    }
}
