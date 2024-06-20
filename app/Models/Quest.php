<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
	use HasFactory;

	protected $fillable = [
		'title',
		'directions_text',
		'intro_text',
		'xp',
		'status',
		'category_id',
		'campaign_id',
		'repeatable',
		'accept_text',
		'bonus_xp_text',
		'complete_text',
		'min_level',
		'start_date',
		'expires_date',
		'user_id',

	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function campaign()
	{
		return $this->belongsTo(Campaign::class);
	}

	public function questLogs()
	{
		return $this->hasMany(QuestLog::class);
	}
	// Add any additional methods specific to quests here (e.g., marking a quest as completed)
}
