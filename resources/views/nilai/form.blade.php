<div class="form-group row">
    <label for="selisih" class="control-label">{{ 'SELISIH' }}</label>
    <input class="form-control @error('selisih') is-invalid @enderror" name="selisih" type="text" id="selisih" value="{{ isset($datas->selisih) ? $datas->selisih : ''}}" autofocus> 
</div>


<div class="form-group row">
    <label for="nilai" class="control-label">{{ 'NILAI' }}</label>
    <input class="form-control @error('nilai') is-invalid @enderror" name="nilai" type="text" id="nilai" value="{{ isset($datas->nilai) ? $datas->nilai : ''}}" autofocus>
 
</div>

<div class="form-group row">
    <label for="keterangan" class="control-label">{{ 'keterangan' }}</label>
    <input class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" type="text" id="keterangan" value="{{ isset($datas->keterangan) ? $datas->keterangan : ''}}" autofocus>
 
</div>




<div class="form-group">
<input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>