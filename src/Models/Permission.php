<?php

namespace Vollborn\LaravelPermissionLite\Models;

use Illuminate\Database\Eloquent\Model;
use Vollborn\LaravelPermissionLite\Traits\Relations\BelongsToManyRoles;
use Vollborn\LaravelPermissionLite\Traits\Relations\BelongsToManyUsers;

class Permission extends Model
{
    use BelongsToManyUsers;
    use BelongsToManyRoles;

    protected $fillable = [
        'id',
        'name'
    ];

}
