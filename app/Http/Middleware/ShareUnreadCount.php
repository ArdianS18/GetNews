<?php

namespace App\Http\Middleware;

use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\Report;
use Illuminate\Support\Facades\View;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareUnreadCount
{
    protected $contactUs;
    protected $report;
    protected $contact;

    public function __construct(ContactUs $contactUs, Report $report, Contact $contact)
    {
        $this->contactUs = $contactUs;
        $this->report = $report;
        $this->contact = $contact;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $countContact = $this->contactUs->where('status', 'unread')->count();
        $countReport = $this->report->where('status', 'unread')->count();
        $totalUnread = $countContact + $countReport;

        $firstContact = $this->contact->first();

        View::share([
            'totalUnread' => $totalUnread,
            'firstContact' => $firstContact
        ]);

        return $next($request);
    }
}
