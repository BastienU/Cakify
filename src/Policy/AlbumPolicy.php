<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use App\Model\Entity\Album;

class AlbumPolicy
{
    public function canView(IdentityInterface $user, Album $album)
    {
        return true; // Everyone can view albums
    }

    public function canAdd(IdentityInterface $user, Album $album)
    {
        return $user->role_id === 1; // Only admins can add
    }

    public function canEdit(IdentityInterface $user, Album $album)
    {
        return $user->role_id === 1; // Only admins can edit
    }

    public function canDelete(IdentityInterface $user, Album $album)
    {
        return $user->role_id === 1; // Only admins can delete
    }
}
