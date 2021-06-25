
<body>
    <div class="modal fade" id="modalvacunacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Padre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:100%">
                <form  class="row g-3">
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Fecha Vacunacion</label>
                                <input type="date" class="form-control" id="inputPassword4">
                            </div>
                        
                            <div class="col-md-6">
                                <label for="inputEmail4" class="form-label">Animal </label>
                                <div class="input-group mb-3">   
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalanimales" >Buscar</button>
                                    <span class="input-group-text" id="basic-addon1">Codigo</span>
                                    <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="animales" id="animales" disabled=disabled >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Vacuna</label>
                                <input type="text" class="form-control" id="inputPassword4">
                            </div>
                        
                            <div class="col-md-6">
                                <label for="inputPassword4" class="form-label">Fecha Re-Vacunacion</label>
                                <input type="text" class="form-control" id="inputPassword4">
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
      @include("modal.modalAnimales")
      <script> 
        $('#modalanimales').on('shown.bs.modal', function () {
        $('#myInput2').trigger('focus')
       });
       //data
        $("#tableanimales").on('click', 'td', function(e) {
          e.preventDefault();
         var campo2 = $(this).text();
          //Cambiando de color la celda
        $(this).css("background-color", "#0989f9");
        console.log(campo2);
          $("#animales").val(campo2);
         //alert(renglon);
      });</script>


  </body>


