@extends('layout.template-2')
@section('main')
    <main>
        <div class="container d-flex flex-column gap-4">
            <span>留言板</span>
            <div class="content p-2">
                @foreach ($chats as $chat)
                    {{-- @dd($chat) --}}
                    <div class="chat-area mb-2">
                        <form action="{{ route('com.update', ['id' => $chat->id]) }}" method="post">
                            {{-- @dd($chat->id) --}}
                            @csrf
                            <span class="">留言</span>
                            <div class="d-flex flex-row align-items-center mb-2 gap-3">
                                <span>{{ $chat->id }}.&nbsp;{{ $chat->content }}</span>
                                <label for="edit">
                                    <input class="chat" type="text" name="edit" placeholder="編輯留言">
                                </label>
                                <div class="button">
                                    <button type="submit" class="btn h-100 bg-primary-subtle">edit</button>
                                    {{-- <form action="{{ route('com.delete', ['id' => $chat->id]) }}"method="POST"> --}}
                                    <button type="submit" class="btn h-100 bg-primary-subtle">delete</button>
                                    {{-- </form> --}}
                                </div>
                            </div>
                        </form>
                        <span>回覆</span>

                        @foreach ($chat->response as $resp)
                            {{-- <div class="resp"> --}}
                            <div class="d-flex flex-row gap-3">
                                <label for="">
                                    <input class="chat w-100 h-100 mb-2" type="text" value=""
                                        placeholder="&nbsp;{{ $resp->response }}">
                                </label>
                                <div class="button">
                                    {{-- <form action="{{ route('com.edit', ['id' => $chat->id]) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn h-100 bg-primary-subtle">edit</button>
                                    </form>
                                    <form action="{{ route('com.delete', ['id' => $chat->id]) }}"method="POST">
                                        @csrf
                                        <button type="submit" class="btn h-100 bg-primary-subtle">delete</button>
                                    </form> --}}
                                </div>
                            </div>
                        @endforeach
                        <div class="textarea">
                            <form action="{{ route('com.create') }}" method="post">
                                @csrf
                                {{-- @method('post') --}}
                                <label for="resp">
                                    <input type="hidden" value="{{ $chat->id }}" name="id" hidden>
                                    <input type="text" name="resp" id="" cols="100" rows="3"
                                        placeholder="回覆該留言" required>
                                </label>
                                <button type="submit" class="btn w-0 bg-primary-subtle ms-2">send</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('com.store') }}" method="POST">
                @csrf
                <div class="textarea">
                    <label for="mainchat" class="">
                        <textarea name="mainchat" id="" cols="100" rows="3" placeholder="建立新的留言" required></textarea>
                    </label>
                    <button type="submit" class="btn w-0 bg-primary-subtle ms-2">send</button>
                </div>
            </form>
        </div>
        </div>
    </main>
@endsection
