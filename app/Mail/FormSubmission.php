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

    public function parsedData()
    {
        $content = $this->form->email_content;
        $content = PageController::parseVariables($content);
        $pattern = "/{{\s*(.*?)\s*}}/i";
        if (preg_match_all($pattern, $content, $matches)) {
            foreach ($matches[0] as $match) {
                $search = $match;
                $key = \Str::replace('{{', '', $search);
                $key = trim(\Str::replace('}}', '', $key));
                $value = $this->data[$key] ?? false;
                if ($value) {
                    $content = \Str::replace($search, $value, $content);
                }
            }
        }
        return $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.form.submission')
            ->subject($this->form->subject)
            ->with([
                'form' => $this->form,
                'content' => $this->parsedData(),
                'data' => $this->data,
            ]);
    }
}
