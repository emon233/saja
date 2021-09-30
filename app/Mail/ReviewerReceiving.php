<?php

namespace App\Mail;

use App\User;
use App\Models\Forward;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewerReceiving extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Protected Variable
     *
     * @var Forward
     */
    protected $forward;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Forward $forward)
    {
        $this->forward = $forward;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $reviewer = User::find($this->forward->reviewer_id);
        $reviewer = User::generateFullNameFromUser($reviewer);

        return $this->markdown('mails.reviewers.receiving')
            ->subject('SAJA - REVIEW RECEIVED')
            ->with([
                'reviewer' => $reviewer,
                'title' => $this->forward->paper->title,
            ]);
    }
}
