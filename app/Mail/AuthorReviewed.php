<?php

namespace App\Mail;

use App\User;
use App\Models\Paper;
use App\Models\Forward;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AuthorReviewed extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Protected Variable
     *
     * @var [Paper] $paper
     */
    protected $paper;

    /**
     * Constructor for Author Reviewed Mail Class
     *
     * @return 
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
        $paper = Paper::find($this->paper->id);
        $forwards = Forward::where('paper_id', $paper->id)->get();
        $manuscripts = [];
        foreach ($forwards as $forward) {
            if ($forward->manuscript != "") {
                $manuscripts[] = $forward->manuscript;
            }
        }
        $author = User::generateFullNameFromUser($paper->user);

        return $this->markdown('mails.authors.reviewed')
            ->subject('SAJA - PAPER REVIEWED')
            ->with([
                'author' => $author,
                'title' => $this->paper->title,
                'manuscripts' => $manuscripts,
                'comments' => $paper->comments,
            ]);
    }

    /**
     * http://127.0.0.1:8000/download/2019_SAJA_1_Reviewed_Manuscript_3.docx
     */
}
