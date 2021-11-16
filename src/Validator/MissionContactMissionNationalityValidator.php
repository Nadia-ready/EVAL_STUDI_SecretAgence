<?php

namespace App\Validator;

use App\Entity\Agent;
use App\Entity\Cible;
use App\Entity\Contact;
use App\Entity\Mission;
use App\Repository\CibleRepository;
use App\Repository\ContactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class MissionContactMissionNationalityValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\MissionPlanqueMissionNationality */

        if (null === $value || '' === $value) {
            return;
        }

        $missionNationaliteIds = function (Mission $mission) {
                 $mission->getNationalite()->getId();
        };


        // transform $this->contacts array in Nationalite id array
        $contactNationaliteIds = function (Contact $contact) {
             $contact->getNationalite()->getId();
        };


        if ($contactNationaliteIds === $missionNationaliteIds) {

            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value)
                ->addViolation();
        };
    }
}

