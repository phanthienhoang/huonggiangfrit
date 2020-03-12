<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShareholderTranslation extends Model
{
    protected $guarded = [];

    public function shareholder()
    {
        return $this->belongsTo(Shareholder::class);
    }
}
