<div class="form-group row">
    <label for="nim" class="control-label">{{ 'NIM' }}</label>
    <input class="form-control  @error('nim') is-invalid @enderror" maxlength="9" name="nim" type="text" id="nim" value="{{ isset($datas->nim) ? $datas->nim : ''}}" autofocus>


</div>

<div class="form-group row">
    <label for="nama_calonanggota" class="control-label">{{ 'NAMA' }}</label>
    <input class="form-control @error('nama_calonanggota') is-invalid @enderror" name="nama_calonanggota" type="text" id="nama_calonanggota" value="{{ isset($datas->nama_calonanggota) ? $datas->nama_calonanggota : ''}}" autofocus>
    
 
</div>

<div class="form-group row">
    <label for="jurusan" class="control-label">{{ 'JURUSAN' }}</label>
    <select class="form-control @error('email_calonanggota') is-invalid @enderror" name="jurusan" id="jurusan">
        <option value="" disabled selected>PILIH JURUSAN</option>
        <option value="komputerisasi akuntansi">Komputerisasi Akuntansi</option>
        <option value="Teknik Komputer">Teknik Komputer</option>
        <option value="Manajemen Informatika">Manajemen Informatika</option>
        <option value="Teknik Informatika">Teknik Informatika</option>
        <option value="Sistem Informasi">Sistem Informasi</option>
    </select>

  
    
</div>


<div class="form-group row">
    <label for="email_calonanggota" class="control-label">{{ 'EMAIL' }}</label>
    <input class="form-control @error('email_calonanggota') is-invalid @enderror" name="email_calonanggota" type="email" id="email_calonanggota" value="{{ isset($datas->email_calonanggota) ? $datas->email_calonanggota : ''}}" autofocus>
        
      
</div>

<div class="form-group row">
    <label for="nomor_telp" class="control-label">{{ 'Nomor Telepon' }}</label>
    <input class="form-control @error('nomor_telp') is-invalid @enderror" maxlength="13" name="nomor_telp" type="text" id="nomor_telp" value="{{ isset($datas->nomor_telp) ? $datas->nomor_telp : ''}}" autofocus>

   
   
</div>


<div class="form-group row">
    <label for="password" class="control-label">{{ 'Password' }}</label>
    <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" id="password" value="{{ isset($datas->password) ? $datas->password : ''}}" >
     
  
</div>


<div class="form-group">
<input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>