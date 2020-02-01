<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seller extends Model
{
    protected $guarded = [];

    /**
     * Relation between sellers and invoices
     * @return HasMany
     */
    public function invoices(): HasMany {
        return $this->hasMany(Invoice::class);
    }

    /**
     * Relation between sellers and document types
     * @return BelongsTo
     */
    public function document_type(): BelongsTo {
        return $this->belongsTo(DocumentType::class);
    }

    /**
     * Relation between sellers and cities
     * @return BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }


    /** Query Scopes */
    public function scopeSeller($query, $id){
        if(trim($id) != ""){
            return $query->where('id', $id);
        }
    }

    public function scopeDocumentType($query, $document_type_id){
        if(trim($document_type_id) != ""){
            return $query->where('document_type_id', $document_type_id);
        }
    }

    public function scopeDocument($query, $document){
        if(trim($document) != ""){
            return $query->where('document', 'LIKE', "%$document%");
        }
    }

    public function scopeEmail($query, $email){
        if(trim($email) != ""){
            return $query->where('email', 'LIKE', "%$email%");
        }
    }

    public function scopeSearchFor($query, $type, $search)
    {
        if (($type) && ($search)) {
            return $query->where($type, 'like', "%$search%");
        }
    }
}
