<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    //
    public function creating(User $user)
    {
        if($user->email == 'admin@lara-blog.com')
        {
            $user->isAdmin = true;
        }
    }
}
