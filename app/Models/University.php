<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class University extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'universities';

    protected $appends = [
        'university_logo',
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'top',
        'short_description_uz',
        'short_description_ru',
        'short_description_en',
        'article_description_uz',
        'article_description_ru',
        'article_description_en',
        'country_id',
        'number',
        'image',
        'country_logo',
        'ielts',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function universityDocuments()
    {
        return $this->hasMany(Document::class, 'university_id', 'id');
    }

    public function getUniversityLogoAttribute()
    {
        $file = $this->getMedia('university_logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function directions()
    {
        return $this->belongsToMany(Direction::class);
    }

    public function certificates()
    {
        return $this->belongsToMany(Certificate::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
