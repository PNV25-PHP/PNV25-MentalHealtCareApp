<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'Id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;
    
    protected $fillable = [
        'Id',
        'UserId',
        'Content',
        'Url_Image',
    ];

    public function userofpost()
    {
        return $this->belongsTo(User::class, 'UserId', 'Id');
    }
}