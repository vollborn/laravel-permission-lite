<?php

namespace Vollborn\LaravelPermissionLite\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Vollborn\LaravelPermissionLite\Models\Permission;

trait BelongsToManyPermissions
{
    /**
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }
}
