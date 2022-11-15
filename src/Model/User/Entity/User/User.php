<?php
declare(strict_types=1);

namespace App\Model\User\Entity\User;

class User
{    
    /**
     * @var Id
     */
    private $id;
    /**
     * @var \DateTimeImmutable
     */
    private $date;
    /**
     * @var Email
     */
    private $email;
    /**
     * @var string
     */
    private $passwordHash;
    
    public function __construct(Id $id, \DateTimeImmutable $date, Email $email, string $passwordHash) {
        $this->id = $id;
        $this->date = $date;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getpasswordHash(): string
    {
        return $this->passwordHash;
    }
}