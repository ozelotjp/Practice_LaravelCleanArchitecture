<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TodoModel
 *
 * @property int $id
 * @property string $text
 * @property string|null $done_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereDoneAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TodoModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TodoModel extends Model
{
    use HasFactory;

    protected $table = "todos";
}
