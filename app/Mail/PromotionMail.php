<?php

namespace App\Mail;

use App\Models\Promotion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Content;

class PromotionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $promotion;

    public function __construct(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }

    /**
     * Get the subject for the message.
     */
    public function build()
    {
        return $this
            ->subject("Promotion: " . $this->promotion->title)
            ->view('emails.promotion')
            ->with(['promotion' => $this->promotion]);
    }
}
