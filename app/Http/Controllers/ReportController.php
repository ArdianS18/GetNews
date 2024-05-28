<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\ReportInterface;
use App\Enums\MessageStatusEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\ReportRequest;
use App\Models\News;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReportController extends Controller
{

    private ReportInterface $report;
    private User $user;
    private NewsInterface $news;

    public function __construct(ReportInterface $report, User $user, NewsInterface $news)
    {
        $this->report = $report;
        $this->user = $user;
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('pages.admin.inbox.index');

        $reports = $this->report->get();

        return view('pages.admin.report.index', compact('reports'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($report)
    {
        $data['status'] = MessageStatusEnum::READ->value;
        $this->report->update($report, $data);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }


    public function report(Report $report){
        $report = $this->report->get();
        $news = $this->news->get();
        return view('pages.user.news.index', compact('contactUs','news'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request, News $news)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['news_id'] = $news->id;
        $this->report->store($data);
        return back()->with('success', 'berhasil menambahkan data');
    }

    public function read($report)
    {
        $data['status'] = MessageStatusEnum::READ->value;
        $this->report->update($report, $data);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $data = [
            'status_delete' => 1
        ];

        $this->report->update($report->id, $data);
        return back()->with('success', 'berhasil menghapus data');
    }

    public function recovery(Report $report)
    {
        $data = [
            'status_delete' => 0
        ];

        $this->report->update($report->id, $data);
        return back()->with('success', 'berhasil menghapus data');
    }

    public function delete(Report $report)
    {
        $this->report->delete($report->id);
        return back()->with('success', 'berhasil menghapus data');
    }
}
