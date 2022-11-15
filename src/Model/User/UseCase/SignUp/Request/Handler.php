<?php

declare(strict_types=1);

namespace App\Model\User\UseCase\SignUp\Request;

use App\Model\User\Entity\User\User;


class Handler
{
    private $users;
    private $email;
    private $hasher;
    private $flusher;

    public function __construct(UserRepository $users, Email $email, PasswordHasher $hasher, Flusher $flusher) 
    {
        $this->users = $users;
        $this->hasher = $hasher;
    }

    public function handle(Command $command): ?void
    {
        $email = new Email($command->email);

        if($this->users->hashByEmail($email)) {
            throw new \DomainException('User already exists');
        }

        $user = new User(
            Id::next(),
            new \DateTimeImmutable(),
            $email,
            $this->hasher->hash($command->password)
        );
        $this->users->add($user);
        $this->flusher->flush;
    }
}





class Handler0
{    
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function handle(Command $command): void
    {  
        $email = mb_strtolower($command->email);

        if($this->em->getRepository(User::class)->findOneBy(['email'=>$email])) {
            throw new \DomainException('User already exists');
        }

        $user = new User(
            Uuid::uuid4()->toString(),
            new \DateTimeImmutable(),
            $email,
            password_hash($command->password, PASSWORD_ARGON2I)
        );

        $this->em->persist($user);
        $this->em->flush();
    }
}