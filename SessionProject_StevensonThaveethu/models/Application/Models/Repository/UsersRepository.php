<?php

namespace Application\Models\Repository;

use Application\Models\Entity\Users;
use Doctrine\ORM\EntityRepository;

class UsersRepository extends EntityRepository
{

    protected $users;

    public function findByUsername($username)
    {
        return $this->findBy(['username' => $username], ['id' => 'ASC']);
    }
}
