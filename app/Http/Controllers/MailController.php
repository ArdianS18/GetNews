<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Mail;
use App\HelloMail;
use App\Mail\HelloMail as MailHelloMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'subject' => 'GetMedia Verifikasi',
            'body' => 'Hai ini adalah halaman verivikasi GetMedia !!'
        ];
        try {
            MailHelloMail::to('belajarakun49@gmail.com')->send(new MailHelloMail($data));
            return response()->json(['Cek pesan di Emailmu !!']);
        } catch (Exception $th) {
            return response()->json(['Maf ada kesalahan, coba lagi']);
        }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
