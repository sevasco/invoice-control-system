<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    protected $guarded = [];

    /**
     * Relation between items and invoices
     * @return BelongsToMany
     */
    public function invoices(): BelongsToMany {
        return $this->belongsToMany(Invoice::class);
    }

    /** Query Scopes */
    public function scopeSearchFor($query, $type, $search)
    {
        if (($type) && ($search)) {
            return $query->where($type, 'like', "%$search%");
        }
    }
}
