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
            <div class="titulo "><h1>Fichas de Reproducción por Monta Natural Externa</h1></div>
            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
               
                <thead>            
                    <tr>
                        <th>Fecha de Registro</th>
                        <th>Código Animal</th>
                        <th>Raza</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Código Externo</th>
                        <th>Raza</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Hacienda</th>
                        <th>Estado Actual</th>
                       
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($ext as $i)         
                    <tr>
                        <td >{{$i->date}}</td>
                        <td>{{$i->animalCode}}</td>
                        <td>{{$i->raza}}</td>
                        <td>{{$i->edad}}</td>
                        <td>{{$i->sexo}}</td>
                        <td>{{$i->animalCode_Exte}}</td>
                        <td>{{$i->race_d}}</td>
                        <td>{{$i->age_month}}</td>
                        <td>{{$i->sex}}</td>
                        <td>{{$i->hacienda_name}}</td>
                        <td >{{$i->actual_state}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<footer><p><strong>SoftGanadoBOVINO</strong></p></footer>
</body>