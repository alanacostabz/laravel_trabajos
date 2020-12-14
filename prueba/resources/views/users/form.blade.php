@csrf

<p>
  <label for="avatar">
    <input type="file" name="avatar">
    {!! $errors->first('avatar', '<span class="error">:message</span>') !!}
  </label>
</p>

<p>
  <label for="name">
    Nombre
  </label>
  <input class="form-control" type="text" name="name" value="{{$user->name ?? old('name')}}">
  {!! $errors->first('name', '<span class="error">:message</span>') !!}
</p>

<p>
  <label for="email">
    Email
  </label>
  <input class="form-control" type="text" name="email" value="{{$user->email ?? old('email')}}">
  {!!$errors->first('email', '<span class="error">:message</span>') !!}
</p>


@unless ($user->id)
  <p>
  <label for="password">
    Password
  </label>
  <input class="form-control" type="password" name="password">
  {!! $errors->first('password', '<span class="error">:message</span>') !!}
</p>

<p>
  <label for="password_confirmation">
    Password Confirm
  </label>
  <input class="form-control" type="password" name="password_confirmation">
  {!! $errors->first('password_confirmation', '<span class="error">:message</span>') !!}
</p>
@endunless

<p>
  <div class="form-check">
    @foreach ($roles as $id => $name)
      <label>
        <input 
          type="checkbox" 
          value="{{$id}}"
          {{$user->roles->pluck('id')->contains($id) ? 'checked' : ''}} 
          name="roles[]">
          {{$name}}
      </label>
    @endforeach
  </div>
  {!! $errors->first('roles', '<span class="error">:message</span>') !!}
  <hr>
</p>