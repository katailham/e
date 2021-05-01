{{ csrf_field() }}
<div class="form-group">
    <label for="photo">Foto</label>
    <input type="file" class="form-control" name="photo" id="photo" value="{{ $photo ?? '' }}"/>
</div>
<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nama</label>
    <div class="col-sm-10">
    <input type="text" name="name" id="name" class="form-control" value="{{ $name ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="username" class="col-sm-2 control-label">Username</label>
    <div class="col-sm-10">
    <input type="text" name="username" id="username" class="form-control" value="{{ $username ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
    <input type="text" name="email" id="email" class="form-control" value="{{ $email ?? '' }}" >
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
    <input type="password" name="password" id="password" class="form-control" >
    </div>
</div>

<div class="form-group">
<label for="merek" class="col-sm-2 control-label">Merek</label>
    <div class="col-sm-10">
        <select name="roles_id" class="form-control">
            @foreach($role as $item)
                <option value="{{ $item->id }}" {{ ( ($roles_id??'')==$item->id) ? 'selected' : '' }}>
                {{ $item->name}}
            </option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
 <div class="col-sm-offset-2 col-sm-10">
 <input type="submit" class="btn btn-success btn-md ml-auto" name="simpan" value="Simpan">
 <a href="{{ route('user.index') }}" class="btn btn-primary ml-auto" role="button">Batal</a>
 </div>
</div>