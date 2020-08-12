<?php

namespace App;

use App\Notifications\ReplyMarkedBestReply;

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

    public function scopeFilterByChannels($builder)
    {
        if(request()->query('channel')) {
           $channel=Channel::where('slug',request()->query('channel'))->first();
           if($channel){
               return $builder->where('channel_id',$channel->id);
           }

           return $builder;
        }
        return $builder; 
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id'=>$reply->id
        ]);

        if($reply->owner->id === $this->author->id)
        {
            return;
        }
        $reply->owner->notify(new ReplyMarkedBestReply($reply->discussion));
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }




}

