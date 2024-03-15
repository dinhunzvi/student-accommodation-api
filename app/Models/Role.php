<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    use HasFactory;

    const ROLE_ADMINISTRATOR = 1;
    const ROLE_PROPERTY_OWNER = 2;
    const ROLE_STUDENT = 3;
    protected $guarded = [];

    /**
     * permissions role belongs to
     * @return BelongsToMany
     */
    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);

    }

}
