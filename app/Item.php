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
    public function scopeItem($query, $id){
        if(trim($id) != ""){
            return $query->where('id', $id);
        }
    }
}
