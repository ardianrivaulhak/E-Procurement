<?php

namespace App\Models;

use App\Models\Vendor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id', 'name', 'description', 'price'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", [$search]);
        }
        return $query;
    }
}
