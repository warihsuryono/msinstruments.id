<?php

namespace App\Models;

use App\Traits\crudBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes, crudBy;

    public function product_parameter(): HasMany
    {
        return $this->hasMany(ProductParameter::class, 'product_id');
    }

    public function product_specification(): HasMany
    {
        return $this->hasMany(ProductSpecification::class, 'product_id');
    }

    public function product_price(): HasMany
    {
        return $this->hasMany(ProductPrice::class, 'product_id');
    }

    public function product_image(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function controller_type(): BelongsTo
    {
        return $this->belongsTo(ControllerType::class, 'controller_type_id');
    }

    public function motor_type(): BelongsTo
    {
        return $this->belongsTo(MotorType::class, 'motor_type_id');
    }
}
