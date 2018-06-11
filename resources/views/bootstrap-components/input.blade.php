<div {{ classTag($type . '-' . $name . '-container', $containerClass) }}
    {{ htmlAttributes($containerHtmlAttributes) }}>
    @include('bootstrap-components::bootstrap-components.partials.label')
    <div class="input-group">
        @include('bootstrap-components::bootstrap-components.partials.icon')
        <input id="{{ $type }}-{{ $name }}"
               {{ classTag('form-control', $type . '-' . $name . '-component', $componentClass, isset($errors) && $errors->has($name) ? ' is-invalid' : null) }}
               type="{{ $type }}"
               name="{{ $name }}"
               value="{{ old($name, $value) }}"
               placeholder="{{ $placeholder }}"
               {{ htmlAttributes($componentHtmlAttributes) }}
               aria-label="{{ $label }}"
               aria-describedby="{{ $type }}-{{ $name }}">
    </div>
    @include('bootstrap-components::bootstrap-components.partials.error')
    @include('bootstrap-components::bootstrap-components.partials.legend')
</div>
