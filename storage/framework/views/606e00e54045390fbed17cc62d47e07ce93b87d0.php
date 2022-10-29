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
    <div class="flex flex-row align-center gap-4 mb-4">
      <a href="<?php echo e(route('pinjaman.index')); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" style="width: 1.5em; height: auto;"><!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#FAFAFA" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></a>
        <h1>Pembayaran</h1>
    </div>
    <?php if(session('status')): ?>
    <div class="message">
      <p><b><?php echo e(session('status')['status']); ?></b> <?php echo e(session('status')['message']); ?></p>
    </div>
    <?php endif; ?>
    <div>
      <div id="datapinjaman" class="max-w-[20em] box">
        <h2>Data Pinjaman</h2>
        <p>No. Pinjaman: <?php echo e($dataPinjaman->idPinjaman); ?></p>
        <p>Tanggal Pinjaman: <?php echo e($dataPinjaman->tanggalPinjaman); ?></p>
        <p>Nama Peminjam: <?php echo e($dataAnggota->namaAnggota); ?></p>
        <p>Jumlah Pinjaman: Rp. <?php echo e($dataPinjaman->jumlah); ?>,-</p>
      </div>
      <div class="box mt-5">
        <div class="tablecontainer">
          <table>
            <thead>
              <tr>
                <th>Cicilan ke-</th>
                <th>Angsuran</th>
                <th>Bunga</th>
                <th>Total</th>
                <th>Tgl. Bayar</th>
                <th>Jml. Terbayar</th>
                <th>Sisa</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $__currentLoopData = $dataDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($det->cicilan); ?></td>
                <td>Rp. <?php echo e($det->angsuran); ?>,-</td>
                <td>Rp. <?php echo e($det->bunga); ?>,-</td>
                <td>Rp. <?php echo e($det->angsuran + $det->bunga); ?>,-</td>
                <form action="<?php echo e(route('pembayaran.bayar', ['idPinjaman'=>$dataPinjaman->idPinjaman, 'idDetail'=>$det->idDetail])); ?>" method="POST">
                  <?php echo method_field('PUT'); ?>
                  <?php echo csrf_field(); ?>
                <td>
                  <input type="date" id="tanggalPembayaran" name="tanggalPembayaran"
                  value=<?php echo e($det->tanggalPembayaran); ?> />
                </td>
                <td>
                  <input type="number" id="jumlahTerbayar" name="jumlahPembayaran" 
                  class="max-w-fit" value="<?php echo e($det->jumlahPembayaran); ?>"/>
                </td>
                <td>
                  <?php echo e(($det->angsuran + $det->bunga) - $det->jumlahPembayaran); ?>

                </td>
                <td>
                  <button action="submit" class="bubsbutton">Tambah</button>
                </td>
                </form>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30)): ?>
<?php $component = $__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30; ?>
<?php unset($__componentOriginalba35371caef1eeddf45260937599d5fd5fb5dd30); ?>
<?php endif; ?><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/pinjaman/pembayaran/index.blade.php ENDPATH**/ ?>