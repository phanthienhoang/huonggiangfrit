<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shareholder extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function shareholderTranslations()
    {
        return $this->hasMany(ShareholderTranslation::class);
    }

    public function getTranslation($locale = 'en')
    {
        return $this->shareholderTranslations()->where('locale', $locale)->first();
    }
}
