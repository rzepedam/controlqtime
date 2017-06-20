<?php

namespace Controlqtime\Mail;

use Controlqtime\Core\Entities\Visit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitDenied extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $visit;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Visit $visit)
    {
        $this->visit = $visit;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $url = env('APP_URL');

        return $this->subject('Confimación Horario Visita')
                    ->markdown('emails.visits.visit_denied', compact('visit', 'url'));
    }
}
