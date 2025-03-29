<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use App\Model\Entity\Track;

class TrackPolicy
{
    public function canView(IdentityInterface $user, Track $track)
    {
        return true; // Everyone can view albums
    }

    public function canAdd(IdentityInterface $user, Track $track)
    {
        return $user->role_id === 1; // Only admins can add
    }

    public function canEdit(IdentityInterface $user, Track $track)
    {
        return $user->role_id === 1; // Only admins can edit
    }

    public function canDelete(IdentityInterface $user, Track $track)
    {
        return $user->role_id === 1; // Only admins can delete
    }
}
