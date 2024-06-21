<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\TicketRequest;

class TicketController extends Controller
{
    public function ticketsView()
    {
        return view('tickets', ["tickets" => Ticket::all()]);
    }

    public function showTicketForm()
    {
        return view('ticket_form');
    }

    public function createTicket(TicketRequest $request)
    {
        Ticket::create([
            'description' => $request->description,
            'importance' => $request->importance,
            'problem' => $request->problem_theme
        ]);
    }
}
