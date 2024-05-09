<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Booking extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'country_id',
        'board_type_id',
        'name',
        'email',
        'whatsapp',
        'surfing_experience',
        'visit_date',
        'id_card',
    ];

    /** 
     * Get the country for the booking.
     */
    public function getIdCardAttribute()
    {
        return asset('storage/id_cards/' . $this->attributes['id_card']);
    }

    /** 
     * Get the country for the booking.
     */
    public function country(): HasOne
    {
        return $this->hasOne(Country::class, "id", "country_id");
    }

    /** 
     * Get the board type for the booking.
     */
    public function boardType(): HasOne
    {
        return $this->hasOne(BoardType::class, "id", "board_type_id");
    }
}
