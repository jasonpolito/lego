<?php

namespace App\Mail;

use App\Http\Controllers\PageController;
use App\Models\Form;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FormSubmission extends Mailable
{
    use Queueable, SerializesModels;

    protected $form;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Form $form, $data)
    {
        $this->form = $form;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = PageController::parseMustaches($this->form->subject, $this->data);
        $subject = \Str::replace('&nbsp;', ' ', $subject);
        $content = PageController::parseMustaches($this->form->email_content, $this->data);

        return $this->view('mail.form.submission')
            ->subject($subject)
            ->with([
                'form' => $this->form,
                'subject' => $subject,
                'content' => $content,
                'data' => $this->data,
            ]);
    }
}
