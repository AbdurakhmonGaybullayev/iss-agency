<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    public $table = 'directions';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function directionDocuments()
    {
        return $this->hasMany(Document::class, 'direction_id', 'id');
    }

    public function directionUniversities()
    {
        return $this->belongsToMany(University::class);
    }

    public function programms()
    {
        return $this->belongsToMany(Programm::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
