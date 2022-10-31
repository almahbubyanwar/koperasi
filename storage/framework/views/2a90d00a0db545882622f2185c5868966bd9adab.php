<?php if (isset($component)) { $__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Popup::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Popup::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
  <h1>Input</h1>
  <form action="<?php echo e(route('jenissimpanan.store')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div>
      <label for="namaJenis">Nama</label>
      <input type="text" id="namaJenis" name="namaJenis">
    </div>
    <div>
      <label for="namaJenis">Jumlah</label>
      <input type="text" id="jumlah" name="jumlah">
    </div>
    <button type="submit" class="bubsbutton">Submit</button>
  </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8)): ?>
<?php $component = $__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8; ?>
<?php unset($__componentOriginalf07d3144b68f55b28b7fd7d35e351c51265924a8); ?>
<?php endif; ?><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/components/jenis-simpanan/add-popup.blade.php ENDPATH**/ ?>