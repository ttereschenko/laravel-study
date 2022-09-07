<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\NewReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contacts');
    }

    public function store(ContactRequest $request)
    {
        $mail = new NewReport(
          $request->get('name'),
          $request->get('email'),
          $request->get('phone'),
        );

        Mail::to('info@dev.com')->send($mail);

        session()->flash('success', __('messages.report.success'));

        return redirect()->back();
    }
}
