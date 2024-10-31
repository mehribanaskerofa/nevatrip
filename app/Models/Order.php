<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'event_id',
        'event_date',
        'ticket_adult_price',
        'ticket_adult_quantity',
        'ticket_kid_price',
        'ticket_kid_quantity',
        'barcode',
        'equal_price',
        'created',
    ];

    // Eğer zaman damgalarını kullanmak istemiyorsanız
    public $timestamps = false;
    public function setCreatedAttribute($value)
    {
        // Eğer $value belirtilmemişse, mevcut zaman kullanılır
        $this->attributes['created'] = $value ?: now();
    }

    // İlişki
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Barkod oluşturma metodu
    public static function generateUniqueBarcode()
    {
        do {
            $barcode = 'BC' . rand(1000000000, 9999999999); // 10 haneli rastgele sayı
        } while (self::where('barcode', $barcode)->exists()); // Mevcut barkod kontrolü
        return $barcode;
    }
}
