<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantImage extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'product_variant_images';

    // Define the primary key if it's not the default 'id'
    protected $primaryKey = 'id';  // This is default, so this line is optional

    // Define the fillable attributes
    protected $fillable = [
        'product_id',
        'color',
        'size',
        'stock',
        'price',
        'image_url',
    ];

    // Optionally, you can define the relationships if needed
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

   
    // Optionally, you can add timestamps if your table doesn't have them
    public $timestamps = true;
}
