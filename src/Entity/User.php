<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"username"})
 * @UniqueEntity (fields={email})
 * @method string getUserIdentifier()
 */
class User implements UserInterface
{

    const ROLE_NORMAL = 'ROLE_NORMAL';
    const ROLE_ORGANIZATION = 'ROLE_ORGANIZATION';
    const ROLE_MODERATOR = 'ROLE_MODERATOR';
    const ROLE_ADMIN = 'ROLE_ADMIN';

    const DEFAULT_ROLES = [self::ROLE_NORMAL];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @ORM\Column (type='string', length=255)
     * @Assert\Regex(
     *     pattern="/(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{7,}/",
     *     message="hasło jest niepoprawne - musi zawierac conajmniej jedna wielka i mała litere oraz liczbe",
     * )
     */
    private $password;

    /**
     * @ORM\Column (type='string', length=255)
     * @Assert\NotBlank ()
     */
    private $name;

    /**
     * @ORM\Column (type='string', length=255)
     * @Assert\NotBlank ()
     */
    private $surname;

    /**
     * @ORM\Column (type='string', length=255)
     * @Assert\NotBlank ()
     * @Assert\Email()
     */

    private $email;

    private $posts;

    /**
     * @ORM\Column (type="simple_array", length=200)
     *
     */

    private $roles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */


    private $registrationDate;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */

    private $confiramtionToken;


    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $this->roles = self::DEFAULT_ROLES;
        $this->enabled = false;
        $this->confiramtionToken = null;
    }


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getUsername(): ?string
    {
        return $this->username;
    }


    public function setUsername(String $username): self
    {
        $this->username = $username;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }


    public function setName($name): void
    {
        $this->name = $name;
    }


    public function getSurname()
    {
        return $this->surname;
    }


    public function setSurname($surname): void
    {
        $this->surname = $surname;
    }


    public function getEmail()
    {
        return $this->email;
    }


    public function setEmail($email): void
    {
        $this->email = $email;
    }


    public function getPosts(): Collection
    {
        return $this->posts;
    }


    public function getRegistrationDate()
    {
        return $this->registrationDate;
    }


    public function setRegistrationDate($registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }


    public function getEnabled(): bool
    {
        return $this->enabled;
    }


    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }


    public function getConfiramtionToken()
    {
        return $this->confiramtionToken;
    }


    public function setConfiramtionToken($confiramtionToken): void
    {
        $this->confiramtionToken = $confiramtionToken;
    }



    public function getRoles()
    {
        return $this->roles;
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }
}
