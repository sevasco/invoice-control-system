<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customer extends Model
{

    protected $fillable = [
        'identification','document_type_id','name','address','phone_number','cell_phone_number','email',
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

    /** Mutator */
    public function setEmailAttribute($value) {
        $this->attributes['email'] = strtolower($value);
    }

    /** Query Scopes */
    public function scopeCustomers($query, $id) {
        if(trim($id) != ""){
            return $query->where('id', $id);
        }
    }

    public function scopeDocumentType($query, $document_type_id) {
        if(trim($document_type_id) != ""){
            return $query->where('document_type_id', $document_type_id);
        }
    }

    public function scopeDocument($query, $identification) {
        if(trim($identification) != ""){
            return $query->where('identification', 'LIKE', "%$identification%");
        }
    }

    public function scopeEmail($query, $email) {
        if(trim($email) != ""){
            return $query->where('email', 'LIKE', "%$email%");
        }
    }

}
