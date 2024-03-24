<?php

namespace App\Request;

use Illuminate\Foundation\Http\FormRequest;

class FirstCallbackRequest extends FormRequest
{
    const MERCHANT_ID = 'merchant_id';
    const PAYMENT_ID = 'payment_id';
    const STATUS = 'status';
    const AMOUNT = 'amount';
    const AMOUNT_PAID = 'amount_paid';
    const SIGN = 'sign';
    const NAME = 'name';
    const EMAIL = 'email';

    public function rules(): array
    {
        return [
            self::MERCHANT_ID => [
                'required',
                'integer'
            ],

            self::PAYMENT_ID => [
                'required',
                'integer'
            ],

            self::STATUS => [
                'required',
                'string'
            ],

            self::AMOUNT => [
                'required',
                'integer'
            ],

            self::AMOUNT_PAID => [
                'required',
                'integer'
            ],

            self::SIGN => [
                'required',
                'string'
            ],

            self::NAME => [
                'required',
                'string'
            ],

            self::EMAIL => [
                'required',
                'email'
            ],
        ];
    }

    public function getMerchantId(): int
    {
        return $this->get(self::MERCHANT_ID);
    }

    public function getPaymentId(): int
    {
        return $this->get(self::PAYMENT_ID);
    }

    public function getStatus(): string
    {
        return $this->get(self::STATUS);
    }

    public function getAmount(): int
    {
        return $this->get(self::AMOUNT);
    }

    public function getAmountPaid(): int
    {
        return $this->get(self::AMOUNT_PAID);
    }

    public function getSign(): string
    {
        return $this->get(self::SIGN);
    }

    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }
}
