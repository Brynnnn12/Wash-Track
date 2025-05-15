<?php

namespace App\Models;

use App\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, HasUuid;

    protected $table = "customers";

    protected $guarded = ["id"];

    /**
     * Relasi ke model 
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
    /**
     * relasi kemodel user
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
