<?php

namespace App\Models;

use Mindscms\Entrust\EntrustPermission;

/**
 * App\Models\Permission
 *
 * @property int $id
 * @property string $name
 * @property string|null $display_name
 * @property string|null $description
 * @property string|null $route
 * @property string|null $module
 * @property string|null $as
 * @property string|null $icon
 * @property int $parent
 * @property int $parent_show
 * @property int $parent_original
 * @property int $sidebar_link
 * @property int $appear
 * @property int $ordering
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission query()
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereAppear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereAs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereOrdering($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereParent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereParentOriginal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereParentShow($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereSidebarLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Permission whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Permission extends EntrustPermission
{
    protected $guarded = [];
}
