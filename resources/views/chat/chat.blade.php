@extends('layout.template-2')
@section('main')
    <main>
        <div class="container d-flex flex-column gap-4">
            <span>留言板</span>
            <div class="content p-2">
                @foreach ($chats as $chat)
                    {{-- @dd($chat) --}}
                    <div class="chat-area mb-2 d-flex flex-column gap-3 w-100">
                        <span class="">留言</span>
                        <div class="d-flex flex-row gap-3 align-items-center">
                            {{-- @dd($chat->id) --}}
                            <div class="d-flex flex-row align-items-center gap-2 w-100">
                                <span class="me-auto">{{ $chat->id }}.&nbsp;{{ $chat->content }}</span>
                                <div class="button d-flex gap-2">
                                    <form action="{{ route('com.update', ['id' => $chat->id]) }}" method="post"
                                        class="d-flex gap-2">
                                        @csrf
                                        <label for="edit" class="w-100">
                                            <input id="messInput{{ $chat->id }}" class="chat h-100 d-none" type="text"
                                                name="edit" placeholder="編輯留言" required>
                                        </label>
                                        {{-- <div class="button"> --}}
                                        <button id="messEdit{{ $chat->id }}" type="button" class="btn btn-primary"
                                            onclick="message({{ $chat->id }},this)">edit</button>
                                        <button id="inputComfirm{{ $chat->id }}" type="submit"
                                            class="btn btn-primary d-none">comfirm</button>
                                        {{-- </div> --}}
                                    </form>
                                    <form action="{{ route('com.delete', ['id' => $chat->id]) }}" method="POST"
                                        class="h-50 d-flex align-items-center">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <span>回覆</span>
                        @foreach ($chat->response as $resp)
                            {{-- <div class="resp"> --}}
                            <div class="d-flex flex-row align-items-center gap-3 mb-1 border-bottom">
                                <span class="me-auto">&nbsp;{{ $resp->response }}</span>
                                <div class="button d-flex gap-2">
                                    <form action="{{ route('com.respUpdate', ['id' => $resp->id]) }}" method="post" class="d-flex gap-2">
                                        @csrf
                                        <label for="">
                                            <input id="respEdit{{ $resp->id }}" class="chat  h-100 mb-2  d-none"
                                                type="text" value="" name="respEdit" value="{{ $resp->response }}"
                                                placeholder="編輯回覆" required>
                                        </label>
                                        <button id="respEditBtn{{ $resp->id }}" type="button" class="btn btn-primary"
                                            onclick="reply({{ $resp->id }},this)">edit</button>
                                        <button id="editComfirm{{ $resp->id }}" type="submit"
                                            class="btn btn-primary d-none">comfirm</button>
                                    </form>
                                    <form action="{{ route('com.respDelete', ['id' => $resp->id]) }}"method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <div class="textarea">
                            <form action="{{ route('com.create') }}" method="post" class="d-flex gap-2">
                                @csrf
                                {{-- @method('post') --}}
                                <label for="resp">
                                    <input type="hidden" value="{{ $chat->id }}" name="id" hidden>
                                    <input type="text" name="resp" placeholder="回覆該留言" class="h-100" required>
                                </label>
                                <button type="submit" class="btn btn-primary ms-2">send</button>
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
                    <button type="submit" class="btn btn-primary ms-2">send</button>
                </div>
            </form>
        </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        function reply(id, el) {
            const editBtn = document.querySelector(`#respEditBtn${id}`);
            const edit = document.querySelector(`#respEdit${id}`);
            const editComfirm = document.querySelector(`#editComfirm${id}`);

            // editBtn.classList.toggle('d-none');

            edit.classList.toggle('d-none');
            editComfirm.classList.toggle('d-none');

            if (edit.classList.contains('d-none')) {
                el.textContent = 'edit';
            } else {
                el.textContent = 'cancel';

            }
        }

        function message(id, el) {
            const editBtn = document.querySelector(`#messEdit${id}`);
            const messInput = document.querySelector(`#messInput${id}`);
            const inputComfirm = document.querySelector(`#inputComfirm${id}`);

            // editBtn.classList.toggle('d-none');

            messInput.classList.toggle('d-none');
            inputComfirm.classList.toggle('d-none');

            if (messInput.classList.contains('d-none')) {
                el.textContent = 'edit';
            } else {
                el.textContent = 'cancel';

            }
        }
    </script>
@endsection
