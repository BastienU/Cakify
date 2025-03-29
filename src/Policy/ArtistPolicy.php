<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use App\Model\Entity\Artist;

class ArtistPolicy
{
    public function canView(IdentityInterface $user, Artist $artist)
    {
        return true; // Everyone can view albums
    }

    public function canAdd(IdentityInterface $user, Artist $artist)
    {
        return $user->role_id === 1; // Only admins can add
    }

    public function canEdit(IdentityInterface $user, Artist $artist)
    {
        return $user->role_id === 1; // Only admins can edit
    }

    public function canDelete(IdentityInterface $user, Artist $artist)
    {
        return $user->role_id === 1; // Only admins can delete
    }
}
