<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detail_data extends Model
{
    use HasFactory;
    protected $table = 'detail_data';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'id_agama', 'foto_ktp', 'umur'];

    /**
     * Get the user associated with the detail_data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the agama associated with the detail_data
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama');
    }
}
