<?php

namespace App\Mail;

use App\User;
use App\Models\Forward;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReviewerSending extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Protected Variables
     *
     * @var Forward $forward
     */
    protected $forward;

    /**
     * Constructor for ReviewerSending Class
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

        return $this->markdown('mails.reviewers.sending')
            ->with([
                'reviewer' => $reviewer,
                'title' => $this->forward->paper->title,
                'ID' => $this->forward->paper->manuscript,
            ]);
    }
}
