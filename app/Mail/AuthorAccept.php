<?php

namespace App\Mail;

use App\User;
use App\Models\Paper;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorAccept extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Protected Variable
     *
     * @var Paper
     */
    protected $paper;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Paper $paper)
    {
        $this->paper = $paper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $author = User::generateFullNameFromUser($this->paper->user);

        return $this->markdown('mails.authors.accept')
            ->subject('SAJA - PAPER ACCEPTED')
            ->with([
                'author' => $author,
                'title' => $this->paper->title,
            ]);
    }
}
