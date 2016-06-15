<?php

namespace homeBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class Asterix
{
/**
* @Assert\NotBlank()
*/
public $nom;

    /**
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     * )
     */
public $email;

/**
* @Assert\NotBlank()
*/
public $message;
}