<?php

namespace App\UseCase;

use App\Models\User;
use App\Models\Payment;
use app\Repository\Read\UserReadRepositoryInterface;
use app\Repository\Write\UserWriteRepositoryInterface;
use app\Repository\Write\PaymentWriteRepositoryInterface;

class PaymentUseCase
{
    public function __construct(
        public UserReadRepositoryInterface $userReadRepository,
        public UserWriteRepositoryInterface $userWriteRepository,
        public PaymentWriteRepositoryInterface $paymentWriteRepository,
    ) {}

    public function run(array $data, string $provider, string $key, int $limit): string
    {
        $signature = $this->generateSignature($data, $key);

        $user = $this->userReadRepository->getByNameAndEmail($data['name'], $data['email']);

        if (!$user) {
            $user = User::staticCreate($data['name'], $data['email']);

            $this->userWriteRepository->save($user);
        }

        $payment = Payment::staticCreate($user->id, $data, $signature, $provider, $limit);

        $this->paymentWriteRepository->save($payment);

        return 'created';
    }

    private function generateSignature(array $data, string $key): string
    {
        ksort($data);

        $signature = implode(":", $data) . ":" . $key;

        return hash("MD5", $signature);
    }
}
