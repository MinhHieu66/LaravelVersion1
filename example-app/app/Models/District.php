<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table      = 'districts';
    protected $primaryKey = 'code';
    public $incrementing  = false;

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function ward(): HasMany
    {
        return $this->hasMany(Ward::class, 'district_code', 'code');
    }
}
