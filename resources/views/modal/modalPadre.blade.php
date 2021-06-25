
<body>
    <div class="modal fade" id="modalpadre" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <!--modal-dialog modal-dialog-centered se cambiael tamaño  cuerpoo -->
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Padre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="width:100%">
                @include('tablas.tablaPadre')
            </div>
            <!--div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Guardar</button>
            </div-->
          </div>
        </div>
      </div>
  </body>