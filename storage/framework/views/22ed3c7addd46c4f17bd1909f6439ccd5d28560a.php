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
    <div class="head">
    <h1>Pengambilan</h1>
    </div>
    <div class="box w-[21rem]">
      <form class="flex flex-col gap-2" action="<?php echo e(route('pengambilan.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('POST'); ?>
        <div>
          <label>No. Anggota:</label>
          <div class="flex flex-row gap-1">
            <input type="text" id="noAnggota" name="noAnggota" />
            <button type="button" id="search" class="bubsbutton">Cari</button>
          </div>
        </div>
        <div>
          <label>Tgl. Pengambilan:</label>
          <input type="date" id="tanggalPengambilan" name="tanggalPengambilan" />
        </div>
        <div>
          <label>Jumlah</label>
          <input type="number" id="jumlah" name="jumlah" />
        </div>
        <button type="submit" class="bubsbutton">Tambah</button>
      </form>
    </div>
  </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?>
<script>
  let searchButton = document.getElementById('search');
  searchButton.addEventListener('click', () => {
    window.location.replace(window.location + '/search/' + document.getElementById('noAnggota').value);
  })
</script><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/pengambilan/index.blade.php ENDPATH**/ ?>