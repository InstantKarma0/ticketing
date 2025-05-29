<?php

namespace App\NotificationType\src\DataFixtures;

use App\NotificationType\src\Entity\NotificationType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class NotificationTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $notificationType = (new NotificationType())->setName("Email");

        $manager->persist($notificationType);
        $manager->flush();
    }
}
