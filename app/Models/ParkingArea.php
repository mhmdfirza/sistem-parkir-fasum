<?php
// app/Models/ParkingArea.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ParkingArea extends Model
{
    use SoftDeletes;
    protected $fillable = ['code', 'name', 'location', 'total_capacity', 'photo', 'is_active'];
    protected $casts = ['is_active' => 'boolean'];

    public function vehicleCapacities() {
        return $this->hasMany(AreaVehicleCapacity::class);
    }

    public function vehicleCapacitiesWithType() {
        return $this->hasMany(AreaVehicleCapacity::class)->with('vehicleType');
    }

    public function activeTransactions() {
        return $this->hasMany(ParkingTransaction::class)->where('status', 'IN');
    }

    // Hitung slot terpakai untuk tipe kendaraan tertentu
    public function occupiedSlots(?int $vehicleTypeId = null): int {
        $query = $this->activeTransactions();
        if ($vehicleTypeId) {
            $query->where('vehicle_type_id', $vehicleTypeId);
        }
        return $query->count();
    }

    // Hitung slot tersedia
    public function availableSlots(?int $vehicleTypeId = null): int {
        if ($vehicleTypeId) {
            $capacity = $this->vehicleCapacities()
                ->where('vehicle_type_id', $vehicleTypeId)
                ->first()?->capacity ?? 0;
        } else {
            $capacity = $this->total_capacity;
        }
        return max(0, $capacity - $this->occupiedSlots($vehicleTypeId));
    }
}