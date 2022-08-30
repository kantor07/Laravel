<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class News extends Model
{
    use HasFactory;

    public const DRAFT = 'DRAFT';
    public const ACTIVE = 'ACTIVE';
    public const BLOCKED = 'BLOCKED';

    protected $table = "news";

    private static $selectedFields = [
        'id',
        'category_id',
        'source_id',
        'title',
        'slug',
        'author',
        'status',
        'description',
        'created_at',
        'updated_at'
    ];

    public function getNews(): Collection
    {
        return DB::table($this->table)->get(self::$selectedFields);
    }
    
    public function getNewsById(int $id): ?object
    {
        return DB::table($this->table)->find($id, self::$selectedFields);
    } 

}
