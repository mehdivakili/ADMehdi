<?php

namespace ADMehdi\Policies;

use ADMehdi\Contracts\User;

class UserPolicy extends BasePolicy
{
    /**
     * Determine if the given model can be viewed by the user.
     *
     * @param \ADMehdi\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function read(User $user, $model)
    {
        // Does this record belong to the current user?
        $current = $user->id === $model->id;

        return $current || $this->checkPermission($user, $model, 'read');
    }

    /**
     * Determine if the given model can be edited by the user.
     *
     * @param \ADMehdi\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function edit(User $user, $model)
    {
        // Does this record belong to the current user?
        $current = $user->id === $model->id;

        return $current || $this->checkPermission($user, $model, 'edit');
    }

    /**
     * Determine if the given user can change a user a role.
     *
     * @param \ADMehdi\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function editRoles(User $user, $model)
    {
        // Does this record belong to another user?
        $another = $user->id != $model->id;

        return $another && $user->hasPermission('edit_users');
    }
}
