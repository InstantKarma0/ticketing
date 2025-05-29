<?php

namespace App\User\src\DataFixtures;

use App\User\src\Entity\UserProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserProfileFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $userProfile = (new UserProfile())->setName('Admin');

        $manager->persist($userProfile);
        $manager->flush();
    }
}
