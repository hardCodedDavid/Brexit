<?php

namespace App;

use App\PropertyImage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
	use HasSlug;
    
    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function property_images()
    {
        return $this->hasMany(PropertyImage::class);
    }
    
    protected $fillable = [
        'slug', 
        'name', 
        'location', 
        'price', 
        'type',
        'leverage',
        'rental',
        'shares',
        'investors',
        'funding',
        'invested',
        'body',
        'featured',
    ];
}
