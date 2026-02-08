<div class="form-group">
  <label>Kategori</label>
  <select name="kategori" class="form-control" required>
    <option value="">-- Pilih --</option>
    @foreach(['Acrylic','Alkyd','Epoxy','Polyurethane','Floor Coating','Decorative','Waterproofing'] as $v)
      <option>{{ $v }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Sub Kategori</label>
  <select name="sub_kategori" class="form-control" required>
    @foreach(['Finish','Primer','Waterproofing','Self Leveling','Antistatic','Anti Slip','Elastomeric','Resin'] as $v)
      <option>{{ $v }}</option>
    @endforeach
  </select>
</div>

<div class="form-group">
  <label>Base</label>
  <select name="base" class="form-control" required>
    <option>Solvent Based</option>
    <option>Water Based</option>
  </select>
</div>

<div class="form-group">
  <label>Lokasi Penggunaan</label>
  <div class="row">
    @foreach(['Besi','Tembok','Industri','Kayu','Baja','Lantai','Galvanis','Tangki','Area Basah','Outdoor','Atap','Beton','Dinding','Exterior'] as $i)
    <div class="col-md-4">
      <div class="form-check">
        <input type="checkbox" name="lokasi_penggunaan[]" value="{{ $i }}" class="form-check-input">
        <label class="form-check-label">{{ $i }}</label>
      </div>
    </div>
    @endforeach
  </div>
</div>