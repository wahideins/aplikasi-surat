<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Category;

class Document extends Model
{
    use HasFactory;
    
    protected $table = 'document';
    
    protected $primaryKey = 'id_document';

    protected $fillable = [
        'no_surat',
        'cat_id',
        'judul_surat',
        'file_path',
        'created_at',
        'updated_at'
    ];

    public function category() 
    {
        return $this->belongsTo(Category::class,'cat_id','id_category');
    }

}
