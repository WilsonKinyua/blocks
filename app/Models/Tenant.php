<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Tenant extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;
    use SoftDeletes;

    public $table = 'tenants';

    protected $appends = [
        'file',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'id_number',
        'phone',
        'property_id',
        'business_id',
        'unit_id',
        'rent',
        'deposit',
        'due_date',
        'rent_due',
        'penalty_due',
        'emergency_contact_name',
        'emergency_contact_phone',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getFileAttribute()
    {
        $files = $this->getMedia('file');
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
        return $this->belongsTo(Business::class, 'business_id');
    }

    public function apartment()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function house()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function payments()
    {
        return $this->hasMany(TenantPayment::class, 'tenant_id');
    }

    public function penalties()
    {
        return $this->hasMany(Penalty::class, 'tenant_id');
    }
}
