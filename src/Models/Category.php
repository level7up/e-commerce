<?php
namespace Level7up\ECommerce\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Level7up\Dashboard\Models\Behaviors\Editable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Level7up\Dashboard\Models\Behaviors\Destroyable;

class Category extends Model
{
    use SoftDeletes, Editable, Destroyable;
    protected $base_route = 'dashboard.category';

    protected $fillable = ['name', 'special', 'image'];
  
    
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    
    public function getImageUrlAttribute($original)
    {
        if ($original) {
            return "/storage/".$original;
        }

        return asset('dashboard/media/svg/files/blank-image.svg');
    }
}