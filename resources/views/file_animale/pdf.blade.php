 <head>
    <style>
        .table thead{
                     background-color: rgb(98, 198, 245);              
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
            height: 24px;
            background-color:  rgb(77, 188, 240);
            color: black;
            text-align: center;
            line-height: 10px;
        }
    </style>
    
</head>
<body>
    <header><p><strong>Hacienda Jean Andrés</strong> </p></header>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1>Fichas de Animales</h1></div>
            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
               
                <thead>            
                    <tr>
                        <th >Código Animal</th>
                        <th >Fecha Nacimiento</th>
                        <th >Raza</th>
                        <th >Sexo</th>
                        <th >Etapa</th>
                        <th >Origen</th>
                        <th >Edad Meses</th>
                        <th >Salud</th>
                        <th >Embarazo</th>
                        <th >Localización</th>
                        <th >Estado Actual</th> 
                        <th >Concebido</th>  
                       
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($animal as $i)          
                    <tr>
                        <td >{{$i->animalCode}}</td>
                        <td >{{$i->date}}</td>
                        <td >{{$i->raza}}</td>
                        <td >{{$i->sex}}</td>
                        <td >{{$i->stage}}</td>
                        <td >{{$i->source}}</td>
                        <td >{{$i->age_month}}</td>
                        <td >{{$i->health_condition}}</td>
                        <td >{{$i->gestation_state}}</td>
                        <td >{{$i->ubicacion}}</td>
                        <td >{{$i->actual_state}}</td>
                        <td >{{$i->conceived}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<footer><p><strong>SoftGanadoBOVINO</strong></p></footer>
</body>
