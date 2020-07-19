<div class="form-group row">
    <label for="anggota_id" class="control-label">{{ 'CALON ANGGOTA' }}</label>
    <select class="form-control @error('anggota_id') is-invalid @enderror" name="anggota_id" id="anggota_id">
        <option value="" disabled selected>Nama Calon Anggota</option>
        @foreach($ca as $item)
        <option value="{{ $item->id }}">{{$item->nama_calonanggota	}}</option>
        @endforeach      
    </select>
</div>

<div class="form-group row">
    <label for="id_subkriteria" class="control-label">{{ 'SUB KRITERIA' }}</label>
    <select class="form-control @error('id_subkriteria') is-invalid @enderror" name="id_subkriteria" id="id_subkriteria">
        <option value="" disabled selected>PILIH SUB KRITERIA</option>
        @foreach($subkriteria as $t)
        <option value="{{ $t->id_subkriteria }}">{{$t->nama_subkriteria}}</option>
        @endforeach      
    </select>
</div>

<div class="form-group row">
    <label for="values" class="control-label">{{ 'values' }}</label>
    <input class="form-control @error('values') is-invalid @enderror" name="values" type="text" id="values" value="{{ isset($datas->values) ? $datas->values : ''}}" autofocus>
 
</div>




<div class="form-group">
<input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>