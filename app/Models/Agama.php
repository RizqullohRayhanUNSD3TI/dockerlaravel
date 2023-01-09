<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $table = 'agama';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_agama'];

    /**
     * Get all of the detail_data for the Agama
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detail_data()
    {
        return $this->hasMany(detail_data::class);
    }
}
