<?php

namespace Vollborn\LaravelPermissionLite\Traits\Relations;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait BelongsToManyUsers
{
    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
