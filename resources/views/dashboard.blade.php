<x-mi-layout>
    <div id="user-profile">
        <section id="profile-info">
            <div class="row">
                <div class="col-lg-12 col-12 order-1 order-lg-2">
                    @if(Session::get('mensaje-enviado'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <p><i data-feather="check-circle"></i> {!! session('mensaje-enviado') !!}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('mensaje.store')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <select name="usuario" class="form-select">
                                        <option value="" disabled selected>Seleccione un usuario</option>
                                        @foreach($usuarios as $usuario)
                                            <option value="{{$usuario->id}}" {{old('usuario') == $usuario->id ? 'selected' : '' }}>{{$usuario->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('usuario')
                                    <small class="text-danger font-small-2">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-75 mt-75">
                                    <input type="text" name="asunto" value="{{old('asunto')}}" class="form-control" placeholder="Asunto" autocomplete="off">
                                    @error('asunto')
                                    <small class="text-danger font-small-2">{{$message}}</small>
                                    @enderror
                                </div>
                                <fieldset class="mb-75">
                                    <label class="form-label" for="label-textarea">Envar mensaje</label>
                                    <textarea name="mensaje" class="form-control" id="label-textarea" rows="3" placeholder="Escribe aquí...">{{old('mensaje')}}</textarea>
                                    @error('mensaje')
                                    <small class="text-danger font-small-2">{{$message}}</small>
                                    @enderror
                                </fieldset>
                                <button type="submit" class="btn btn-sm btn-primary">Enviar mensaje</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</x-mi-layout>
