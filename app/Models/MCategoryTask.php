<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MCategoryTask
 * 
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Task[] $tasks
 *
 * @package App\Models
 */
class MCategoryTask extends Model
{
	use HasFactory;

	protected $table = 'm_category_task';

	protected $fillable = [
		'name'
	];

	public function tasks()
	{
		return $this->hasMany(Task::class);
	}
}
