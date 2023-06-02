<?php

namespace App\Models\Backend;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $fillable = ['user_id','department','license_no','image'];
    public function users()
    {
        return $this->belongsTo(Doctor::class,'user_id','id');

    }
}
