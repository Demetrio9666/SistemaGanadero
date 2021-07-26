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
            <div class="titulo "><h1>Fichas de Tratamientos</h1></div>
            <table id="tabla" class="table table-striped table-bordered" style="width:100%">
               
                <thead>            
                    <tr>
                        <tr>
                            <th>Fecha de Tratamiento</th>
                            <th>Código del Animal</th>
                            <th>Enfermedad </th>
                            <th>Detalle</th>
                            <th>Antibiótico</th>
                            <th>Vitamina</th>
                            <th>Tratamiento</th>
                            <th>Estado Actual</th> 
                        </tr> 
                       
                    </tr>
                </thead>
                <tbody>  
                    @foreach ($tra as $i)         
                    <tr>
                        <td>{{$i->date}}</td>
                        <td>{{$i->animal}}</td>
                        <td>{{$i->disease}}</td>
                        <td >{{$i->detail}}</td>
                        <td >{{$i->anti}}</td>
                        <td >{{$i->vi}}</td>
                        <td >{{$i->treatment}}</td>
                        <td >{{$i->actual_state}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<footer><p><strong>SoftGanadoBOVINO</strong></p></footer>
</body>