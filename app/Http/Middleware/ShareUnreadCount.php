<?php

namespace App\Http\Middleware;

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

    public function __construct(ContactUs $contactUs, Report $report)
    {
        $this->contactUs = $contactUs;
        $this->report = $report;
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

        View::share('totalUnread', $totalUnread);

        return $next($request);
    }
}
