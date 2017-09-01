<?php

namespace Controlqtime\Mail;

use Controlqtime\Core\Entities\Visit;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VisitRegister extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Visit
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
        return $this->subject('Formulario Registro Visita')
                    ->attach(storage_path() . '/mail/attach/visits/DAS.pdf')
                    ->markdown('emails.visits.form_visit', compact('visit'));
    }
}
