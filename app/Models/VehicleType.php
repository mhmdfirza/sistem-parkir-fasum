<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VehicleType extends Model
{
    use SoftDeletes;

    protected $fillable = ['code', 'name', 'description', 'slot_size', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    // public function transactions()
    // {
    //     return $this->hasMany(ParkingTransaction::class);
    // }
    public function vehicles() 
    {
        return $this->hasMany(Vehicle::class);
    }
    public function parkingRates() 
    { 
    return $this->hasMany(ParkingRate::class);
    }
    public function areaCapacities() 
    {
    return $this->hasMany(AreaVehicleCapacity::class);
    }
    public function parkingTransactions() 
    {
    return $this->hasMany(ParkingTransaction::class); 
    }

}
