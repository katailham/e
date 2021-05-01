{{ csrf_field() }}
<div class="form-group">
    <label for="photo">Foto</label>
    <input type="file" class="form-control" name="photo" id="photo" value="{{ $photo ?? '' }}"/>
</div>
<div class="form-group">
    <label for="nama" class="col-sm-2 control-label">Nama Product</label>
    <div class="col-sm-10">
    <input type="text" name="name" id="name" class="form-control" value="{{ $name ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="kategori" class="col-sm-2 control-label">Kategori</label>
    <div class="col-sm-10">
        <select name="categories_id" class="form-control">
            @foreach($categorie as $item)
                <option value="{{ $item->id }}" {{ ( ($categories_id??'')==$item->id) ? 'selected' : '' }}>
                {{ $item->name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
 <label for="merek" class="col-sm-2 control-label">Merek</label>
 <div class="col-sm-10">
        <select name="brands_id" class="form-control">
            @foreach($brand as $item)
                <option value="{{ $item->id }}" {{ ( ($brands_id??'')==$item->id) ? 'selected' : '' }}>
                {{ $item->name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="col-sm-2 control-label">Harga</label>
    <div class="col-sm-10">
        <input type="number" name="harga" id="harga" class="form-control" value="{{ $harga ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="alamat" class="col-sm-2 control-label">Jumlah</label>
    <div class="col-sm-10">
        <input type="number" name="qty" id="qty" class="form-control" value="{{ $qty ?? '' }}" >
    </div>
</div>
<div class="form-group">
 <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" class="btn btn-success btn-md ml-auto" name="simpan" value="Simpan">
 <a href="{{ route('product.index') }}" class="btn btn-primary ml-auto" role="button">Batal</a>
 </div>
</div>