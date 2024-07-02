<?php

namespace App\Controller;


use App\component\UserFactory;
use App\component\UserManager;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class userCreateAction extends AbstractController
{
    public function __construct(private UserFactory $userFactory, private UserManager $userManager)
    {
    }

    public function __invoke(User $data): void
    {
        $user = $this->userFactory->create($data->getUsername(), $data->getPassword(), $data->getRoles());
        $this->userManager->save($user, true);

        exit();
    }
}