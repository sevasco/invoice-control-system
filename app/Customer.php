<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{

    protected $fillable = [
        'document','document_type_id','name','address','phone_number','cell_phone_number','city_id','email',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Relation between customers and document types
     * @return BelongsTo|\Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function document_type()
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /** Query Scopes */
    public function scopeSearchFor($query, $type, $search)
    {
        if (($type) && ($search)) {
            return $query->where($type, 'like', "%$search%");
        }
    }
    

}
