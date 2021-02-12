<?php

namespace App\DataFixtures;

use App\Entity\Categories;
use App\Entity\Films;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    // ici je mets mes categories en db
    public function load(ObjectManager $manager)
    {
        $action = new Categories();
        $action->setNom("Action");
        $manager->persist($action);

        /*ici j'aimerais creer trois films de categorie action (mais ça marche po)*/
        for ($i = 0; $i < 3; $i++){
            $film = new Films();
            $film->setCategorie($action);
            $film->setNom("Explosion$i");
            $film->setAnnee(200 + $i);
        }

        $drame = new Categories();
        $drame->setNom("Drame");
        $manager->persist($drame);

        $spaceopera = new Categories();
        $spaceopera->setNom("Space Opera");
        $manager->persist($spaceopera);

        $aventure = new Categories();
        $aventure->setNom("Aventure");
        $manager->persist($aventure);


        $manager->flush();
    }
}
