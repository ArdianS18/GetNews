<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SendMessageInterface;
use App\Enums\MessageStatusEnum;
use App\Helpers\ResponseHelper;
use App\Models\SendMessage;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    private SendMessageInterface $sendMessage;

    public function __construct(SendMessageInterface $sendMessage)
    {
        $this->sendMessage = $sendMessage;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data['user_id'] = auth()->user()->id;
        $data['email'] = $request->email;
        $data['message'] = $request->message;

        $this->sendMessage->store($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(SendMessage $sendMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SendMessage $sendMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SendMessage $sendMessage)
    {
        //
    }

    public function read(SendMessage $send)
    {
        $data['status'] = MessageStatusEnum::READ->value;
        $this->sendMessage->update($send->id, $data);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    public function recovery(SendMessage $send)
    {
        $data = [
            'status_delete' => 0
        ];

        $this->sendMessage->update($send->id, $data);
        return back()->with('success', 'berhasil menghapus data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SendMessage $send)
    {
        $data = [
            'status_delete' => 1
        ];

        $this->sendMessage->update($send->id, $data);
        return back()->with('success', 'berhasil menghapus data');
    }

    public function delete(SendMessage $send)
    {
        $this->sendMessage->delete($send->id);
        return back()->with('success', 'berhasil menghapus data');
    }
}
