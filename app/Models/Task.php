<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Task
 * 
 * @property int $id
 * @property string $title
 * @property Carbon $due_date
 * @property string $description
 * @property int $m_category_task_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 * @property MCategoryTask $m_category_task
 *
 * @package App\Models
 */
class Task extends Model
{
	use HasFactory;

	protected $table = 'task';

	protected $casts = [
		'due_date' => 'datetime',
		'm_category_task_id' => 'int',
		'created_by' => 'int',
		'updated_by' => 'int'
	];

	protected $fillable = [
		'title',
		'due_date',
		'description',
		'm_category_task_id',
		'created_by',
		'updated_by'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'updated_by');
	}

	public function m_category_task()
	{
		return $this->belongsTo(MCategoryTask::class);
	}
}
