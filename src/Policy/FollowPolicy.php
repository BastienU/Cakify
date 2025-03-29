<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use App\Model\Entity\Follow;

class FollowPolicy
{
    public function canView(IdentityInterface $user, Follow $follow)
    {
        return true;
    }

    public function canAdd(IdentityInterface $user, Follow $follow)
    {
        return true;
    }

    public function canEdit(IdentityInterface $user, Follow $follow)
    {
        return true;
    }

    public function canDelete(IdentityInterface $user, Follow $follow)
    {
        return true;
    }
}
