<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    public function properties() {
        return $this->belongsToMany(Property::class, 'product_property')->withPivot('value');
    }


    public function scopeFilterByProperties($query, $filters)
    {
        foreach ($filters as $property => $values) {
            $query->whereHas('properties', function ($query) use ($property, $values) {
                $query->where('properties.name', $property)
                    ->whereIn(DB::raw('product_property.value'), $values);
            });
        }
        return $query;
    }

}
