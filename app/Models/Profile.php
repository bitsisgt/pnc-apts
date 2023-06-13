<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'married_name',
        'dpi',
        'birth_date',
        'age',
        'birth_place',
        'address',
        'nationality',
        'gender',
        'marital_status',
        'ethnicity',
        'father_name',
        'mother_name',
        'child_count',
        'child_names',
        'photo',
        'sispe_start_date',
        'sispe_unit',
        'sispe_place',
        'sispe_nominal_position',
        'sispe_functional_position',
        'sispe_rank',
        'sispe_status',
        'sispe_end_date',
        'mingob_start_date',
        'mingob_unit',
        'mingob_nominal_position',
        'mingob_functional_position',
        'mingob_budget_line',
        'mingob_end_date',
        'academy_start_date',
        'academy_end_date',
    ];

     /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
