<?php

namespace App\Http\Middleware;

use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\NewsReject;
use App\Models\Report;
use App\Models\SendMessage;
use Illuminate\Support\Facades\View;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ShareUnreadCount
{
    protected $contactUs;
    protected $report;
    protected $contact;
    protected $sendMessage;
    protected $newsReject;

    public function __construct(ContactUs $contactUs, Report $report, Contact $contact, SendMessage $sendMessage, NewsReject $newsReject)
    {
        $this->contactUs = $contactUs;
        $this->report = $report;
        $this->contact = $contact;
        $this->sendMessage = $sendMessage;
        $this->newsReject = $newsReject;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $countContact = $this->contactUs->where('status', 'unread')->count();
            $countReport = $this->report->where('status', 'unread')->count();
            $newsReject = $this->newsReject->whereRelation('news', 'user_id', auth()->user()->id)->count();


            $countMessage = $this->sendMessage->where('email', auth()->user()->email)->where('status', 'unread')->count();
            $totalUnread = $countContact + $countReport + $countMessage;

            $totalAuthor = $countReport + $countMessage + $newsReject;

            View::share([
                'totalUnread' => $totalUnread,
                'countMessage' => $countMessage,
                'totalAuthor' => $totalAuthor
            ]);
        }

        return $next($request);
    }
}
