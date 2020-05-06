<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Entity\User;

class AppFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
     }
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('test@gmail.com');
        $user->setRoles(array('ROLE_SUPER_ADMIN'));
        $user->setPassword($this->passwordEncoder->encodePassword(
                           $user,'admin123'
                           ));
        $manager->persist($user);

        $manager->flush();
    }
}
