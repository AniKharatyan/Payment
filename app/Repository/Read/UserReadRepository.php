<?php

namespace app\Repository\Read;

use App\Models\User;

class UserReadRepository implements UserReadRepositoryInterface
{
    public function getByNameAndEmail(string $name, string $email)
    {
        return User::query()->where('name', $name)
            ->where('email', $email)
            ->first();
    }
}
