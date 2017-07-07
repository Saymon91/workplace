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
    const ROLE_SUPER_ADMIN = 'ROLE_ROOT';
    const ROLE_ADMIN       = 'ROLE_ADMIN';
    const ROLE_USER        = 'ROLE_USER';
    const ROLE_GUEST       = 'ROLE_GUEST';

    const ROLES = [self::ROLE_SUPER_ADMIN, self::ROLE_ADMIN, self::ROLE_USER, self::ROLE_GUEST];

    static function isOwner(?User $user = null, ?User $target = null) : bool {
        return (!$user || !$target) ? false : $user->getId() === $target->getId();
    }

    static function getFields(?User $user = null) : array{
        $fields = [];
        foreach (self::INFO_FIELDS as $key => $value)
        {
            $roles = array_count_values($value['roles']) ? $value['roles'] : self::ROLES;
            $list = array_count_values($value['list']) ? $value['list'] : null;

            if (
                ($user && $list && !in_array($user->getId(), $list))
                or
                ($user && array_count_values(array_intersect($user->getRoles(), $roles)))
            ) {
                $fields[$key] = $value;
            }
        }

        return $fields;
    }

    const INFO_FIELDS = [
        'username' => [
            'roles' => [],
            'owner' => true,
            'list'  => []
        ],
        'email'    => [
            'roles' => ['ROLE_ADMIN', 'ROLE_ROOT'],
            'owner' => true,
            'list'  => []
        ],
        'roles'    => [
            'roles' => ['ROLE_ADMIN', 'ROLE_ROOT'],
            'owner' => false,
            'list'  => []
        ],
        'name'     => [
            'roles' => [],
            'owner' => true,
            'list'  => []
        ],
        'surname'  => [
            'roles' => [],
            'owner' => true,
            'list'  => []
        ],
        'othername'=> [
            'roles' => [],
            'owner' => true,
            'list'  => []
        ],
        'birthday' => [
            'roles' => [],
            'owner' => true,
            'list'  => []
        ]
    ];

    /**
     * User constructor.
     */

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string")
     */
    private $name;

    /**
     * @var string $surname
     *
     * @ORM\Column(type="string")
     */
    private $surname;

    /**
     * @var string $othername
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $othername;


    /**
     * @var date $birthday
     *
     * @ORM\Column(type="date")
     */
    private $birthday;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set othername
     *
     * @param string $othername
     *
     * @return User
     */
    public function setOthername($othername)
    {
        $this->othername = $othername;

        return $this;
    }

    /**
     * Get othername
     *
     * @return string
     */
    public function getOthername()
    {
        return $this->othername;
    }

    /**
     * Set birthday
     *
     * @param string $birthday
     *
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return string
     */
    public function getBirthday()
    {
        return $this->birthday;
    }


    public function getInfo(?User $user = null, array $fields = []) : array
    {
        $allowed_fields = self::getFields($user);
        $fields = ($fields && array_count_values($fields))
            ? array_intersect($fields, $allowed_fields)
            : $allowed_fields;

        $result = [];
        foreach ($fields as $key => $value)
        {
            if ($user->hasRole(self::ROLE_SUPER_ADMIN) || $user->hasRole(self::ROLE_ADMIN) || $value['owner'] && self::isOwner($user, $this)) {
                $getter = 'get' . ucfirst($key);
                if (method_exists($this, $getter)) {
                    $result[$key] = $this->$getter();
                }
            }
        }

        return $result;
    }
}
