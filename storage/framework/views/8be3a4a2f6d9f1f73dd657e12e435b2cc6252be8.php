
<style>
    .table thead{
                 background-color: rgb(98, 198, 245);              
    }
    .table{
       /*border: 1px solid*/
        
    }
    .table td{
        text-align: center;
        border-bottom: 1px solid black;
    }

    tbody tr:nth-child(even){
        background: rgb(215, 231, 241);
    }

    header{
        position: fixed;
        top: 0cm;
        left: 0cm;
        right: 0cm;
        height: 39px;
        background-color:  rgb(77, 188, 240);
        color: black;
        text-align: center;
        line-height: 30px;
        font-size:1em;  
    }
    .titulo{
        text-align: center;
        margin: 4%;
    }
    footer{
        position: fixed;
        bottom: 0cm;
        left: 0cm;
        right: 0cm;
        height: 25px;
        background-color:  rgb(77, 188, 240);
        color: black;
        text-align: center;
        line-height: 30px;
    }
    
</style>
<body>
    
   
    <div class="card">
        <header><p><strong>Hacienda Jean Andrés</strong></p></header>
        
        <div class="card-body">
            
            <div class="titulo "><h1> <?php echo $__env->yieldContent('nombre_tabla'); ?></h1></div>
            <label>Impreso por : <?php echo e(auth()->user()->name); ?></label>
            
            <?php echo $__env->yieldContent('tabla'); ?>
        </div>
    </div>
      
<!--footer><p><strong>SoftGanadoBOVINO</strong></p></footer-->

</body>

<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(370, 570, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 12);
        ');
    }
</script><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/layouts/pdf.blade.php ENDPATH**/ ?>