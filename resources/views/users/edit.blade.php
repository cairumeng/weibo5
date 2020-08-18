@extends('layouts.default')
@section('content')
<form action="" class="edit-avatar text-center">
    <img src="{{$user->avatar}}" alt="{{$user->name}}" id="current_avatar">
    <input type="file" id="avatar" name="avatar" hidden>
    <div id="uploadMessage"></div>

</form>
<form method="POST" action="{{route('users.update',$user)}}" class="col-md-6 offset-md-3 mt-5">
    @csrf
    @method('patch')
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" id="name" name="name" value="{{$user->name}}">
        @if($errors->has('name'))
        <div class="text-danger">{{$errors->first('name')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email}}" disabled>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password" id="password">
        @if($errors->has('password'))
        <div class="text-danger">{{$errors->first('password')}}</div>
        @endif
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@stop
@section('js')
<script>
    var current_avatar = document.querySelector('#current_avatar');
    var uploadMessage = document.querySelector('#uploadMessage');
    var avatar = document.querySelector('#avatar')

    current_avatar.addEventListener('click', function () {
        avatar.click()
    })

    avatar.addEventListener('change', function (event) {
        var avatar = event.target.files[0]
        var formData = new FormData()
        uploadMessage.innerHTML = 'Uploading...'
        formData.append('avatar', avatar)
        axios.post("{{route('users.uploadAvatar')}}", formData)
            .then(function (response) {
                current_avatar.src = response.data.path
                uploadMessage.innerHTML = 'Upload success!'
            })
            .catch(function (error) {
                uploadMessage.innerHTML = 'Fail to upload!'
            })
    })

</script>
@stop