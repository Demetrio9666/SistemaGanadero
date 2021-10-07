
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
        height: 42px;
        background-color:  rgb(77, 188, 240);
        color: black;
        text-align: center;
        line-height: 30px;
        font-size:1em;  
    }
    .titulo1{
        text-align: center;
        margin: 2%;
        font-size:medium; 
        font-family: "Times New Roman";
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
    #izquierda{
        position: absolute;
        right: 8%;
        top: 14%;
    }
    #derecha{
        position: absolute;
        left: 8%;
        top: 14%;
    }
    .image img{
        float:left;
        /*background-image: url("../imagen/logo_vaca.png");*/
        height: 38px;
        width: 38px;
        background-size: cover;
        background-position: auto;
        margin:auto;
	
    }
    .contenedor{
        width: 230px;
        height: 50px;
        
        /* centrar vertical y horizontalmente */
        position: absolute;
        top: 2%;
        left: 40%;
        margin: -20px 0 0 -20px; 
       /* background-color: red;*/
    }
    .letra{
        width: 100px;
        height: 20px;

        /* centrar vertical y horizontalmente */
        position: absolute;
        top: 0%;
        right: 80px;
        margin: -20px 0 0 -20px; 
    

    }
    .titulo{
        color: black;
        font-size: large
    }
    thead tr {
        font-size:small;
        font-family: "Times New Roman", Times, serif;

    }
    tbody tr{
        font-size:small;
        font-family: "Times New Roman", Times, serif;
    }
   
         
</style>
<body>
    <div class="contenedor">
        <div class="image"> <img src="./imagen/logo_vaca.png" ></div>
        <div class="letra">
            <h1 class="titulo"><strong>SoftGanadoBOVINO</strong></h1>
        </div>
        
    </div>
   
    <div class="card">
        <!--header id="hacienda"><p><strong> Hacienda Jean Andrés</strong></p></header-->
        
        <div class="card-body">
            
            <div class="titulo1 "><h1> <?php echo $__env->yieldContent('nombre_tabla'); ?></h1></div>
            <label id="derecha">Impreso por : <?php echo e(auth()->user()->name); ?></label>
            <br>
            <label id="izquierda">Fecha:<?php echo e(date('Y-m-d H:i:s')); ?></label>
            
            <?php echo $__env->yieldContent('tabla'); ?>
        </div>
    </div>
      
   <!--footer><p><strong>SoftGanadoBOVINO</strong></p></footer-->

</body>

<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(370, 570, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script><?php /**PATH C:\xampp\htdocs\SistemaGanadero\resources\views/layouts/pdf.blade.php ENDPATH**/ ?>