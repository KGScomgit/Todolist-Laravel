<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center">To-Do List</h2>

                <form action="<?php echo e(route('todolist.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="title" class="form-control me-2" placeholder="Tambah tugas baru..." required>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>

                <ul class="list-group">
                    <?php $__currentLoopData = $todolists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $todolist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <form action="<?php echo e(route('todolist.update', $todolist->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <input type="hidden" name="completed" value="<?php echo e($todolist->completed ? 0 : 1); ?>">
                                <button type="submit" class="btn btn-sm <?php echo e($todolist->completed ? 'btn-success' : 'btn-outline-secondary'); ?>">
                                    <?php echo e($todolist->completed ? '✓' : '⏳'); ?>

                                </button>
                            </form>
                            <span class="<?php echo e($todolist->completed ? 'text-decoration-line-through' : ''); ?>">
                                <?php echo e($todolist->title); ?>

                            </span>
                            <form action="/todolists/<?php echo e($todolist->id); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\belajar\Todolist\resources\views/todolist/index.blade.php ENDPATH**/ ?>