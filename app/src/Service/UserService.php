<?php

namespace App\Service;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

final class UserService
{
    /** @var EntityManagerInterface */
    private $em;

    /**
     * UserService constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param String $string
     * @return User
     */
    public function createUser(String $string): user
    {
        $userEntity = new User();
        $userEntity->setMessage($string);
        $this->em->persist($userEntity);
        $this->em->flush();

        return $userEntity;
    }

    /**
     * @return string[]
     */
    public function getAll(): array
    {
        return $this->em->getRepository(User::class)->findBy([], ['id' => 'DESC']);
    }
}
