<div class="position-fixed" style="left: 10px; bottom: 10px;">
    @error('name')
        @component('components.alert-error', ['message' => $message ]) @endcomponent
    @enderror

    @error('username')
        @component('components.alert-error', ['message' => $message ]) @endcomponent
    @enderror

    @error('email')
        @component('components.alert-error', ['message' => $message ]) @endcomponent
    @enderror

    @error('password')
        @component('components.alert-error', ['message' => $message ]) @endcomponent
    @enderror

    @if (session('message'))   
        <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" data-autohide="true">
            <div class="toast-body">
                @if (session('message') == 'Upload realizado com sucesso!')
                    <i class="fas fa-check-circle mr-2"></i>
                @else
                    <i class="fas fa-times-circle mr-2"></i>
                @endif
                {{ session('message') }}
            </div>
        </div>
    @endif

    @if (session('status'))
        <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" data-autohide="true">
            <div class="toast-body">
                <i class="fas fa-check-circle mr-2"></i>
                {{ session('status') }}
            </div>
        </div>
    @endif
</div>