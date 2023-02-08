<?php

namespace App\Policies;

use App\Models\PageView;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PageViewPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, PageView $pageView): bool
    {
        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, PageView $pageView): bool
    {
        return false;
    }

    public function delete(User $user, PageView $pageView): bool
    {
        return false;
    }

    public function restore(User $user, PageView $pageView): bool
    {
        return false;
    }

    public function forceDelete(User $user, PageView $pageView): bool
    {
        return false;
    }
}
