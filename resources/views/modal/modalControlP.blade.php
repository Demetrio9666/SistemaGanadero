<body>
    <div class="modal fade" id="modalcontrolp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <!--modal-dialog modal-dialog-centered se cambiael tamaño   -->
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Nueva Registro</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:100%">
                <form  class="row g-3">
                    <div class="col-md-6">
                         <label for="inputPassword4" class="form-label">Fecha de Registro</label>
                         <input type="date" class="form-control" id="inputPassword4">
                     </div>
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">Codigo del Animal</label>
                      <input type="text" class="form-control" id="inputPassword4">
                    </div>
                
                    <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Peso Kg</label>
                    <input type="text" class="form-control" id="inputPassword4">
                    </div>
            
                  <div class="col-md-6">    
                  </div>
                  
                  <div class="col-12"></div>
                  <div class="d-grid gap-2 col-1 mx-auto">
                    <button class="btn btn-primary" style="margin: 10px" type="submit">Registrar</button>
                  </div>
                </form>
            </div>
            <!--div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Guardar</button>
            </div-->
          </div>
      </div>
  </body>