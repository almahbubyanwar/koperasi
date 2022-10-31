<?php if(session('status')): ?>
<div class="message">
  <p><b><?php echo e(session('status')['status']); ?></b> <?php echo e(session('status')['message']); ?></p>
</div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert">
  <p><b>Error</b></p>
  <ul>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</div>
<?php endif; ?><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/components/status.blade.php ENDPATH**/ ?>