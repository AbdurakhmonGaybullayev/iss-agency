<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use Notifiable;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'users';

    public const REGION_SELECT = [
        'Toshkent shahar-Город Ташкент-Tashkent city' => 'Tashkent city',
        'Toshkent viloyati-Ташкентская область-Tashkent region' => 'Tashkent region',
        'Andijon viloyati-Андижанская область-Andijan region' => 'Andijan region',
        'Buxoro viloyati-Бухарская область-Bukhara region' => 'Bukhara region',
        'Farg`ona viloyati-Ферганская область-Fergana region' => 'Fergana region',
        'Jizzax viloyati-Джизакская область-Jizzakh region' => 'Jizzakh region',
        'Xorazm viloyati-Харезмский район-Kharezm region' => 'Kharezm region',
        'Namangan vilotai-Наманганская область-Namangan region' => 'Namangan region',
        'Navoiy viloyati-Навоийская область-Navoi region' => 'Navoi region',
        'Qashqadaryo viloyati-Кашкадарьинская область-Qashqadaryo region' => 'Qashqadaryo region',
        'Samarqand viloyati-Самаркандская область-Samarkand region' => 'Samarkand region',
        'Sirdaryo viloyati-Сырдарьинская область-Sirdaryo region' => 'Sirdaryo region',
        'Surxandaryo viloyati-Сурхандарьинская область-Surxandaryo region' => 'Surxandaryo region',
        'Qoraqalpog`iston-Каракалпакстан-Karakalpakstan' => 'Karakalpakstan',

    ];

    public const USER = 0;

    protected $appends = [
        'photo',
    ];

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'region',
        'email_verified_at',
        'remember_token',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function userCooperations()
    {
        return $this->hasMany(Cooperation::class, 'user_id', 'id');
    }

    public function userDocuments()
    {
        return $this->hasMany(Document::class, 'user_id', 'id');
    }

    public function userApplications()
    {
        return $this->hasMany(Application::class, 'user_id', 'id');
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getPhotoAttribute()
    {
        $file = $this->getMedia('photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
