<div class="form-group {{ $errors->has('max') ? 'has-error' : ''}}">
    <label for="max" class="control-label">{{ 'Max' }}</label>
    <input class="form-control" name="max" type="number" id="max" value="{{ isset($berat->max) ? $berat->max : ''}}" required>
    {!! $errors->first('max', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('min') ? 'has-error' : ''}}">
    <label for="min" class="control-label">{{ 'Min' }}</label>
    <input class="form-control" name="min" type="number" id="min" value="{{ isset($berat->min) ? $berat->min : ''}}" required>
    {!! $errors->first('min', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tanggal') ? 'has-error' : ''}}">
    <label for="tanggal" class="control-label">{{ 'Tanggal' }}</label>
    <input class="form-control" name="tanggal" type="date" id="tanggal" value="{{ isset($berat->tanggal) ? $berat->tanggal : ''}}" >
    {!! $errors->first('tanggal', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
