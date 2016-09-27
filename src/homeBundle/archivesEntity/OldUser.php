<?php

namespace homeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="homeBundle\Repository\UserRepository")
 */
class OldUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nickname", type="string", length=50, unique=true)
     */
    private $nickname;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="heureConnexion", type="time")
     */
    private $heureConnexion;

    /**
     * @var bool
     *
     * @ORM\Column(name="gender", type="string", columnDefinition="ENUM('male', 'female')")
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfBirth", type="datetime")
     */
    private $dateOfBirth;


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
     * Set nickname
     *
     * @param string $nickname
     * @return User
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get nickname
     *
     * @return string 
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Set heureConnexion
     *
     * @param \DateTime $heureConnexion
     * @return User
     */
    public function setHeureConnexion($heureConnexion)
    {
        $this->heureConnexion = $heureConnexion;

        return $this;
    }

    /**
     * Get heureConnexion
     *
     * @return \DateTime 
     */
    public function getHeureConnexion()
    {
        return $this->heureConnexion;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime 
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }
}
