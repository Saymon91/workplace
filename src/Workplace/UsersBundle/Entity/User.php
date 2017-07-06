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

    const INFO_FIELDS = ['username', 'email', 'roles', 'firstname', 'surname', 'othername', 'birthday'];

    /**
     * User constructor.
     */

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * @var integer $userid
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $userid;

    /**
     * @var string $name
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $name;

    /**
     * @var string $surname
     *
     * @ORM\Column(type="string", )
     */
    private $surname;

    /**
     * @var string $othername
     *
     * @ORM\Column(type="string")
     */
    private $othername;


    /**
     * @var date $birthday
     *
     * @ORM\Column(type="date")
     */
    private $birthday;

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

    public function getInfo(array $fields = self::INFO_FIELDS) : array
    {
        $result = [];
        foreach ($fields as $key)
        {
            $getter = 'get' . ucfirst($key);
            if (method_exists($this, $getter))
            {
                $result[$key] = $this->$getter();
            }
        }

        return $result;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getUserid()
    {
        return $this->userid;
    }
}
