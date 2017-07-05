<?php

namespace Workplace\UsersBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="`users`")
 * @ORM\Entity
 */
class User extends BaseUser
{

    /**
     * @var string $name
     */
    private $name;

    /**
     * @var string $surname
     */
    private $surname;

    /**
     * @var string $othername
     */
    private $othername;



    /**
     * User constructor.
     */

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
