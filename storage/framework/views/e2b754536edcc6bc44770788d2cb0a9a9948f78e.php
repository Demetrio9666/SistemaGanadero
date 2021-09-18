

<?php $layoutHelper = app('\JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper'); ?>

<?php if($layoutHelper->isLayoutTopnavEnabled()): ?>
    <?php ( $def_container_class = 'container' ); ?>
<?php else: ?>
    <?php ( $def_container_class = 'container-fluid' ); ?>
<?php endif; ?>

<?php $__env->startSection('adminlte_css'); ?>
    <link href="<?php echo e(asset('css/app.css')); ?>"> 
    <link rel="stylesheet" type="text/css" href="<?php echo e(('/css/tabla.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('/css/reloj.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('datatables/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('datatables/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('Buttons-1.7.1/css/buttons.bootstrap4.min.css')); ?>">
   
    
    <?php echo $__env->yieldPushContent('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('classes_body', $layoutHelper->makeBodyClasses()); ?>

<?php $__env->startSection('body_data', $layoutHelper->makeBodyData()); ?>

<?php $__env->startSection('body'); ?>

    <div class="wrapper">

        
        <?php if($layoutHelper->isLayoutTopnavEnabled()): ?>
            <?php echo $__env->make('adminlte::partials.navbar.navbar-layout-topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php else: ?>
            <?php echo $__env->make('adminlte::partials.navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if(!$layoutHelper->isLayoutTopnavEnabled()): ?>
            <?php echo $__env->make('adminlte::partials.sidebar.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <div class="content-wrapper <?php echo e(config('adminlte.classes_content_wrapper') ?? ''); ?>">

            
            <div class="content-header">
                <div class="<?php echo e(config('adminlte.classes_content_header') ?: $def_container_class); ?>">
                    <?php echo $__env->yieldContent('content_header'); ?>
                </div>
            </div>

            
            <div class="content">
                <div class="<?php echo e(config('adminlte.classes_content') ?: $def_container_class); ?>">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

        </div>

        
        <?php if (! empty(trim($__env->yieldContent('footer')))): ?>
            <?php echo $__env->make('adminlte::partials.footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        
        <?php if(config('adminlte.right_sidebar')): ?>
            <?php echo $__env->make('adminlte::partials.sidebar.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/jquery.validate.min.js')); ?>"></script>

    
    <script src="<?php echo e(asset('datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/sweetalert2.all.min.js')); ?>"></script> 
    <script src="<?php echo e(asset('datatables/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('datatables/dataTables.responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('JSZip-2.5.0/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('pdfmake-0.1.36/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('pdfmake-0.1.36/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('Buttons-1.7.1/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Buttons-1.7.1/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Buttons-1.7.1/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('Buttons-1.7.1/js/buttons.bootstrap4.min.js')); ?>"></script>
    

    
    <script>
        $('#tabla').DataTable({
            responsive: true,
          "language": {
             "lengthMenu": "Mostrar "+
             `<select class="custom-select custom-selec form-control form-control">
                     <option value = '10' >10</option> 
                     <option  value = '25' >25</option>
                     <option  value = '50' >50</option>
                     <option  value = '100' >100</option>
                     <option  value =  '-1'>All</option>
             </select>`
             +" Registro por Página",
             "zeroRecords": "Resultados No encontrados -Disculpe",
             "info": "Mostrando la página _PAGE_ de _PAGES_",
             "infoEmpty": "No records available",
             "infoFiltered": "(Filtrado de  _MAX_ Registros Totales)",
             'search': "Buscar:",
             'paginate':{
                 'next':'Siguiente',
                 'previous':'Anterior'
             }
         },

        });

       
  
        

     </script>
      <?php if(session('eliminar') == 'ok'): ?>
      <script>
           Swal.fire(
                      '¡Eliminado!',
                      'El registro fue eliminado.',
                      'success'
                      )      
      </script>
        <?php endif; ?>
  <script>
      $('.formulario-eliminar').submit(function(e){
          e.preventDefault();
            Swal.fire({
                      title: 'Está seguro?',
                      text: "Este registro se eliminara definitivamente",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: '¡Si, Eliminar!',
                      concelButtonText: 'Cancelar'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      this.submit();
                  }
          }) 
      });

      function actual() {
         fecha=new Date(); //Actualizar fecha.
         hora=fecha.getHours(); //hora actual
         minuto=fecha.getMinutes(); //minuto actual
         segundo=fecha.getSeconds(); //segundo actual
         if (hora<10) { //dos cifras para la hora
            hora="0"+hora;
            }
         if (minuto<10) { //dos cifras para el minuto
            minuto="0"+minuto;
            }
         if (segundo<10) { //dos cifras para el segundo
            segundo="0"+segundo;
            }
         //ver en el recuadro del reloj:
         mireloj = hora+" : "+minuto+" : "+segundo;	
				 return mireloj; 
         }

        

        function actualizar() { //función del temporizador
          mihora=actual(); //recoger hora actual
          mireloj=document.getElementById("reloj"); //buscar elemento reloj
          mireloj.innerHTML=mihora; //incluir hora en 
        }
   setInterval(actualizar,1000); //iniciar temporizador
  </script>
    

  
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vendor/adminlte/page.blade.php ENDPATH**/ ?>