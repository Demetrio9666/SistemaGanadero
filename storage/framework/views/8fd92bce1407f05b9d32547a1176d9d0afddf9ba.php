<li <?php if(isset($item['id'])): ?> id="<?php echo e($item['id']); ?>" <?php endif; ?> class="nav-item">

    <a class="nav-link <?php echo e($item['class']); ?>" href="<?php echo e($item['href']); ?>"
       <?php if(isset($item['target'])): ?> target="<?php echo e($item['target']); ?>" <?php endif; ?>
       <?php echo $item['data-compiled'] ?? ''; ?>>





        
        <?php if(isset($item['icon'])): ?>
            <i class="<?php echo e($item['icon']); ?> <?php echo e(isset($item['icon_color']) ? 'text-' . $item['icon_color'] : ''); ?>"></i>
        <?php endif; ?>

        
        <?php echo e($item['text']); ?>



        
        <?php if(isset($item['label'])): ?>
            <span class="badge badge-<?php echo e($item['label_color'] ?? 'primary'); ?>">
                <?php echo e($item['label']); ?>

            </span>
        <?php endif; ?>

    </a>

</li>


<!--script>
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
            mireloj.innerHTML=mihora; //incluir hora en elemento
                }
            setInterval(actualizar,1000); //iniciar temporizador
</script--><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/vendor/adminlte/partials/navbar/menu-item-link.blade.php ENDPATH**/ ?>