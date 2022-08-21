<?php

namespace Vollborn\LaravelPermissionLite\Models;

use Illuminate\Database\Eloquent\Model;
use Vollborn\LaravelPermissionLite\Traits\Relations\BelongsToManyPermissions;
use Vollborn\LaravelPermissionLite\Traits\Relations\BelongsToManyUsers;

class Role extends Model
{
    use BelongsToManyUsers;
    use BelongsToManyPermissions;

    protected $fillable = [
        'id',
        'name',
    ];
}
