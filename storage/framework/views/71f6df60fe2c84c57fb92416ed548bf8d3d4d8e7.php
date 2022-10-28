<?php if (isset($component)) { $__componentOriginald0b53c4de197fcb8d08b8fa159a6539aea3b862d = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\User\AddPopup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.add-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\User\AddPopup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['domId' => 'addPopup']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald0b53c4de197fcb8d08b8fa159a6539aea3b862d)): ?>
<?php $component = $__componentOriginald0b53c4de197fcb8d08b8fa159a6539aea3b862d; ?>
<?php unset($__componentOriginald0b53c4de197fcb8d08b8fa159a6539aea3b862d); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal62d1f0f8f52b5e85014c83d4dc21201df3ec42c6 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\User\EditPopup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('user.edit-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\User\EditPopup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['domId' => 'editPopup']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal62d1f0f8f52b5e85014c83d4dc21201df3ec42c6)): ?>
<?php $component = $__componentOriginal62d1f0f8f52b5e85014c83d4dc21201df3ec42c6; ?>
<?php unset($__componentOriginal62d1f0f8f52b5e85014c83d4dc21201df3ec42c6); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Layout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Layout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <main>
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
    

    <div class="head">
      <h1>User Table</h1>
      <button id="addButton" class="bubsbutton">Tambah</button>
    </div>
    <?php if(count($users) > 0): ?>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Level</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><?php echo e($user->userId); ?></td>
          <td><?php echo e($user->name); ?></td>
          <td><?php echo e($user->level); ?></td>
          <td><button class="bubsbutton" onclick="edit(<?php echo e($user->userId); ?>)">Edit</button>
            <form method="POST" action=<?php echo e(route('user.destroy', $user->userId)); ?> class="inline">
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
    getUserData(noAnggota, editPopup);
  }

  const setEditFields = function(json) {
    console.log(json);
    document.getElementById('id').value = json.userId;
    document.getElementById('nameEdit').value = json.name;
    document.getElementById('levelEdit').value = json.level;
  }

  const getUserData = async function(id, editPopup) {
    try {
      const rootUrl = "<?php echo e(URL::to('/')); ?>";
      const path = `/api/user/getData/${id}`;

      const url = rootUrl + path;
      
      let response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        setEditFields(json);
        showElement(editPopup);
      }
    }
    catch (error) {
      console.log('Oh nyo! ' + error);
    }
  }

</script><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/user/index.blade.php ENDPATH**/ ?>