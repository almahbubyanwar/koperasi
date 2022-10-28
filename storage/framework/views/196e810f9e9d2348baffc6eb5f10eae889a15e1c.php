<?php if (isset($component)) { $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Layout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Layout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <?php if (isset($component)) { $__componentOriginald7e7aed9c9086f984879ed0fb42e84635cd12249 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Anggota\AddPopup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('anggota.add-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Anggota\AddPopup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald7e7aed9c9086f984879ed0fb42e84635cd12249)): ?>
<?php $component = $__componentOriginald7e7aed9c9086f984879ed0fb42e84635cd12249; ?>
<?php unset($__componentOriginald7e7aed9c9086f984879ed0fb42e84635cd12249); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginala576e3869415b75cd974f502a751419b29c0021f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Anggota\EditPopup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('anggota.edit-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Anggota\EditPopup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala576e3869415b75cd974f502a751419b29c0021f)): ?>
<?php $component = $__componentOriginala576e3869415b75cd974f502a751419b29c0021f; ?>
<?php unset($__componentOriginala576e3869415b75cd974f502a751419b29c0021f); ?>
<?php endif; ?>
  <main>
    <div class="head">
      <h1>Master Anggota</h1>
      <button id="addButton" class="bubsbutton">Tambah</a>
    </div>
    <?php if($errors->any()): ?>
    <div class="alert">
      <p><b>Error</b></p>
      <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
    <?php endif; ?>

    <?php if(session('status')): ?>
      <div class="alert">
        <p><?php echo e(session('status')); ?></p>
      </div>
    <?php endif; ?>

    <?php if(count($anggota) > 0): ?>
    <div class="tablecontainer">
    <table>
      <tr>
        <th>No.</th>
        <th>Nama Anggota</th>
        <th>Gender</th>
        <th>Tempat Lahir</th>
        <th>Tgl. Lahir</th>
        <th>Alamat</th>
        <th>No. Telepon</th>
        <th>No. Identitas</th>
        <th>Action</th>
      </tr>

      <?php $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($ag->noAnggota); ?></td>
        <td><?php echo e($ag->namaAnggota); ?></td>
        <td><?php echo e($ag->jenisKelamin); ?></td>
        <td><?php echo e($ag->tempatLahir); ?></td>
        <td><?php echo e($ag->tanggalLahir); ?></td>
        <td><?php echo e($ag->alamat); ?></td>
        <td><?php echo e($ag->noTelepon); ?></td>
        <td><?php echo e($ag->noIdentitas); ?></td>
        <td class="actions">
          <button class="bubsbutton" onclick="edit(<?php echo e($ag->noAnggota); ?>)">Edit</button>
          <form method="POST" action=<?php echo e(route('anggota.destroy', $ag->noAnggota)); ?> class="inline">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="bubsbutton" type="submit">Hapus</button>
          </form>
        </td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    </div>
    <?php else: ?>
    <h1>Tidak ada data.</h1>
    <?php endif; ?>
  </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?>
<script>
  let closeButtonEvent = (element) => {
    let closeButton = element.getElementsByClassName('close');
    closeButton[0].addEventListener('click', () => {
      element.style.visibility = 'hidden';
    })
  }

  let showElement = (element) => {
    element.style.visibility = 'visible';
    closeButtonEvent(element);
  }
  
  let addButton = document.getElementById('addButton');
  addButton.addEventListener('click', () => {
    let addPopup = document.getElementById('addPopup');
    showElement(addPopup);
  })
  const edit = function(noAnggota) {
    let editPopup = document.getElementById('editPopup');
    getAnggotaData(noAnggota, editPopup);
  }

  const setEditElement = function(json) {
    let data = json[0];
    document.getElementById('idEdit').value = data.noAnggota;
    document.getElementById('namaAnggotaEdit').value = data.namaAnggota;
    switch (data.jenisKelamin) {
      case 'Laki-laki':
        document.getElementById('lakilakiEdit').checked = true;
        break;
      case 'Perempuan':
        document.getElementById('perempuanEdit').checked = true;
        break;
      case 'Lainnya/Tdk Disebut':
        document.getElementById('lainnyaEdit').checked = true;
        break;
    }
    document.getElementById('tempatLahirEdit').value = data.tempatLahir;
    document.getElementById('tanggalLahirEdit').value = data.tanggalLahir;
    document.getElementById('alamatEdit').value = data.alamat;
    document.getElementById('noTeleponEdit').value = data.noTelepon;
    document.getElementById('noIdEdit').value = data.noIdentitas;
    document.getElementById('pwdEdit').value = data.pwd;
  }

  const getAnggotaData = async function(noAnggota, editPopup) {
      try {
      const rootURL = '<?php echo e(URL::to('/')); ?>';
      const path = `/api/anggota/getData/${noAnggota}`;
      const url = rootURL + path;
      
      let response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        if (json) {
          console.log(json);
          setEditElement(json);
          showElement(editPopup);
        }
      }
    }
    catch (error) {
      console.log('Something has gone vewwy wrong :(( I\'m sowwy uwu');
      console.log(error);
    }
  }
</script><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/anggota/index.blade.php ENDPATH**/ ?>