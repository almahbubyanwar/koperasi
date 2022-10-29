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
      <h1>Simpanan</h1>
    </div>
    <?php if(session('status')): ?>
    <div class="alert">
      <p><?php echo e(session('status')); ?></p>
    </div>
    <?php endif; ?>
    <div id="container" class="flex flex-row gap-4">
      <div class="flex flex-col flex-wrap gap-4 flex-grow-0 flex-shrink-0 basis-[19em]"> 
        <div id="add" class="w-full flex flex-column gap-2 box">
          <form action=<?php echo e(route('simpanan.store')); ?> method="POST" >
            <?php echo csrf_field(); ?>
            <div>
              <label for="nomorAnggota">No. Anggota</label>
              <input type="text" id="noAnggota" name="noAnggota" 
              <?php if(isset($userId)): ?>
              value="<?php echo e($userId); ?>"
              <?php endif; ?>
              />
            </div>
            <div>
              <label for="tanggal">Tanggal</label>
              <input type="date" id="tanggal" name="tanggal">
            </div>
            <div>
              <label for="idJenis">Jenis Simpanan</label>
              <select name="idJenis" id="idJenis">
                <option value="" hidden disabled selected>Pilih jenis...</option>
                <?php $__currentLoopData = $jenis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value=<?php echo e($j->idJenis); ?>><?php echo e($j->namaJenis); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div>
              <p id="jumlah">Jumlah: </p>
            </div>
            <div>
              <button type="submit" class="bubsbutton">Tambah</button>
            </div>
          </form>
        </div>
        <div class="h-fit flex flex-col gap-1 box w-full">
          <p id="namaOutput">Nama: </p>
          <p id="jenisKelaminOutput">Jenis Kelamin: </p>
          <p id="tglLahirOutput">TTL: </p>
          <p id="alamatOutput">Alamat: </p>
          <button id="cari" class="bubsbutton" disabled>Cari</button>
        </div>
      </div>
      <div class="box w-full max-w-full h-fit">
          <h1>Tabel</h1>
          <?php if(count($simpanan) > 0): ?> 
          <div class="tablecontainer">
            <table class="w-fit">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tanggal</th>
                  <th>No. <br>Anggota</th>
                  <th>Jenis</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $simpanan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $simp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($simp->idSimpanan); ?></td>
                  <td class="min-w-[5rem]"><?php echo e($simp->tanggal); ?></td>
                  <td><?php echo e($simp->noAnggota); ?></td>
                  <td><?php echo e($simp->namaJenis); ?></td>
                  <td>Rp. <?php echo e($simp->jumlah); ?></td>
                  <td>
                    <form action="<?php echo e(route('simpanan.destroy', $simp->idSimpanan)); ?>" method="POST"
                      class="inline-block">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <button type="submit" class="bubsbutton">Hapus</button>
                    </form>
                  </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          <?php endif; ?>
        </div>
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
  const anggotaField = document.getElementById('noAnggota');

  async function getAnggota(id) {
    const rootUrl = "<?php echo e(URL::to('/')); ?>";
    const path = `/api/anggota/getData/${id}`;
    const url = rootUrl + path;

    try {
      const response = await fetch(url);
      if (response.ok) {
        let json = await response.json();
        json = json[0];
        if (json) {
          console.log(json);
          document.getElementById('namaOutput').innerText = `Nama: ${json.namaAnggota}`;
          document.getElementById('jenisKelaminOutput').innerText = `Jenis Kelamin: ${json.jenisKelamin}`;
          document.getElementById('tglLahirOutput').innerText = `TTL: ${json.tempatLahir}, ${json.tanggalLahir}`;
          document.getElementById('alamatOutput').innerText = `Alamat: ${json.alamat}`;
          
          const cariButton = document.getElementById('cari');
          cariButton.disabled = false;
          cariButton.addEventListener('click', () => {
            location = location.origin + '/simpanan/search/' + anggotaField.value;
          })
        }
      }
    }
    catch(error) {
      console.log('Oh nyo! ' + error);
    }
  }

  async function getJumlah(id) {
    const rootUrl = "<?php echo e(URL::to('/')); ?>";
    const path = `/api/jenissimpanan/getData/${id}`;
    const url = rootUrl + path;
    try {
      const response = await fetch(url);
      if (response.ok) {
        const json = await response.json();
        const jumlahField = document.getElementById('jumlah');
        jumlahField.innerText = "Jumlah: " + json.jumlah;
      }
      else {
        console.log('oh nyo!');
      }
    }
    catch (error) {
      console.log('Oh nyo! ' + error);
    }
  }

  anggotaField.addEventListener('input', () => {
    getAnggota(anggotaField.value);
  })

  const jenisOption = document.getElementById('idJenis');
  jenisOption.addEventListener('change', () => {
    getJumlah(jenisOption.value);
  })
</script><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/simpanan/index.blade.php ENDPATH**/ ?>