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
        // dd($chats);
        return view('chat.chat', compact('chats'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        Response::create([
            'response' => $request->resp,
            'response_id' => $request->id,
        ]);

        // dd($request->$chat);

        return redirect(route('com.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Content::create([
            'content' => $request->mainchat,
        ]);

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
        $mess = Content::find($id);
        $mess->update([
            'content' => $request->edit,
        ]);
        return redirect(route('com.index'));
    }

    public function respUpdate(Request $request, string $id)
    {
        //
        $resp = Response::find($id);
        // dd($request->all());
        $resp->update([
            'response' => $request->respEdit,
        ]);

        return redirect(route('com.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $chat = Content::find($id);
        foreach ($chat->response ??[]as $value) {
            $value->delete();
        }
        $chat->delete();

        return redirect(route('com.index'));
    }

    public function respDelete(string $id)
    {
        //
        $resp = Response::find($id);

        // foreach ($chat->response ??[]as $value) {
        //     $value->delete();
        // }
        if ($resp) {
            // 删除回复
            $resp->delete();
        }

        return redirect(route('com.index'));
    }
}
