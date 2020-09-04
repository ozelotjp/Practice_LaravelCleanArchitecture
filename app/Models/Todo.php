<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Eloquent\Todo
 *
 * @property string $id
 * @property string $text
 * @property string|null $done_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Todo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereDoneAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Todo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Todo extends Model
{
    protected $keyType = "string";
}
