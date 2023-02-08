<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Website;
use Illuminate\Auth\Access\HandlesAuthorization;

class WebsitePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Website $website): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, Website $website): bool
    {
        return false;
    }

    public function delete(User $user, Website $website): bool
    {
        return false;
    }

    public function restore(User $user, Website $website): bool
    {
        return false;
    }

    public function forceDelete(User $user, Website $website): bool
    {
        return false;
    }
}
