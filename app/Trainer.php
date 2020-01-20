<?php

namespace LaraDex;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Trainer extends Model
{
    protected $fillable = ['name', 'avatar'];
    const UPDATED_AT = null;
    public $timestamps = false;

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = str_slug($value, '_');
        return $this;
    }
    public function pokemons() {
        return $this->HasMany('LaraDex\Pokemon');
    }
}
