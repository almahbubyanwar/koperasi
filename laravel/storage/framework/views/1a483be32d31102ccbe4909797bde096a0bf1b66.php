<?php if (isset($component)) { $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Layout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Layout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($component)) { $__componentOriginal9a54557c2ee3407b0c5e850f949365f82cb0b622 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\JenisSimpanan\AddPopup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jenis-simpanan.add-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\JenisSimpanan\AddPopup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['domId' => 'addPopup']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9a54557c2ee3407b0c5e850f949365f82cb0b622)): ?>
<?php $component = $__componentOriginal9a54557c2ee3407b0c5e850f949365f82cb0b622; ?>
<?php unset($__componentOriginal9a54557c2ee3407b0c5e850f949365f82cb0b622); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal21e1fcefaccd81c8cdba5f066057a53bb979c09a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\JenisSimpanan\EditPopup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('jenis-simpanan.edit-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\JenisSimpanan\EditPopup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['domId' => 'editPopup']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal21e1fcefaccd81c8cdba5f066057a53bb979c09a)): ?>
<?php $component = $__componentOriginal21e1fcefaccd81c8cdba5f066057a53bb979c09a; ?>
<?php unset($__componentOriginal21e1fcefaccd81c8cdba5f066057a53bb979c09a); ?>
<?php endif; ?>
  <main>
    <div class="head">
      <h1>Jenis Simpanan</h1>
      <button class="bubsbutton" id="addButton">Tambah</button>
    </div>

    <?php if(count($jenis) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Jumlah</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($jn->idJenis); ?></td>
            <td><?php echo e($jn->namaJenis); ?></td>
            <td><?php echo e($jn->jumlah); ?></td>
            <td><button id="editButton" class="bubsbutton" onclick="edit(<?php echo e($jn->idJenis); ?>)">Edit</button>
              <form action="<?php echo e(route('jenissimpanan.destroy', $jn->idJenis)); ?>" method="POST" style="display: inline;">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="bubsbutton" type="submit">Hapus</button>
              </form>
            </td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    <?php endif; ?>
  </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?>
<script>
    const showElement = (element) => {
    element.style.visibility = 'visible';
    closeButtonEvent(element);
  }
  
  const addButton = document.getElementById('addButton');
  addButton.addEventListener('click', () => {
    let addPopup = document.getElementById('addPopup');
    showElement(addPopup);
  })

  function setEditFields(json, element) {
    console.log(element);
    document.getElementById('idJenis').value = json.idJenis;
    document.getElementById('namaJenisEdit').value = json.namaJenis;
    document.getElementById('jumlahEdit').value = json.jumlah;
    showElement(element);
  }

    async function getJenis(id, element) {
      const rootURL = "<?php echo e(URL::to('/')); ?>";
      const path = `/api/jenissimpanan/getData/${id}`;
      const url = rootURL + path;

      try {
        let response = await fetch(url);
        if (response.ok) {
          let json = await response.json();
          console.log(json);
          console.log('element: ' + element)
          setEditFields(json, element)
        }
      }
      catch (error) {
        console.log("Oh nyo! " + error)
      }
    }

    let closeButtonEvent = (element) => {
    let closeButton = element.getElementsByClassName('close');
    closeButton[0].addEventListener('click', () => {
      element.style.visibility = 'hidden';
    })
  }

  function edit(id) {
    let editPopup = document.getElementById('editPopup');
    getJenis(id, editPopup);
  }
</script><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/jenissimpanan/index.blade.php ENDPATH**/ ?>