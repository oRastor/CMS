<div class="form-group{{ $errors->has($name) ? ' has-error' : '' }}">
    @if(isset($title))
        <label for="field-{{$name}}">{{$title}}</label>
    @endif

    <article>
        <div class="medium-editable wrapper b" style="min-height: 500px" id="medium-{{$lang}}-{{$slug}}">
            {!! $value or old($name) !!}
        </div>
    </article>

 <input type="hidden" id="field-{{$lang}}-{{$slug}}"
        @if(isset($prefix))
        name="{{$prefix}}[{{$lang}}]{{$name}}"
        @else
        name="{{$lang}}{{$name}}"
        @endif
        value="{!! $value or old($name) !!}">

    @if(isset($help))
        <p class="help-block">{{$help}}</p>
    @endif

</div>

<div class="line line-dashed b-b line-lg"></div>

@push('stylesheets')
<style>
    .medium-editor-insert-buttons {
        display: none;
        position: absolute;
        color: #ddd;
        font-size: 0.9em;
        -webkit-user-select: none;
        user-select: none; }
    .medium-editor-insert-buttons a {
        text-decoration: underline;
        cursor: pointer; }
    .medium-editor-insert-buttons .medium-editor-insert-buttons-show {
        box-sizing: border-box;
        display: block;
        width: 32px;
        height: 32px;
        border-radius: 20px;
        border: 1px solid;
        font-size: 25px;
        line-height: 28px;
        text-align: center;
        text-decoration: none;
        background: #fff;
        transform: rotate(0);
        transition: transform 100ms; }
    .medium-editor-insert-buttons .medium-editor-insert-buttons-addons {
        display: block;
        position: relative;
        left: 55px;
        top: -32px;
        margin: 0;
        padding: 0;
        list-style: none;
        z-index: 2;
        opacity: 0;
        transition: opacity .1s; }
    .medium-editor-insert-buttons .medium-editor-insert-buttons-addons li {
        display: inline-block;
        background-color: #fff;
        transform: scale(0);
        transition: transform .1s 10ms; }
    .medium-editor-insert-buttons .medium-editor-insert-buttons-addons li a {
        box-sizing: border-box;
        display: inline-block;
        margin: 0 5px;
        width: 32px;
        height: 32px;
        border-radius: 20px;
        border: 1px solid;
        font-size: 20px;
        line-height: 28px;
        text-align: center;
        cursor: pointer; }
    .medium-editor-insert-buttons .medium-editor-insert-buttons-addons li a .fa {
        font-size: 15px; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-show {
        transition: transform 250ms;
        transform: rotate(45deg); }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons {
        opacity: 1; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons li {
        transition-duration: .2s;
        transform: scale(1);
        transition-delay: 10ms; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons li:nth-child(2) {
        transition-delay: 30ms; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons li:nth-child(3) {
        transition-delay: 60ms; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons li:nth-child(4) {
        transition-delay: 90ms; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons li:nth-child(5) {
        transition-delay: 120ms; }
    .medium-editor-insert-buttons.medium-editor-insert-addons-active .medium-editor-insert-buttons-addons li:nth-child(6) {
        transition-delay: 150ms; }

    .medium-editor-insert-buttons-active {
        display: block; }

    .medium-editor-insert-image-active {
        outline: 2px solid #000; }

</style>
@endpush

@push('scripts')
    <script>
        var editor = new MediumEditor('#medium-{{$lang}}-{{$slug}}', {
            extensions: {
                'insert': new MediumEditorInsert()
            }
        });

        editor.subscribe('editableInput', function (event, editable) {
            $('#field-{{$lang}}-{{$slug}}').val($(editable).html());

            console.log($(editable).html());
        });
    </script>
@endpush
