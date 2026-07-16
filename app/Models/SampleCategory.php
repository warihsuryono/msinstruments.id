<?php

namespace App\Models;

use App\Traits\crudBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SampleCategory extends Model
{
    use HasFactory, SoftDeletes, crudBy;

    public function sample_type(): HasMany
    {
        return $this->hasMany(SampleType::class, 'sample_category_id');
    }

    public function parameter(): HasMany
    {
        return $this->hasMany(Parameter::class, 'sample_category_id');
    }
}
