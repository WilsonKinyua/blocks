<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Property extends Model
{
    use InteractsWithMedia;
    use HasFactory;
    use SoftDeletes;

    public $table = 'properties';

    protected $appends = [
        'pictures',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'location',
        'no_of_units',
        'management_since',
        'landlord_name',
        'landlord_phone',
        'manager_name',
        'manager_phone',
        'caretaker_name',
        'due_date',
        'caretaker_phone',
        'business_id',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPicturesAttribute()
    {
        $files = $this->getMedia('pictures');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function units()
    {
        return $this->belongsToMany(Unit::class,'property_id');
    }

}
