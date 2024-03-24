<?php

namespace App\Request;

use Illuminate\Foundation\Http\FormRequest;

class SecondCallbackRequest extends FormRequest
{
    const STATUS = 'status';
    const AMOUNT = 'amount';
    const AMOUNT_PAID = 'amount_paid';
    const PROJECT = 'project';
    const INVOICE = 'invoice';
    const RAND = 'rand';

    public function rules(): array
    {
        return [
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

            self::PROJECT => [
                'required',
                'integer'
            ],

            self::INVOICE => [
                'required',
                'integer'
            ],

            self::RAND => [
                'required',
                'string'
            ],
        ];
    }

    public function getRand(): string
    {
        return $this->get(self::RAND);
    }

    public function getInvoice(): int
    {
        return $this->get(self::INVOICE);
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

    public function getProject(): int
    {
        return $this->get(self::PROJECT);
    }
}
