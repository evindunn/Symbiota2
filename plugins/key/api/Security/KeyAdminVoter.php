<?php

namespace Key\Security;

use Core\Entity\Users;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class KeyAdminVoter extends Voter
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    protected function supports($attribute, $subject)
    {
        return ($attribute === 'KeyAdmin');
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $vote = false;

        if(!$token->getUser() instanceof Users) {
            return false;
        }

        $authenticatedUserId = $token->getUser()->getId();
        $q = $this->em->createQuery('SELECT ur FROM Core\Entity\UserRoles ur WHERE ur.userId = '.$authenticatedUserId);
        $resultArr = $q->iterate();
        foreach ($resultArr as $row) {
            $role = $row[0]->getRole();
            if($role === 'SuperAdmin') {
                $token->getUser()->addCurrentPermissions('SuperAdmin');
                $vote = true;
            }
            if($role === 'KeyAdmin') {
                $token->getUser()->addCurrentPermissions('KeyAdmin');
                $vote = true;
            }
        }

        return $vote;
    }

}
