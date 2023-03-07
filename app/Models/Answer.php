<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    const TABLE = 'answers';

    protected $table = self::TABLE;

    public $timestamps = false;

    protected $fillable = [
        'question_id',
        'text',
        'is_correct',
        'priority'
    ];

    public function question() : BelongsTo
    {
        return $this->belongsTo(Question::class);
    }
}
