<?php

namespace App\Company\src\DataFixtures;

use App\Company\src\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $company = (new Company())
            ->setName("DreamTeam")
            ->setAddress1("123 Dream St")
            ->setZipCode("12345")
            ->setTown("Dream City")
        ;

        $manager->persist($company);
        $manager->flush();
    }
}
