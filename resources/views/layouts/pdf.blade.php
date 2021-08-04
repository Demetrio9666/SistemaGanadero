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
<body>
    <header><p><strong>Hacienda Jean Andrés</strong> </p></header>
    <div class="card">
        <div class="card-body">
            <div class="titulo "><h1> @yield('nombre_tabla')</h1></div>
            @yield('tabla')
        </div>
    </div>
<footer><p><strong>SoftGanadoBOVINO</strong></p></footer>
</body>