<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\TicketRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AnswerRequest;
use App\Models\Notice;

class TicketController extends Controller
{
    public function ticketsView(Request $request)
    {
        $filter = $request->input('filter');

        if ($filter && DB::table('statuses')->where('status', $filter)->exists()) {
            $tickets = Ticket::where('status', $filter)->get();
        } else {
            $tickets = Ticket::all();
        }

        $tickets = $tickets->map(function ($ticket) {
            switch ($ticket->importance) {
                case 'low':
                    $ticket->importance = 'Низкий';
                    break;
                case 'normal':
                    $ticket->importance = 'Средний';
                    break;
                case 'high':
                    $ticket->importance = 'Высокий';
                    break;
            }

            switch ($ticket->problem) {
                case 'product':
                    $ticket->problem = 'Вопросы по продуктам и услугам';
                    break;
                case 'recovery':
                    $ticket->problem = 'Возвраты и обмены';
                    break;
                case 'complaint':
                    $ticket->problem = 'Жалобы и претензии';
                    break;
                case 'more_info':
                    $ticket->problem = 'Запросы на дополнительную информацию';
                    break;
                case 'tech_support':
                    $ticket->problem = 'Техническая поддержка для клиентов';
                    break;
            }
            return $ticket;
        });

        return view('tickets', ["tickets" => $tickets]);
    }

    public function showTicketForm()
    {
        return view('ticket_form');
    }

    public function createTicket(TicketRequest $request)
    {
        $path = $request->hasFile('photo') ? $request->file('photo')->store('uploads', 'public') : null;

        Ticket::create([
            'description' => $request->description,
            'importance' => $request->importance,
            'problem' => $request->problem_theme,
            'photo' => $path,
            'user' => Auth::id(),
            'status' => 'new',
        ]);

        return view('ticket_form', ['success' => 'Тикет успешно создан!']);
    }

    public function updateStatus(Request $request)
    {
        $ticketId = $request->ticketId;
        $status = $request->status;
        $ticket = Ticket::find($ticketId);

        if ($ticket->status !== $status) {
            Notice::create([
                "userId" => $ticket->user,
                "ticketId" => $ticketId
            ]);

            $ticket->update(["status" => $status]);
        }

        return redirect()->back();
    }

    public function showAnswerForm($ticketId)
    {
        $ticket = Ticket::find($ticketId);
        return view('answer_form', ["ticket" => $ticket]);
    }

    public function doAnswer(AnswerRequest $request, $ticketId)
    {
        $answer = $request->input('answer');

        $ticket = Ticket::find($ticketId);
        $ticket->update([
           "answer" => $answer
        ]);

        return redirect()->route('tickets');
    }

    public function yourTickets($userId)
    {
        $notices = Notice::where('userId', $userId);
        $ticketsId = $notices->pluck('ticketId');
        $tickets = Ticket::whereIn('id', $ticketsId)->get();

        $tickets = $tickets->map(function ($ticket) {
            switch ($ticket->importance) {
                case 'low':
                    $ticket->importance = 'Низкий';
                    break;
                case 'normal':
                    $ticket->importance = 'Средний';
                    break;
                case 'high':
                    $ticket->importance = 'Высокий';
                    break;
            }

            switch ($ticket->problem) {
                case 'product':
                    $ticket->problem = 'Вопросы по продуктам и услугам';
                    break;
                case 'recovery':
                    $ticket->problem = 'Возвраты и обмены';
                    break;
                case 'complaint':
                    $ticket->problem = 'Жалобы и претензии';
                    break;
                case 'more_info':
                    $ticket->problem = 'Запросы на дополнительную информацию';
                    break;
                case 'tech_support':
                    $ticket->problem = 'Техническая поддержка для клиентов';
                    break;
            }

            switch ($ticket->status) {
                case 'new':
                    $ticket->status = 'Новый';
                    break;
                case 'in_process':
                    $ticket->status = 'На рассмотрении';
                    break;
                case 'done':
                    $ticket->status = 'Решено';
                    break;
            }
            return $ticket;
        });

        return view('notices', ["tickets" => $tickets]);
    }
}
