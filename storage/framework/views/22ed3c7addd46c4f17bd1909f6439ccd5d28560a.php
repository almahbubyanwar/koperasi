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
    <?php if (isset($component)) { $__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Status::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\Status::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4)): ?>
<?php $component = $__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4; ?>
<?php unset($__componentOriginal2db42a9094af8c45b35737ea3527d3c0817d84c4); ?>
<?php endif; ?>
    <div class="flex flex-row flex-wrap gap-4">
      <div class="box w-[21rem] flex-shrink-0">
        <form class="flex flex-col gap-2" action="<?php echo e(route('pengambilan.store')); ?>" method="POST">
          <?php echo csrf_field(); ?>
          <?php echo method_field('POST'); ?>
          <div>
            <label>No. Anggota</label>
            <div class="flex flex-row gap-1">
              <input type="text" id="noAnggotaField" name="noAnggota" value="<?php echo e(isset($anggota) ? $anggota->noAnggota : ""); ?>"/>
              <button type="button" id="search" class="bubsbutton">Cari</button>
            </div>
          </div>
          <div>
            <label>Tgl. Pengambilan</label>
            <input type="date" id="tanggalPengambilan" name="tanggalPengambilan" />
          </div>
          <div>
            <label>Jenis Simpanan</label>
            <select name="idJenis" id="idJenis">
              <?php if(isset($jenis)): ?>
                <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($j->idJenis); ?>"><?php echo e($j->namaJenis); ?></option>      
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endif; ?>
            </select>
          </div>
          <div>
            <label>Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" />
          </div>
          <button type="submit" class="bubsbutton">Tambah</button>
        </form>
      </div>

      <?php if(isset($search)): ?>
          <div class="flex flex-col flex-wrap gap-4">
            <div class="box w-fit h-fit max-w-full">
              <?php if(isset($anggota)): ?>
                <h2>Data Anggota</h2>
                <div class="[&>p]:leading-snug">
                  <p>No. Anggota: <?php echo e($anggota->noAnggota); ?></p>
                  <p>Nama Anggota: <?php echo e($anggota->namaAnggota); ?></p>
                  <p>Jumlah Simpanan: </p>
                  <ul>
                  <?php $__currentLoopData = $simpanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><p><?php echo e($simp->namaJenis); ?>: Rp. <?php echo e($simp->jumlah); ?></p></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div>
              <?php endif; ?>
              <?php if(isset($nop)): ?>
                <h1>Anggota Tidak Ditemukan.</h1>
              <?php endif; ?>
            </div>

            <?php if(count($pengambilan) > 0): ?>
              <div class="box w-fit h-fit max-w-full">
                <h2>Histori Pengambilan</h2>
                <div class="tablecontainer">
                <table>
                  <thead>
                    <tr>
                      <th>Kode Pengambilan</th>
                      <th>Tanggal Pengambilan</th>
                      <th>No. Anggota</th>
                      <th>Jumlah Pengambilan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $pengambilan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td><?php echo e($p->idPengambilan); ?></td>
                        <td><?php echo e($p->tanggalPengambilan); ?></td>
                        <td><?php echo e($p->noAnggota); ?></td>
                        <td>Rp. <?php echo e($p->jumlah); ?></td>
                      </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
                </table>
                </div>
              </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
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
    window.location.replace(window.location.origin + '/pengambilan/search/' + document.getElementById('noAnggotaField').value);
  })

  let anggotaInput = document.getElementById('noAnggotaField');
  anggotaInput.addEventListener('input', () => {
    getJenis(anggotaInput.value);
  })

  async function getJenis(id) {
    const jenisBox = document.getElementById('idJenis')
    const rootUrl = "<?php echo e(URL::to('/')); ?>";
    const path = `/api/simpanan/getJenis/${id}`;
    const url = rootUrl + path;

    try {
      const response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        if (json) {
          jenisBox.innerHTML = "";
          for (item of json) {
            let option = document.createElement("option");
            option.text = item.namaJenis;
            option.value = item.idJenis;
            jenisBox.add(option);
          }
        }
      }
    }
    catch(error) {
      console.log('Oh nyo! ' + error);
    }
  }
</script><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/pengambilan/index.blade.php ENDPATH**/ ?>