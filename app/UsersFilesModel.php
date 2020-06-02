<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersFilesModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_files';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'short_name', 'original_file_name', 'file_name', 'number_of_downloads'
    ];
}
