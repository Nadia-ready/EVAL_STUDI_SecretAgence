<?php

namespace App\DataFixtures;

use App\Entity\Nationalite;
use App\Entity\Specialite;
use App\Entity\StatutMission;
use App\Entity\TypeMission;
use App\Entity\TypePlanque;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $this->generateTypePlanques(['Bunker', 'Appartement', 'Maison', 'Hangar'], $manager);
        $this->generateTypeMissions(['Surveillance', 'Assassinat', 'Infiltration'], $manager);
        $this->generateStatutMissions(['En preparation', 'En cours', 'Terminée', 'Echec'], $manager);
        $this->generateSpecialites(['Cyberespionnage', 'Enlevement', 'Sabotage', 'Manipulation', 'Infiltration'], $manager);
        $this->generateNationalites([
            ['pays' => 'France', 'nationalite' => 'Français', 'code' => 'fr'],
            ['pays' => 'Angleterre', 'nationalite' => 'Anglais', 'code' => 'en'],
            ['pays' => 'Allemagne', 'nationalite' => 'Allemand', 'code' => 'de'],
            ['pays' => 'Pays-Bas', 'nationalite' => 'Néerlandais', 'code' => 'nl'],
            ['pays' => 'Espagne', 'nationalite' => 'Espagnol', 'code' => 'es'],
            ['pays' => 'Portugal', 'nationalite' => 'Portugais', 'code' => 'pt'],
            ['pays' => 'Italie', 'nationalite' => 'Italien', 'code' => 'it'],
            ['pays' => 'Grèce', 'nationalite' => 'Grecque', 'code' => 'gr'],
            ['pays' => 'Suisse', 'nationalite' => 'Suisse', 'code' => 'su'],
            ['pays' => 'Autriche', 'nationalite' => 'Autrichien', 'code' => 'at'],
            ['pays' => 'Belgique', 'nationalite' => 'Belge', 'code' => 'be'],
            ['pays' => 'Pologne', 'nationalite' => 'Polonais', 'code' => 'pl'],
            ['pays' => 'Etats-Unis', 'nationalite' => 'Américain', 'code' => 'us'],
            ['pays' => 'Canada', 'nationalite' => 'Canadien', 'code' => 'ca'],
            ['pays' => 'Australie', 'nationalite' => 'Australien', 'code' => 'au'],
            ['pays' => 'Nouvelle-Zélande', 'nationalite' => 'Néo-zélandais', 'code' => 'nz'],
            ['pays' => 'Irlande', 'nationalite' => 'Irlandais', 'code' => 'ir'],
            ['pays' => 'Finlande', 'nationalite' => 'Finlandais', 'code' => 'fi'],
            ['pays' => 'Suède', 'nationalite' => 'Suedois', 'code' => 'se'],
            ['pays' => 'Norvège', 'nationalite' => 'Norvegien', 'code' => 'no'],
            ['pays' => 'Danemark', 'nationalite' => 'Danois', 'code' => 'da'],
            ['pays' => 'Islande', 'nationalite' => 'Islandais', 'code' => 'is'],
            ['pays' => 'Japon', 'nationalite' => 'Japonais', 'code' => 'jp'],
            ['pays' => 'Chine', 'nationalite' => 'Chinois', 'code' => 'ch'],
            ['pays' => 'Inde', 'nationalite' => 'Indien', 'code' => 'in'],
            ['pays' => 'Egypte', 'nationalite' => 'Egyptien', 'code' => 'eg'],
            ['pays' => 'Turquie', 'nationalite' => 'Turc', 'code' => 'tr'],
            ['pays' => 'Russie', 'nationalite' => 'Russe', 'code' => 'ru'],
        ], $manager);
    }

    protected function generateTypePlanques(array $types, ObjectManager $manager)
    {
        $type_planques = new ArrayCollection($types);
        $type_planques->forAll(function ($index, $nom) use ($manager) {
            $type_planque = new TypePlanque();
            $type_planque->setNom($nom);
            $manager->persist($type_planque);
        });
        $manager->flush();
    }

    protected function generateTypeMissions(array $types, ObjectManager $manager)
    {
        foreach ($types as $type) {
            $type_mission = new TypeMission();
            $type_mission->setNom($type);
            $manager->persist($type_mission);
        }
        $manager->flush();
    }

    protected function generateStatutMissions(array $statuts, ObjectManager $manager)
    {
        foreach ($statuts as $statut) {
            $statut_mission = new TypeMission();
            $statut_mission->setNom($statut);
            $manager->persist($statut_mission);
        }
        $manager->flush();
    }

    protected function generateSpecialites(array $specialites, ObjectManager $manager)
    {
        foreach ($specialites as $spec) {
            $specialite = new Specialite();
            $specialite->setNom($spec);
            $manager->persist($specialite);
        }
        $manager->flush();
    }

    protected function generateNationalites(array $nationalites, ObjectManager $manager)
    {
        foreach ($nationalites as $nat) {
            $nationalite = new Nationalite();
            $nationalite->setPays($nat['pays']);
            $nationalite->setNationalite($nat['nationalite']);
            $nationalite->setCode($nat['code']);
            $manager->persist($nationalite);
        }
        $manager->flush();
    }
}
