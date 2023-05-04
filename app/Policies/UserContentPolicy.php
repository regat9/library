<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserContentPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function viewLibrarianPart(User $user)
    {
        if (auth()->user()->role == User::ROLE_LIBRARIAN) {
            return Response::allow();
        }

        return Response::deny();
    }


}
