<?php if (isset($component)) { $__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Popup::class, ['domId' => 'addPopup'] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Popup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <h1>Input</h1>
    <form action="<?php echo e(route('anggota.store')); ?>" method="POST" style="max-width: 20em;">
      <?php echo csrf_field(); ?>
      <div>
        <label for="namaAnggota">Nama Anggota</label>
        <input type="text" id="namaAnggota" name="namaAnggota">
      </div>
      <div>
        <label for="jenisKelamin">Gender</label>
        <div class="radios">
          <div>
            <input type="radio" name="jenisKelamin" id="lakilaki" value="Laki-laki">
            <label for="lakilaki">Laki-laki</label>
          </div>
          <div>
            <input type="radio" name="jenisKelamin" id="perempuan" value="Perempuan">
            <label for="perempuan">Perempuan</label>
          </div>
          <div>
            <input type="radio" name="jenisKelamin" id="lainnya" value="Lainnya/Tdk Disebut">
            <label for="lainnya">Lainnya/Tidak Disebut</label>
          </div>
        </div>
      </div>
      <div>
        <label for="tempatLahir">Tempat Lahir</label>
        <input type="text" id="tempatLahir" name="tempatLahir">
      </div>
      <div>
        <label for="tanggalLahir">Tanggal Lahir</label>
        <input type="date" id="tanggalLahir" name="tanggalLahir">
      </div>
      <div>
        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat"></textarea>
      </div>
      <div>
        <label for="noTelepon">No. Telepon</label>
        <input type="text" id="noTelepon" name="noTelepon">
      </div>
      <div>
        <label for="noId">No. Identitas</label>
        <input type="text" id="noId" name="noIdentitas" />
      </div>
      <div>
        <label for="pwd">Password</label>
        <input type="password" id="pwd" name="pwd" />
      </div>
      <button type="submit" class="bubsbutton">Submit</button>
    </form>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8)): ?>
<?php $component = $__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8; ?>
<?php unset($__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8); ?>
<?php endif; ?><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/components/anggota/add-popup.blade.php ENDPATH**/ ?>