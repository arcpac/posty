<?php

namespace App\Mail;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PostLiked extends Mailable
{
    use Queueable, SerializesModels;

    //set to public property or variable
    public $liker;
    public $post;

    public function __construct(User $liker, Post $post)
    {
        //set to public property or variable
        $this->liker = $liker;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.post_liked')
            ->subject('Someone liked your post.');
    }
}
