<div>

    <div class="input-group mb-3">

        <input name={{$name}} type="text"
               class="form-control @error($name) border-danger @enderror"
               placeholder="{{$placeholder ?? null}}"
               value="{{old($name) ?? $model->$name}}"
        >

        @if(!empty($icon))
            <div class="input-group-append">
                <div class="input-group-text @error($name) border-danger @enderror">
                    <span class="{{ $icon }}"></span>
                </div>
            </div>
        @endif

    </div>

    @if($errors->has($name))
        <p class="text-danger">{{ $errors->first($name) }}</p>
    @endif

</div>
