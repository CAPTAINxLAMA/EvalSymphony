<?php

namespace App\DataFixtures;

use App\Entity\Benevole;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        // Un bénévole admin pour tester la connexion
        $admin = new Benevole();
        $admin->setNom('Dupont')
              ->setPrenom('Admin')
              ->setEmail('admin@artderue.fr')
              ->setRoles(['ROLE_ADMIN'])
              ->setPassword($this->hasher->hashPassword($admin, 'password'));
        $manager->persist($admin);

        // Quelques bénévoles classiques
        for ($i = 1; $i <= 5; $i++) {
            $benevole = new Benevole();
            $benevole->setNom('Nom' . $i)
                     ->setPrenom('Prenom' . $i)
                     ->setEmail("benevole$i@artderue.fr")
                     ->setPassword($this->hasher->hashPassword($benevole, 'password'));
            $manager->persist($benevole);
        }

        $manager->flush();
    }
}