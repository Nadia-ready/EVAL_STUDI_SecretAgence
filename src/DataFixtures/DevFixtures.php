<?php

namespace App\DataFixtures;

use App\Entity\Agent;
use App\Entity\Nationalite;
use App\Entity\Specialite;
use App\Entity\StatutMission;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Faker;

class DevFixtures extends Fixture
{
    protected $env;
    protected $faker;

    public function __construct(ContainerInterface $container, EntityManagerInterface $em)
    {
        $this->env = $container->get('kernel')->getEnvironment();
        $this->em = $em;
        $this->faker = Faker\Factory::create('fr_FR');
    }


    public function load(ObjectManager $manager): void
    {
        if ($this->env === 'dev') {
            $this->generateAgents(10, $manager);
        }
    }

    protected function generateAgents($count,  &$manager, )
    {
        $allSpecialites = $this->em->getRepository(Specialite::class)->findAll();
        $allNationalites = $this->em->getRepository(Nationalite::class)->findAll();
        
        for ($i = 0; $i < $count; $i++) {

            $agent = new Agent();
            $agent->setNom($this->faker->lastName);
            $agent->setPrenom($this->faker->firstName);
            $agent->setNomCode($this->faker->word.$i);

            // Un agent en service a entre 18 et 65 ans
            $age = $this->faker->numberBetween(18, 65);
            // On genere une date aléatoire sur l'année courante et on soustrait l'age
            $dateNaissance = $this->faker->dateTimeThisYear->modify("- ${age} year");
            $agent->setDateNaissance($dateNaissance);

            // Determine combien de specialites aura l'agent
            $countSpecialites = $this->faker->numberBetween(1, 2);
            // on mélange aléatoirement
            shuffle($allSpecialites);
            // on ajoute les specialites à l'agent
            for ($j = 0; $j < $countSpecialites; $j++) {
                $specialite = $allSpecialites[$j];
                $agent->addSpecialite($specialite);
            }

            // on mélange aléatoirement
            shuffle($allNationalites);
            // on ajoute la premiere nationalite
            $agent->setNationalite($allNationalites[0]);

            $manager->persist($agent);
        }
        $manager->flush();
    }
}
