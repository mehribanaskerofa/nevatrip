<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    // Specify the table name if it differs from the pluralized model name
    protected $table = 'events';

    // Define the fillable attributes
    protected $fillable = [
        'name',
        'description',
        'schedule',
        'price_adult',
        'price_kid',
    ];

    // If you have timestamps in your table, you can let Eloquent manage them
    public $timestamps = true;

    // Optionally, you can define relationships if needed
    public function orders()
    {
        return $this->hasMany(Order::class); // Assuming you have an Order model
    }
}
