<?php

namespace Vollborn\LaravelPermissionLite\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Vollborn\LaravelPermissionLite\Models\Role;

trait BelongsToManyRoles
{
    /**
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }
}
