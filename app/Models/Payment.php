<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int $user_id
 * @property int $merchant_id
 * @property int $payment_id
 * @property string $status
 * @property int $amount
 * @property int $amount_paid
 * @property int $limit
 * @property string $provider
 * @property int $invoice
 * @property string $sign
 */

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "merchant_id",
        "payment_id",
        "status",
        "amount",
        "amount_paid",
        "limit",
        "provider",
        "project",
        "invoice",
        "sign",
    ];

    public function payment(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public static function staticCreate(int $userId, array $data, string $sign, string $provider, int $limit): Payment
    {
        $payment = new self();

        $payment->setUserId($userId);
        $payment->setMerchantId($data['merchant_id']);
        $payment->setPaymentId($data['payment_id']);
        $payment->setStatus('created');
        $payment->setAmount($data["amount"]);
        $payment->setAmountPaid($data["amount_paid"]);
        $payment->setSign($sign);
        $payment->setProvider($provider);
        $payment->setLimit($limit);

        return $payment;
    }

    public function setUserId(int $userId): void
    {
        $this->user_id = $userId;
    }

    public function setMerchantId(int $merchantId): void
    {
        $this->merchant_id = $merchantId;
    }

    public function setPaymentId(int $paymentId): void
    {
        $this->payment_id = $paymentId;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function setAmountPaid(int $amountPaid): void
    {
        $this->amount_paid = $amountPaid;
    }

    public function setSign(string $sign): void
    {
        $this->sign = $sign;
    }

    public function setProvider(string $provider): void
    {
        $this->provider = $provider;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }
}
