<?php

namespace app\Repository\Read;

interface UserReadRepositoryInterface
{
    public function getByNameAndEmail(string $name, string $email);
}
