<?php 
namespace App\Models; 
use Illuminate\Database\Eloquent\Model; 
class Product extends Model 
{ 
    protected $primaryKey = 'id';
    protected $fillable = [ 
        'name',
        'qty',
        'brands_id',
        'categories_id',
        'harga',
        'photo',
    ]; 

    public function categories(){
        return $this->belongsTo(Categorie::class);
    }

    public function brands(){
        return $this->belongsTo(Brand::class);
    }
} 