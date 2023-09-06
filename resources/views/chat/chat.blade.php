@extends('layout.template-2')
@section('main')
    <main>
        <div class="container d-flex flex-column gap-4">
            <span>留言板</span>
            @foreach ($chats as $chat)
                <div class="content">
                    <label for="">
                        <input class="chat w-75" type="text" value="{{ $chat->id }}.&nbsp;{{ $chat->content }}">
                    </label>
                    <div class="button ms-2">
                        <button type="submit" class="btn h-50 bg-primary-subtle">edit</button>
                        <button type="submit" class="btn h-50 bg-primary-subtle">delete</button>
                    </div>
                </div>
            @endforeach
            @foreach ($resps as $resp)
                <div class="content ms-3">
                    <label for="">
                        <input class="chat w-75" type="text"
                            value="{{ $resp->id }}-{{ $resp->response_id }}.&nbsp;{{ $resp->response }}">
                    </label>
                    <div class="button ms-2">
                        <button type="submit" class="btn h-50 bg-primary-subtle">edit</button>
                        <button type="submit" class="btn h-50 bg-primary-subtle">delete</button>
                    </div>
                </div>
            @endforeach
            <form action="{{ route('com.store') }}" method="POST">
                @csrf
                <div class="textarea">
                    <label for="mainchat" class="">
                        <textarea name="mainchat" id="" cols="100" rows="3" placeholder="建立新的留言"></textarea>
                    </label>
                    <button type="submit" class="btn w-0 bg-primary-subtle ms-2">send</button>
                </div>
                <div class="textarea">
                    <label for="resp">
                        <textarea name="resp" id="" cols="100" rows="3" placeholder="回覆該留言"></textarea>
                    </label>
                    <button type="submit" class="btn w-0 bg-primary-subtle ms-2">send</button>
                </div>
            </form>
        </div>
    </main>
@endsection
