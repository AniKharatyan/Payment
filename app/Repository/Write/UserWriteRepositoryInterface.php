<?php

namespace app\Repository\Write;

use App\Models\User;

interface UserWriteRepositoryInterface
{
    public function save(User $user): bool;
}
