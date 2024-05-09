<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Country extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country_code',
        'country_name',
    ];

    /** 
     * Get the booking that owns the country
     */
    public function bookings(): BelongsToMany
    {
        return $this->belongsToMany(Country::class);
    }
}
