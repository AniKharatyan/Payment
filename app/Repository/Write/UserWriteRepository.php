<?php

namespace app\Repository\Write;

use App\Models\User;

class UserWriteRepository implements UserWriteRepositoryInterface
{
    public function save(User $user): bool
    {
        if (!$user->save()) {
            return false;
        }

        return true;
    }
}
