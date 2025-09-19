<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Document;

class Category extends Model
{

    use HasFactory;
    
    protected $table = 'category';
    
    protected $primaryKey = 'id_category';

    protected $fillable = [
        'nama_kategori',
        'judul_kategori',
        'created_at',
        'updated_at',
    ];

    public function surat()
    {
        return $this->hasMany(Document::class, 'cat_id', 'id_category');
    }

}
