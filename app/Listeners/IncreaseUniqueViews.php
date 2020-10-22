<?php

namespace App\Listeners;

use App\Events\PostViewed;
use App\Models\PostsViews;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use function PHPUnit\Framework\isNull;

class IncreaseUniqueViews
{

    /**
     * Handle the event.
     *
     * @param PostViewed $event
     * @return void
     */
    public function handle(PostViewed $event)
    {
        $isViewed = PostsViews::where(['post_id' => $event->currentPost->id, 'user_id' => auth()->id()])->orWhere(['ip' => request()->getClientIp()])->first();
        if ($isViewed) {
            $isViewed->update([
                'post_id' => $event->currentPost->id,
                'user_id' => auth()->id(),
                'url' => request()->url(),
                'session_id' => request()->getSession()->getId(),
                'ip' => request()->getClientIp(),
                'agent' => request()->header('user-agent')
            ]);
        } else {
            PostsViews::create([
                'post_id' => $event->currentPost->id,
                'user_id' => auth()->id(),
                'url' => request()->url(),
                'session_id' => request()->getSession()->getId(),
                'ip' => request()->getClientIp(),
                'agent' => request()->header('user-agent')
            ]);
        }
    }
}
