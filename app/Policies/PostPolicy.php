<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new some bitches instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
