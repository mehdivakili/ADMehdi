<?php

namespace ADMehdi\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use ADMehdi\Contracts\User;
use ADMehdi\Facades\ADMehdi;

class BasePolicy
{
    use HandlesAuthorization;

    protected static $datatypes = [];

    /**
     * Handle all requested permission checks.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return bool
     */
    public function __call($name, $arguments)
    {
        if (count($arguments) < 2) {
            throw new \InvalidArgumentException('not enough arguments');
        }
        /** @var \ADMehdi\Contracts\User $user */
        $user = $arguments[0];

        /** @var $model */
        $model = $arguments[1];

        return $this->checkPermission($user, $model, $name);
    }

    /**
     * Determine if the given model can be restored by the user.
     *
     * @param \ADMehdi\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function restore(User $user, $model)
    {
        // Can this be restored?
        return $model->deleted_at && $this->checkPermission($user, $model, 'delete');
    }

    /**
     * Determine if the given model can be deleted by the user.
     *
     * @param \ADMehdi\Contracts\User $user
     * @param  $model
     *
     * @return bool
     */
    public function delete(User $user, $model)
    {
        // Has this already been deleted?
        $soft_delete = $model->deleted_at && in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses_recursive($model));

        return !$soft_delete && $this->checkPermission($user, $model, 'delete');
    }

    /**
     * Check if user has an associated permission.
     *
     * @param \ADMehdi\Contracts\User $user
     * @param object                      $model
     * @param string                      $action
     *
     * @return bool
     */
    protected function checkPermission(User $user, $model, $action)
    {
        $model_name = get_class($model);
        if (!isset(self::$datatypes[$model_name])) {
            $dataType = ADMehdi::model('DataType');
            self::$datatypes[$model_name] = $dataType->where('model_name', $model_name)->first();
        }

        if (!self::$datatypes[$model_name]) {
            throw new \Exception("Unable to find dataType with model: " . $model_name);
        }

        $dataType = self::$datatypes[$model_name];

        return $user->hasPermission($action.'_'.$dataType->name);
    }
}
