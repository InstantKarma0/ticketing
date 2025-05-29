<?php

namespace App\User\src\DataFixtures;

use App\Company\src\DataFixtures\CompanyFixtures;
use App\Company\src\Entity\Company;
use App\NotificationType\src\DataFixtures\NotificationTypeFixtures;
use App\NotificationType\src\Entity\NotificationType;
use App\User\src\Entity\User;
use App\User\src\Entity\UserProfile;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $profile = $manager->getRepository(UserProfile::class)->find(1);
        $company = $manager->getRepository(Company::class)->find(1);
        $notificationType = $manager->getRepository(NotificationType::class)->find(1);


        $user->setRefUserProfile($profile);
        $user->setRefCompany($company);
        $user->setRefNotificationType($notificationType);

        $user->setFirstname("John");
        $user->setLastname("Doe");
        $user->setEmail("john.doe@test.fr");

        $user->setPassword(password_hash("123456789", PASSWORD_BCRYPT));

        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            UserProfileFixtures::class,
            CompanyFixtures::class,
            NotificationTypeFixtures::class,
        ];
    }
}
