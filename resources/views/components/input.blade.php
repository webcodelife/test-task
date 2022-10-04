<div class="form-row mb-3">
    <label class="form-label">
        {{ $label }}
    </label>

    <input @class(['form-control', 'is-invalid' => $errors->has($name)])
           class="form-control" type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" {{ $attributes }}
    >

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
