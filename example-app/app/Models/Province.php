<?php
namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $table      = 'provinces';
    protected $primaryKey = 'code';
    public $incrementing  = false;

    public function district(): HasMany
    {
        return $this->hasMany(District::class, 'province_code', 'code');
    }
}
