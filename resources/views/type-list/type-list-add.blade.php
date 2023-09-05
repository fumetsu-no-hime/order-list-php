@extends('layout.template')
@section('content-page')
        <div class="content-page py-4 px-lg-0 px-xl-5 mx-md-5 d-flex flex-column">
            <div class="content-title d-flex justify-content-between align-items-center flex-column px-xxl-5 px-xl-0">
                <div class="title mb-4 px-2 w-100">
                    <h2 class="fw-medium w-50">新增產品</h2>
                    <h6><span class="text-Dashboard">Dashboard</span>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbspOrder
                        List</h6>
                </div>
                <div class="order w-100 mb-5 px-2">
                    <div class="card p-5 border-0 o-card">
                        <form action="{{route('type.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="top d-flex flex-column gap-5">
                                <div class="d-flex gap-5">
                                    <span class="bg-primary-subtle px-3 py-2">產品名稱*</span>
                                    <label for="" class="form-check-label"><input name="name" type="text" required></label>
                                </div>
                                <div class="d-flex gap-5">
                                    <span class="bg-primary-subtle px-3 py-2">產品圖片</span>
                                    <label for="" class="form-check-label"><input name="image[]" type="file" multiple required accept="image/*"></label>
                                </div>
                                {{-- <div class="d-flex gap-5">
                                    <span class="bg-primary-subtle px-3 py-2">產品價格*</span>
                                    <label for="" class="form-check-label"><input name="price" type="number" min="0" required></label>
                                </div> --}}
                                {{-- <div class="d-flex gap-5">
                                    <span class="bg-primary-subtle px-3 py-2">產品狀態</span>
                                    <label><input type="radio" name="status" value="1" checked>顯示</label>
                                    <label><input type="radio" name="status" value="2" >不顯示</label>
                                </div> --}}
                                <div class="d-flex gap-5">
                                    <span class="bg-primary-subtle px-3 py-2">產品描述</span>
                                    <label for="" class="form-check-label">
                                        <textarea name="desc" id=""  cols="30" rows="2" class="form-control" style="resize: none"></textarea>
                                    </label>
                                </div>
                            </div>
                            <div class="bottom btn-group mt-4 d-flex justify-content-evenly">
                                <a href="{{route('type.index')}}"><button type="button" class="btn-lg bg-primary-subtle py-2 px-3">取消按鈕</button></a>
                                <button type="submit" class="btn-lg bg-primary-subtle py-2 px-3">新增按鈕</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
@endsection

