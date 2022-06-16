<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    // Blogクラスとblogsテーブルの紐付けを定義
    protected $table = 'blogs';

    // 扱うカラムの、可変か不変かを設定。
    // $fillable = 変更可能。
    // $guarded = 変更不可。
    protected $fillable = 
    [
        'title',
        'content'
    ];
}
