<?php

namespace App\Validator;

use App\Controller\AgentController;
use App\Entity\Agent;
use App\Repository\AgentRepository;
use Container3ZRaNEx\getNationaliteControllerService;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class CibleAgentNationalityValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\CibleAgentNationality */

        if (null === $value || '' === $value) {
            return;
        }


        // TODO: implement the validation here
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value)
            ->addViolation();
    }
}
