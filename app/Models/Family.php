<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    use HasFactory;
    protected $fillable=['full_name','phone','identecal_num','area_id'];

    public function area()
    {
return $this->belongsTo(Area::class);

    }
}
