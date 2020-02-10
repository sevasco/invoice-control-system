<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Invoice extends Model
{
    protected $guarded = [];

    /**
     * Relation between invoices and customers
     * @return BelongsTo
     */
    public function customer(): BelongsTo {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relation between invoices and sellers
     * @return BelongsTo
     */
    public function seller(): BelongsTo {
        return $this->belongsTo(Seller::class);
    }

    /**
     * Relation between invoices and items
     * @return BelongsToMany
     */
    public function item(): BelongsToMany {
        return $this->belongsToMany(Item::class)->withTimestamps()->withPivot('quantity', 'unit_price')->orderBy('id');
    }

    /**
     * Relation between invoices and states
     * @return BelongsTo
     */
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class);
    }

    /** DERIVED ATTRIBUTES */



    /** Query Scopes */
    public function scopeSearchFor($query, $type, $search)
    {
        if (($type) && ($search)) {
            return $query->where($type, 'like', "%$search%");
        }
    }
}
