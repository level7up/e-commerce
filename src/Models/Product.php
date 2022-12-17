<?php
namespace Level7up\ECommerce\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Level7up\ECommerce\Models\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['name','slug','description','price', 'qty', 'category_id',  'special', 'image'];
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });
    }
    
     public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    
    //  ********** GETTERS ********* 
    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return "/storage/".$this->image;
        }

        return asset('dashboard/media/svg/files/blank-image.svg');
    }
}