<?php

namespace App\Mail;

use App\User;
use App\Models\Paper;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorNew extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Protected Variable
     *
     * @var [Paper] $paper
     */
    protected $paper;

    /**
     * Constructor for AuthorNew
     *
     * @param Paper $paper
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

        return $this->markdown('mails.authors.new')
            ->with([
                'author' => $author,
                'title' => $this->paper->title,
                'ID' => $this->paper->manuscript,
            ]);
    }
}
