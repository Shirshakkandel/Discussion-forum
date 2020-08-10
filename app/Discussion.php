<?php

namespace App;


class Discussion extends Model
{
    
    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id'=>$reply->id
        ]);
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }




}

