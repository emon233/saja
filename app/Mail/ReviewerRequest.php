<?php

namespace App\Mail;

use App\User;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewerRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Protected Variable
     *
     * @var User
     */
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reviewer = User::generateFullNameFromUser($this->user);

        return $this->markdown('mails.reviewers.requested')
            ->subject('SAJA - REVIEWER REQUEST RECEIVED')
            ->with([
                'reviewer' => $reviewer,
            ]);
    }
}
