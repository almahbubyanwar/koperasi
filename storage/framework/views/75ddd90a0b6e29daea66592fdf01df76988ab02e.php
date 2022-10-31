<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php echo app('Illuminate\Foundation\Vite')('resources/css/app.css'); ?>
  <title>Login</title>
</head>
<body id="login">
  <div id="loginpagecontainer" class="flex justify-center items-center min-w-[100vw]">
    <div class="box w-full max-w-[20rem]">
      <h1>Login</h1>
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
      <form action="<?php echo e(route('login')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div>
          <label for="name">Username</label>
          <input type="text" id="name" name="name" autofocus 
          placeholder="Masukkan username..."
          />
        </div>
        <div>
          <label for="password">Password</label>
          <input type="password" id="password" name="password" 
          placeholder="Masukkan password..." />
        </div>
        <button action="submit" class="bubsbutton">Login</button>
      </form>
    </div>
  </div>
</body>
</html><?php /**PATH C:\Users\Mabubi\Documents\Personal Files and Projects\Codes\homework\laravel\koperasi\resources\views/login.blade.php ENDPATH**/ ?>