<?php

namespace App\Models;

use Database\Factories\ConfigFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Config extends Model
{
    /** @use HasFactory<ConfigFactory> */
    use HasFactory;

    protected $table = 'configs';

    protected $fillable = ['key', 'value'];
}
