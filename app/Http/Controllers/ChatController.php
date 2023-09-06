<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Response;
use App\Services\FileService;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(protected FileService $FileService)
    {
    }
    public function index()
    {
        //
        $chats = Content::get();
        $resps = Response::get();
        return view('chat.chat', compact('chats', 'resps'));
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
        if ($request->resp) {

            Response::create([
                'response' => $request->resp,
                'response_id' => null,
            ]);
        } else {

        }

        if ($request->mainchat) {
            $chat = Content::create([
                'content' => $request->mainchat,
            ]);
        } else {
        }

        // dd($request->all());
        return redirect(route('com.index'));
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
