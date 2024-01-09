<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Product;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        //  Créer une nouvelle instance de Faker
        $faker = Factory::create('fr_FR');

        // boucle pour créer 20 produits
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            // Utiliser Faker pour générer de fausses données
            $product->setName($faker->word);
            $product->setPrice($faker->numberBetween(10, 200));
            // Préparer l'objet pour la sauvegarde
            $manager->persist($product);
        }

        // Enregistrer les données en base de données
        $manager->flush();
    }
}
