{{ csrf_field() }}
<div class="form-group">
    <label for="nisn" class="col-sm-2 control-label">Nama Kategori</label>
    <div class="col-sm-10">
    <input type="text" name="name" id="name" class="form-control" value="{{ $name ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="col-sm-2 control-label">Deskripsi</label>
    <div class="col-sm-10">
        <input type="text" name="description" id="description" class="form-control" value="{{ $harga ?? '' }}" >
    </div>
</div>
<div class="form-group">
 <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" class="btn btn-success btn-md ml-auto" name="simpan" value="Simpan">
 <a href="{{ route('product.index') }}" class="btn btn-primary ml-auto" role="button">Batal</a>
 </div>
</div>