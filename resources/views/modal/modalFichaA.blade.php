<body>
    <div class="modal fade" id="modalfichaa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <!--modal-dialog modal-dialog-centered se cambiael tamaño   -->
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
                            <label for="inputEmail4" class="form-label">Codigo Animal</label>
                            <input type="number" class="form-control" id="inputEmail4" name="codigo">
                      </div>
                      <!--div class="col-md-6">
                        <img id="img1"  width="370px" height="150px"><br/>
                      </div>
                      <div class="col-md-6">
                        <label for="formFile" class="form-label">Cargar Imagen</label>
                        <input class="form-control" type="file" id="inputFile1">
                      </div-->

                      <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Fecha Nacimiento</label>
                            <input type="date" class="form-control" id="inputPassword4" name="fecha">
                      </div>

                      <div class="col-md-6">
                            <label for="inputState" class="form-label">Raza</label>
                            <select class="form-control" id="inputPassword4" name="raza">
                                  <option selected>...</option>
                                 
                                  <option > </option>
                                  
                            </select>
                            <label for="inputState" class="form-label">Pureza %</label>
                               <input type="text" class="form-control" id="inputPassword4" name="fecha">

                      </div>
                      <div class="col-md-6">
                            <label for="inputState" class="form-label">Sexo</label>
                              <select class="form-control" id="inputPassword4" name="sexo">
                                    <option selected>...</option>
                                    <option>Macho</option>
                                    <option>Hembra</option>
                              </select>
                      </div>
                      <div class="col-md-6">
                        <label for="inputState" class="form-label">Etapa</label>
                          <select class="form-control" id="inputPassword4" name="sexo">
                                <option selected>...</option>
                                <option>Vaca</option>
                                <option>Toro</option>
                                <option>Ternero</option>
                                <option>Vaquilla</option>
                                <option>Novillo</option>
                          </select>
                  </div>
                      <div class="col-md-6">
                              <label for="inputEmail4" class="form-label">Origen</label>
                              <input type="text" class="form-control" id="inputEmail4" name="origen">
                      </div>
                      <!--div class="col-md-6">
                            <label for="inputState" class="form-label">Nombre de la Finca</label>
                            <input type="text" class="form-control" id="inputPassword4" name="finca">
                      </div-->
                      <div class="col-md-6">
                              <label for="inputState" class="form-label">Areas</label>
                              <select class="form-control" id="inputPassword4" name="Area">
                                <option selected>...</option>
                                  
                                  <option  >  </option>
                                  
                          </select>
                      </div>
                    <div class="col-md-6">
                            <label for="inputCity" class="form-label">Edad-Meses</label>
                            <input type="number" class="form-control" id="inputCity" name="edad">
                    </div>
                    <div class="col-md-6">
                          <label for="inputState" class="form-label">Estado de Salud</label>
                          <select class="form-control" id="inputPassword4" name="salud">
                              <option selected>...</option>
                              <option>Sano</option>
                              <option>Enfermo</option>  
                          </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputState" class="form-label">Estado de Gestacion</label>
                        <select class="form-control" id="inputPassword4" name="salud">
                              <option selected>...</option>
                              <option>Si</option>
                              <option>No</option>  
                        </select>
                   </div>
                    <div class="col-md-6">
                          <label for="inputState" class="form-label">Estado Actual</label>
                          <select class="form-control" id="inputPassword4" name="estado">
                            <option selected>...</option>   
                            <option>Disponible</option>
                            <option>Vendido</option>
                            <option>Faenado</option>
                          </select>
                    </div>
                    <div class="col-md-6">
                      <label for="inputState" class="form-label">Concebido</label>
                      <select class="form-control" id="inputPassword4" name="estado">
                            <option selected>...</option>
                            <option>Monta</option>
                            <option>Insiminacion Artificial</option>
                            <option>Embrional</option>
                      </select>
                </div>
                
                    <!--div class="col-md-6">
                          <label for="inputEmail4" class="form-label">Arbol Genealogico</label>
                              <div class="input-group mb-3">
                                      <button class="btn btn-outline-secondary" type="button" id="button-addon1"  data-toggle="modal" data-target="#modalpadre" >Buscar</button>
                                      <span class="input-group-text" id="basic-addon1">Padre</span>
                                      <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="padre" id="padre" disabled=disabled>
                                      <span class="input-group-text" id="basic-addon1">Madre</span>   
                                      <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="madre" id="madre" disabled=disabled >
                              </div>
                    </div--> 
                    <div class="col-12"></div>
                          <div class="d-grid gap-2 col-1 mx-auto">
                                <button class="btn btn-primary" type="submit">Registrar</button>
                          </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
      @include("modal.modalPadre")
      @include("modal.modalMadre")

      <script>
                  $('#modalpadre').on('shown.bs.modal', function () {
                      $('#myInput').trigger('focus')
                    });

                  $("#tablepadre").on('click', 'td', function(e) {
                      e.preventDefault();
                      var campo1 = $(this).text();
                  $(this).css("background-color", "#0989f9");
                    console.log(campo1);
                    $("#padre").val(campo1);
                  });            
                  $('#modalmadre').on('shown.bs.modal', function () {
                    $('#myInput2').trigger('focus')
                  });

                    $("#tablemadre").on('click', 'td', function(e) {
                      e.preventDefault();
                    var campo2 = $(this).text();
                    $(this).css("background-color", "#0989f9");
                    console.log(campo2);
                      $("#madre").val(campo2);
                  });
    
      </script>
       <script>
              function init() {
                    var inputFile = document.getElementById('inputFile1');
                    inputFile.addEventListener('change', mostrarImagen, false);
              }
              function mostrarImagen(event) {
                    var file = event.target.files[0];
                    var reader = new FileReader();
                    reader.onload = function(event) {
                          var img = document.getElementById('img1');
                          img.src= event.target.result;
                    }
                    reader.readAsDataURL(file);
                  }
                  window.addEventListener('load', init, false);

      </script>
  </body>