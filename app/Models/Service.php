<?php

namespace App\Models;

use App\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceFactory> */
    use HasFactory, HasUuid;

    protected $table = "services";
    protected $guarded = ["id"];

    /**
     * relasi ke odel
     */
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
