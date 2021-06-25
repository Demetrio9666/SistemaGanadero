<body>
    <div class="modal fade" id="modalreproduccion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <!--modal-dialog modal-dialog-centered se cambiael tamaño  cuerpoo -->
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle"></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:100%">
                <form  class="row g-3">
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Fecha del Registro</label>
                                    <input type="text" class="form-control" id="inputEmail4">
                                </div>
                        
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Codigo del Animal (Madre)</label>
                                        <div class="input-group mb-3">
                                            <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalmadreParto" >Buscar</button>
                                            <span class="input-group-text" id="basic-addon1">Madre</span>
                                            <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="madre" id="madre" disabled=disabled >
                                        </div>
                                </div>
                                <div class="col-md-6" style="display: none;" id="padre">
                                  <label for="inputEmail4" class="form-label">Codigo del Animal (Padre)</label>
                                      <div class="input-group mb-3">
                                          <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalmadreParto" >Buscar</button>
                                          <span class="input-group-text" id="basic-addon1">Madre</span>
                                          <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="madre" id="madre" disabled=disabled >
                                      </div>
                              </div>

                               
                              </div>
                                <div class="col-md-6">
                                    <label for="inputEmail4" class="form-label">Tipo de Reproduccion</label>
                                    <select class="form-control" id="inputPassword4" name="estado" onChange="mostrar(this.value)">
                                      <option selected>...</option>
                                      <option id="Monta" >Monta</option>
                                      <option id="Insiminacion">Insiminacion Artificial</option>
                                      <option>Embrional</option>
                                </select>
                                </div>                
                        
                                <div class="col-12"></div>
                                     <div class="d-grid gap-2 col-1 mx-auto">
                                      <button class="btn btn-primary" type="submit" style="margin: 10px">Registrar</button>
                                     </div>
                                </div>
            
                </form>

            </div>
          </div>
        </div>
    </div>

           @include("modal.modalMadreParto")

           
   
   
<script>
        $('#modalmadreParto').on('shown.bs.modal', function () {
         $('#myInput2').trigger('focus')
        });
        //data
         $("#tablemadre").on('click', 'td', function(e) {
           e.preventDefault();
          var campo2 = $(this).text();
           //Cambiando de color la celda
         $(this).css("background-color", "#0989f9");
         console.log(campo2);
           $("#madre").val(campo2);
          //alert(renglon);
       });
       </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript">

function mostrar(id) {
    if (id == "Monta") {
        $("#padre").show();
        
    }else{
      $("#padre").hide();
    }
 
}
</script>

  </body>