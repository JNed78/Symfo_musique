<?php

namespace App\DataFixtures;

use App\Entity\Artiste;
use PHPUnit\Runner\Filter\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker=Factory::create("fr_FR");
        
        $fichierArtisteCsv=fopen(__DIR__."/artiste.csv","r");
        while (!feof($fichierArtisteCsv)) {
          $lesArtistes[]=fgetcsv($fichierArtisteCsv);
        }
        fclose($fichierArtisteCsv);

        foreach ($lesArtistes as $value) {
            $artiste=new Artiste();
            $artiste ->setId(intval($value[0]))
                     ->setNom($value[1])
                     ->setDescription($faker->paragraphs(5));
        }
        $manager->flush();
    }
}
