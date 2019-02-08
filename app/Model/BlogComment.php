<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BlogComment extends Model
{
    protected $fillable = [
        'blog_id',
        'user_id',
        'name',
        'email',
        'subject',
        'comment'
    ];
    public function blog(){
        return $this->belongsTo(Blog::class, 'blog_id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }
}
