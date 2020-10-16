<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PostMedia
 *
 * @property int $id
 * @property int $post_id
 * @property string $file_name
 * @property string|null $file_type
 * @property string|null $file_size
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia query()
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia whereFileName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia whereFileSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia whereFileType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia wherePostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PostMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Post $post
 */
class PostMedia extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
