<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use App\Model\Entity\Request;

class RequestPolicy
{
    public function canView(IdentityInterface $user, Request $request)
    {
        return true; // Everyone can view albums
    }

    public function canAdd(IdentityInterface $user, Request $request)
    {
        return true;
    }

    public function canEdit(IdentityInterface $user, Request $request)
    {
        return $user->role_id === 1; // Only admins can edit
    }

    public function canDelete(IdentityInterface $user, Request $request)
    {
        return $user->role_id === 1; // Only admins can delete
    }
}
