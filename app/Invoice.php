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
     * Relation between invoices and clients
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
    public function getSubtotalAttribute() {
        $subtotal = 0;
        foreach($this->items as $item){
            $subtotal += $item->pivot->unit_price * $item->pivot->quantity;
        }
        return $subtotal;
    }

    public function getIvaAmountAttribute() {
        return $this->getSubtotalAttribute() * $this->vat / 100;
    }

    public function getTotalAttribute() {
        return $this->getSubtotalAttribute() + $this->getIvaAmountAttribute();
    }

    public function getDateAttribute($date) {
        if (! empty($date)) {
            return date_format(date_create($date), 'Y-m-d\TH:i:s');
        }else{
            return "";
        }
    }

    /** Query Scopes */
    public function scopeNumber($query, $number) {
        if(trim($number) != "") {
            return $query->where('number', 'LIKE', "%$number%");
        }
    }

    public function scopeStatus($query, $status_id) {
        if(trim($status_id) != "") {
            return $query->where('status_id', $status_id);
        }
    }

    public function scopeCustomer($query, $customer_id) {
        if(trim($customer_id) != "") {
            return $query->where('customer_id', $customer_id);
        }
    }

    public function scopeSeller($query, $seller_id) {
        if(trim($seller_id) != "") {
            return $query->where('seller_id', $seller_id);
        }
    }
    public function scopeItem($query, $item_id) {
        if(trim($item_id) != "") {
            return $query->whereHas('items', function (Builder $query) use ($item_id) {
                $query->where('item_id', $item_id);
            });
        }
    }

    public function scopeIssuedDate($query, $issued_init, $issued_final) {
        if(trim($issued_init) != "" && trim($issued_final) != "") {
            return $query->whereBetween('issued_at', [$issued_init, $issued_final]);
        }
    }

    public function scopeExpiredDate($query, $expired_init, $expired_final) {
        if(trim($expired_init) != "" && trim($expired_final) != "") {
            return $query->whereBetween('expired_at', [$expired_init, $expired_final]);
        }
    }

    public function save(array $options = []) {
        if(parent::save($options)) {
            $this->number = str_pad($this->id, 5, "0", STR_PAD_LEFT);
            parent::save();
        }
    }
}
