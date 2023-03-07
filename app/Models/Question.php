<?php

namespace App\Models;

use App\Http\Traits\CreateUpdateTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Question extends Model
{
    use HasFactory;

    const TABLE = 'questions';

    protected $table = self::TABLE;

    public $timestamps = false;

    protected $fillable = [
        'text'
    ];

    public function answers() : HasMany
    {
        return $this->hasMany(Answer::class)->orderBy('priority');
    }
}
