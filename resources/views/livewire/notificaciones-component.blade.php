<li class="nav-item dropdown dropdown-notification me-25">
    <a class="nav-link" href="#" data-bs-toggle="dropdown">
        <span wire:ignore><i class="ficon" data-feather="bell"></i></span>
        @if($noleidas)
        <span class="badge rounded-pill bg-danger badge-up">{{$noleidas}}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
        <li class="dropdown-menu-header">
            <div class="dropdown-header d-flex">
                <h4 class="notification-title mb-0 me-auto">Notificaciones</h4>
                <div class="badge rounded-pill badge-light-primary">{{$notificaciones->count()}}</div>
            </div>
        </li>
        <li class="scrollable-container media-list">
            @foreach($notificaciones as $notificacion)
            <a class="d-flex {{!$notificacion->read_at ? 'list-group-item-primary': ''}}" wire:click="marcarleida('{{$notificacion->id}}')" href="{{$notificacion->data['url']}}">
                <div class="list-item d-flex align-items-start">
                    <div class="me-1">
                        <div class="avatar"><img src="{{asset('app-assets/images/portrait/small/avatar-s-15.jpg')}}" alt="avatar" width="32" height="32"></div>
                    </div>
                    <div class="list-item-body flex-grow-1">
                        <p class="media-heading">
                            <span class="fw-bold font-small-3">{{$notificacion->created_at->diffForHumans()}}</span>
                        </p>
                        <small class="notification-text"> {{$notificacion->data['mensaje']}}.</small>
                    </div>
                </div>
            </a>
            @endforeach
        </li>
        <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all notifications</a></li>
    </ul>
</li>