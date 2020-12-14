@csrf

            {{-- @unless (isset($message) && $message->user_id) --}}
            @if ($showFields)
                <p>
                    <label for="nombre">
                        Nombre
                    </label>
                    <input class="form-control" type="text" name="nombre" value="{{$message->nombre ?? old('nombre')}}">
                    {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
                </p>
                <p>
                    <label for="email">
                        Email
                    </label>
                    <input class="form-control" type="text" name="email" value="{{$message->email ?? old('email')}}">
                    {!!$errors->first('email', '<span class="error">:message</span>') !!}
                </p>
            @endif
            
            <p>
                <label for="email">
                    Mensaje
                </label>
                <textarea class="form-control" name="mensaje">{{$message->mensaje ?? old('mensaje')}}</textarea>
                {!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
            </p>
            <input class="btn btn-primary" type="submit" value="{{$btnText ?? 'Guardar'}}">