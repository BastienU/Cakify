<?php
declare(strict_types=1);

namespace App\Policy;

use Authorization\IdentityInterface;
use App\Model\Entity\Favorite;

class FavoritePolicy
{
    public function canView(IdentityInterface $user, Favorite $favorite)
    {
        return true;
    }

    public function canAdd(IdentityInterface $user, Favorite $favorite)
    {
        return true;
    }

    public function canEdit(IdentityInterface $user, Favorite $favorite)
    {
        return true;
    }

    public function canDelete(IdentityInterface $user, Favorite $favorite)
    {
        return true;
    }
}
