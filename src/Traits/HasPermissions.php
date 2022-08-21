<?php

namespace Vollborn\LaravelPermissionLite\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Vollborn\LaravelPermissionLite\Traits\Relations\BelongsToManyPermissions;
use Vollborn\LaravelPermissionLite\Traits\Relations\BelongsToManyRoles;

/**
 * supposed to be used in your App\Models\User
 */
trait HasPermissions
{
    use BelongsToManyRoles;
    use BelongsToManyPermissions;

    /**
     * @param string|null $permission
     * @param int|null $userId
     * @return bool
     */
    public static function authorize(?string $permission = null, ?int $userId = null): bool
    {
        $id = $userId ?? Auth::id();

        if (!$id) {
            return false;
        }

        if (!$permission) {
            return true;
        }

        return User::query()
            ->where('id', $id)
            ->whereHas('permissions', static function ($query) use ($permission) {
                $query->where('name', $permission);
            })
            ->orWhereHas('roles', static function ($query) use ($permission) {
                $query->whereHas('permissions', static function ($query) use ($permission) {
                    $query->where('name', $permission);
                });
            })
            ->exists();
    }
}
