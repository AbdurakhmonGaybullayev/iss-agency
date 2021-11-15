<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AboutUs extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'aboutuses';

    protected $appends = [
        'image',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_uz',
        'title_ru',
        'title_en',
        'short_description_uz',
        'short_description_ru',
        'short_description_en',
        'advantages_uz',
        'advantages_ru',
        'advantages_en',
        'success_students',
        'statistics_short_description_uz',
        'statistics_short_description_ru',
        'statistics_short_description_en',
        'article_uz',
        'article_ru',
        'article_en',
        'footer_text_uz',
        'footer_text_ru',
        'footer_text_en',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
