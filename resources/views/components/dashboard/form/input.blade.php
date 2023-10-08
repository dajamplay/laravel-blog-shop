<div>
    <div class="input-group mb-3">
        <input name={{$name}} type="text"
               class="form-control @error($name) border-danger @enderror"
               placeholder="{{$placeholder}}" value="{{$value}}">
        <div class="input-group-append">
            <div class="input-group-text @error($name) border-danger @enderror">
                <span class="fas fa-user"></span>
            </div>
        </div>
    </div>
    @error($name)
    <p class="text-danger">{{ $message }}</p>
    @enderror
</div>
