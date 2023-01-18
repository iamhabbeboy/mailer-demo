<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subscriber extends Model
{
    use HasFactory;

    public function fields(): BelongsToMany
    {
        return $this->belongsToMany(Field::class, 'field_values', 'subscriber_id', 'field_id')
            ->withPivot('value');
    }

}
