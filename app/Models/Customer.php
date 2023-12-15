<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','email', 'phone'];

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function deliveries(){
        return $this->hasMany(Delivery::class);
    }
    
    public static function list()
    {
        $users = Customer::orderByRaw('name')->get();
        $list = [];
        foreach ($customers as $customers) {
            $list[$customers->id] =$customers->name;
        }

        return $list;
    }
}
