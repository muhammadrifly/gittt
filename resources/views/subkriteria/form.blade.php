<div class="form-group row">
    <label for="id_kriteria" class="control-label">{{ 'ID KRITERIA' }}</label>
    <select class="form-control @error('id_kriteria') is-invalid @enderror" name="id_kriteria" id="id_kriteria">
        <option value="" disabled selected>PILIH KRITERIA</option>
        @foreach($kriterias as $item)
        <option value="{{ $item->id_kriteria }}">{{$item->nama_kriteria}}</option>
        @endforeach      
    </select>
</div>

<div class="form-group row">
    <label for="nama_subkriteria" class="control-label">{{ 'NAMA SUBKRITERIA' }}</label>
    <input class="form-control @error('nama_subkriteria') is-invalid @enderror" name="nama_subkriteria" type="text" id="nama_subkriteria" value="{{ isset($datas->nama_subkriteria) ? $datas->nama_subkriteria : ''}}" autofocus> 
</div>


<div class="form-group row">
    <label for="target" class="control-label">{{ 'TARGET' }}</label>
    <input class="form-control @error('target') is-invalid @enderror" name="target" type="text" id="target" value="{{ isset($datas->target) ? $datas->target : ''}}" autofocus>
 
</div>


<div class="form-group row">
    <label for="type" class="control-label">{{ 'TYPE' }}</label>
    <select class="form-control @error('type') is-invalid @enderror" name="type" id="id_kriteria">
        <option value="" disabled selected>PILIH Kriteria</option>
        <option value="core">core</option>    
        <option value="secondary">secondary</option>
    </select>
</div>


<div class="form-group">
<input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>