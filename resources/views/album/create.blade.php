@extends('layouts.album')

@section('title', 'アルバム新規作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <h2 class="mb-5">アルバム新規作成</h2>
                <form action="{{ action('AlbumController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row mb-5">
                        <label class="col-sm-3" >なまえ</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="はなこ" name="child_name" value="{{ old('child_name') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <label class="col-sm-3">誕生日</label>
                        <div class="col-sm-9">
                            <input type="text" id="datepicker" class="form-control" placeholder="日付を入力" name="birthday" value="{{ old('birthday') }}">
                            
                        </div>
                    </div>
                    
                    <div class="form-group row mb-5">
                        <label class="col-sm-3">共同編集者</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="共有したいユーザーのアドレス" name="associate_editor_email" value="{{ old('associate_editor_email') }}">
                        </div>
                    </div>
                    <div class="form-group row mb-1">
                        <label class="col-sm-3">閲覧者</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="共有したいユーザーのアドレス"　name="viewer0_email" value="{{ old('viewer0_email') }}">
                        </div>
                    </div>
                    <div class="form-grounp row mb-1">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="共有したいユーザーのアドレス" name="viewer1_email" value="{{ old('viewer1_email') }}">
                        </div>
                    </div>
                    <div class="form-grounp row mb-1">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="共有したいユーザーのアドレス" name="viewer2_email" value="{{ old('viewer2_email') }}">
                        </div>
                    </div>
                    <div class="form-grounp row mb-5">
                        <div class="col-sm-3"></div>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" placeholder="共有したいユーザーのアドレス" name="viewer3_email" value="{{ old('viewer3_email') }}">
                        </div>
                    </div>
                    
                    {{ csrf_field() }}                    
                    <input type="submit" class="btn btn-primary col-lg-4" value="新規アルバム作成">
                </form>
            </div>
        </div>
    </div>

@endsection