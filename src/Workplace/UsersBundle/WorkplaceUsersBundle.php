<?php

namespace Workplace\UsersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class WorkplaceUsersBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
