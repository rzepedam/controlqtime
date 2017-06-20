<?php

namespace Controlqtime\Mail;

use Controlqtime\Core\Entities\Visit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitCompleteForm extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var User
     */
    public $visit;

    /**
     * Create a new message instance.
     *
     * @param Visit $visit
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

        return $this->subject('Formulario Registro Visita Completo')
                    ->markdown('emails.visits.form_visit_complete', compact('visit', 'url'));
    }
}
