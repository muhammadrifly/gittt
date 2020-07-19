<div class="form-group row">
    <label for="nama_kriteria" class="control-label">{{ 'NAMA KRITERIA' }}</label>
    <input class="form-control  @error('nama_kriteria') is-invalid @enderror" name="nama_kriteria" type="text" id="nama_kriteria" value="{{ isset($datas->nama_kriteria) ? $datas->nama_kriteria : ''}}" autofocus>
</div>

<div class="form-group row">
    <label for="persentase" class="control-label">{{ 'PERSENTASE' }}</label>
    <input class="form-control @error('persentase') is-invalid @enderror" name="persentase" type="text" id="persentase" value="{{ isset($datas->persentase) ? $datas->persentase : ''}}" autofocus>
    
 
</div>


<div class="form-group row">
    <label for="secondary_factor" class="control-label">{{ 'secondary factor' }}</label>
    <input class="form-control @error('secondary_factor') is-invalid @enderror" name="secondary_factor" type="text" id="secondary_factor" value="{{ isset($datas->secondary_factor) ? $datas->secondary_factor : ''}}" autofocus>

   
   
</div>


<div class="form-group row">
    <label for="core_factor" class="control-label">{{ 'core factor' }}</label>
    <input class="form-control @error('core_factor') is-invalid @enderror" name="core_factor" type="text" id="core_factor" value="{{ isset($datas->core_factor) ? $datas->core_factor : ''}}" >
     
  
</div>


<div class="form-group">
<input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>