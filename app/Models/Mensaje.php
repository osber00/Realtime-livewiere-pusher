<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Mensaje extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getFechaAttribute(){
        return new Date($this->created_at);
    }
}
