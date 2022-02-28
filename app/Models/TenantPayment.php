<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TenantPayment extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $table = 'tenant_payments';


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tenant_id',
        'property_id',
        'business_id',
        'unit_id',
        'payment_reference',
        'amount_paid',
        'payment_method',
        'payment_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'tenant_id');
    }
}
