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
      <h1>Pinjaman Anggota</h1>
      <a href="<?php echo e(route('pinjaman.create')); ?>"><button class="bubsbutton">Tambah</button></a>
    </div>
    <?php if(session('status')): ?>
    <div class="message">
      <p><b><?php echo e(session('status')['status']); ?></b> <?php echo e(session('status')['message']); ?></p>
    </div>
    <?php endif; ?>

    <?php if(count($pinjaman) > 0): ?>
    <div class="tablecontainer">
    <table>
      <thead>
        <tr>
          <th>No. Pinjaman</th>
          <th>Tanggal</th>
          <th>No. Anggota</th>
          <th>Lama</th>
          <th>Jumlah</th>
          <th>Bunga</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $pinjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
          <td><a href="<?php echo e(route('pinjaman.show', $p->idPinjaman)); ?>"><?php echo e($p->idPinjaman); ?></a></td>
          <td class="min-w-[9rem]"><?php echo e($p->tanggalPinjaman); ?></td>
          <td><?php echo e($p->noAnggota); ?></td>
          <td class="min-w-[6rem]"><?php echo e($p->lama); ?> bulan</td>
          <td class="min-w-[10rem]">Rp. <?php echo e($p->jumlah); ?></td>
          <td><?php echo e($p->bunga); ?>%</td>
          <td class="flex flex-row gap-1 flex-wrap">
            <form action="<?php echo e(route('pinjaman.destroy', $p->idPinjaman)); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <?php echo method_field('DELETE'); ?>
              <button action="submit" class="bubsbutton">Hapus</button>
            </form>
            <a href="<?php echo e(route('pembayaran.index', $p->idPinjaman)); ?>" class="bubsbutton">Bayar</a>
          </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
    </div>
    <?php endif; ?>
  </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/pinjaman/index.blade.php ENDPATH**/ ?>