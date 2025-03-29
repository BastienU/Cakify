<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class IdentityHelper extends Helper
{
    public function get()
    {
        return $this->_View->getRequest()->getAttribute('identity');
    }
}
