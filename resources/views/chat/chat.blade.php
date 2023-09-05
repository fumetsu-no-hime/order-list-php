@extends('layout.template-2')
@section('main')
    <main>
        <div class="container d-flex flex-column gap-4">
            <span>留言板</span>
            <div class="content">
                <div class="chat w-75"></div>
                <div class="button ms-2">
                    <button type="button" class="btn w-0 h-50 bg-primary-subtle">edit</button>
                    <button type="button" class="btn w- h-50 bg-primary-subtle">delete</button>
                </div>
            </div>
            <div class="content">
                <div class="resp w-75"></div>
                <div class="button ms-2">
                    <button type="button" class="btn w- h-50 bg-primary-subtle">edit</button>
                    <button type="button" class="btn w- h-50 bg-primary-subtle">delete</button>
                </div>
            </div>
            <div class="textarea">
                <label for="" class="">
                    <textarea name="mainchat" id="" cols="100" rows="3" placeholder="回覆該留言"></textarea>
                </label>
                <button type="button" class="btn w-0 bg-primary-subtle ms-2">send</button>
            </div>
            <div class="textarea">
                <label for="">
                    <textarea name="resp" id="" cols="100" rows="3" placeholder="建立新的留言"></textarea>
                </label>
                <button type="button" class="btn w-0 bg-primary-subtle ms-2">send</button>
            </div>
        </div>
    </main>
@endsection
