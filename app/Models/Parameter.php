<?php

namespace App\Models;

use App\Traits\crudBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Parameter extends Model
{
    use HasFactory, SoftDeletes, crudBy;

    public function product_parameter(): HasMany
    {
        return $this->hasMany(ProductParameter::class, 'product_id');
    }

    public function sample_category(): BelongsTo
    {
        return $this->belongsTo(SampleCategory::class, 'sample_category_id');
    }
}
