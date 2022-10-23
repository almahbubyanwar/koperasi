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
    <div style="display: flex; align-items: center; gap: 1em; margin-bottom: 1em;">
      <a href="<?php echo e(route('pinjaman.index')); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 1.5em; height: auto;"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#FAFAFA" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></a>
        <h1>Tambah</h1>
    </div>

    <?php if(session('status')): ?>
    <div class="message">
      <p><b><?php echo e(session('status')['status']); ?></b> <?php echo e(session('status')['message']); ?></p>
    </div>
    <?php endif; ?>

    <form action=<?php echo e(route('pinjaman.store')); ?> method="POST">
      <?php echo csrf_field(); ?>
      <div>
        <label>No. Anggota</label>
        <input type="text" id="noAnggota" name="noAnggota" />
      </div>
      <div>
        <label>Tanggal Pinjaman</label>
        <input type="date" id="tanggalPinjaman" name="tanggalPinjaman" />
      </div>
      <div>
        <label>Lama Peminjaman (bulan)</label>
        <select id="lama" name="lama">
          <option value="3">3 bulan</option>
          <option value="6">6 bulan</option>
          <option value="12">12 bulan</option>
        </select>
      </div>
      <div>
        <label>Bunga (%)</label>
        <input type="number" id="bunga" name="bunga" />
      </div>
      <div>
        <label>Jumlah</label>
        <input type="number" id="jumlah" name="jumlah" style="max-width: 20em" />
      </div>
      <button type="submit" class="bubsbutton">Tambah</button>
    </form>
  </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/pinjaman/create.blade.php ENDPATH**/ ?>