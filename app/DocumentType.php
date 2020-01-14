<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentType extends Model
{
    /**
     * Relation between document types and customers
     * @return HasMany
     */
    public function customers(): HasMany {
        return $this->hasMany(Customer::class);
    }
}
