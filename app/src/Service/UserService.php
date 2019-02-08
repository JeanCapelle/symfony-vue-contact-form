<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Post;
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
     * @param Array $array
     * @return boolean
     */
    public function validUser(Array $array)
    {
        $userMailDb = $this->em->getRepository(Post::class)->findOneBy([
            'email' => $array['email'],
        ]);
        if( $userMailDb != null){
            return false;
        }
        return true;
    }

    /**
     * @param Array $array
     * @return User
     */
    public function createUser(Array $array): user
    {
        $object = (object) $array;
        $userEntity = new User();
        $postEntity = new Post();

        $userEntity->setFirstname($array['firstname']);
        $userEntity->setLastname($array['lastname']);
        $userEntity->setEmail($array['email']);
        $userEntity->setLogin($array['email']);
        $userEntity->setPhone($array['phone']);
        $userEntity->setRoles(['ANONYMOUSLY']);

        $postEntity->setMessage($array['message']);
        $postEntity->setUser($userEntity);

        $this->em->persist($userEntity);
        $this->em->persist($postEntity);
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
