<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUser extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('pages.emailSendSuccessfully');
    }
    public function send(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $emailFrom = $request->input('emailFrom');
        $emailTo = $request->input('emailTo');
        Mail::send('pages.property', ['title' => $title, 'content' => $content], function ($message)
        {

            $message->from($emailFrom, 'Christian Nwamba');

            $message->to($emailTo);

        });

        return response()->json(['message' => 'Request completed']);
    }
}
