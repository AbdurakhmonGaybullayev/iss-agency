<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    use HasFactory;

    public $table = 'headers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'about_us_uz',
        'about_us_ru',
        'about_us_en',
        'qanda_uz',
        'qanda_ru',
        'qanda_en',
        'cooperation_uz',
        'cooperation_ru',
        'cooperation_en',
        'universities_uz',
        'universities_ru',
        'universities_en',
        'gallery_uz',
        'gallery_ru',
        'gallery_en',
        'blog_uz',
        'blog_ru',
        'blog_en',
        'branch_uz',
        'branch_ru',
        'branch_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
