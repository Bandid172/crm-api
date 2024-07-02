<?php

namespace App\component;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserManager
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function save(User $user, $isNeedFlush = false)
    {
        $this->entityManager->persist($user);

        if($isNeedFlush) {
            $this->entityManager->flush($user);
        }
    }
}