<head>
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
            height: 50px;
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
            height: 50px;
            background-color:  rgb(77, 188, 240);
            color: black;
            text-align: center;
            line-height: 30px;
        }
    
      

    </style>
    
</head>
<body>
    <header><p><strong>Hacienda Jean Andrés</strong> </p></header>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Fichas de Reproducción por Monta Natural Interna</h1></div>
            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
               
                <thead>            
                        <tr>
                            <th>Fecha de Registro</th>
                            <th>Código del Animal</th>
                            <th>Raza </th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Código del Animal</th>
                            <th>Raza</th>
                            <th>Edad</th>
                            <th>Sexo</th>
                            <th>Estado Actual</th> 
                            <th>Acción</th>
                        </tr> 
                       
                </thead>
                <tbody>  
                    @foreach ($re_MI as $i)         
                    <tr>
                        <td>{{$i->fecha_MI}}</td>
                        <td>{{$i->animal_h_MI}}</td>
                        <td>{{$i->raza_h_MI}}</td>
                        <td >{{$i->edad_h}}</td>
                        <td >{{$i->sexo_h}}</td>
                        <td>{{$i->animal_m_MI}}</td>
                        <td>{{$i->raza_m_MI}}</td>
                        <td>{{$i->edad_m}}</td>
                        <td >{{$i->sexo_m}}</td>
                        <td >{{$i->actual_state}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<footer><p><strong>SoftGanadoBOVINO</strong></p></footer>
</body>