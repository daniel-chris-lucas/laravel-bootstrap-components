@if(isset($errors) && ! $errors->isEmpty())
    @if($errors->has($name))
        <div class="invalid-feedback d-block">
            {{ $errors->first($name) }}
        </div>
    @else
        <div class="valid-feedback d-block">
            {{ trans('bootstrap-components::bootstrap-components.notification.validation.success') }}
        </div>
    @endif
@endisset
