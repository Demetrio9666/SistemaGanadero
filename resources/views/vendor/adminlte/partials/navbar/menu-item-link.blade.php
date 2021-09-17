<li @if(isset($item['id'])) id="{{ $item['id'] }}" @endif class="nav-item">

    <a class="nav-link {{ $item['class'] }}" href="{{ $item['href'] }}"
       @if(isset($item['target'])) target="{{ $item['target'] }}" @endif
       {!! $item['data-compiled'] ?? '' !!}>
{{--aqui--}}




        {{-- Icon (optional) --}}
        @if(isset($item['icon']))
            <i class="{{ $item['icon'] }} {{
                isset($item['icon_color']) ? 'text-' . $item['icon_color'] : ''
            }}"></i>
        @endif

        {{-- Text --}}
        {{ $item['text'] }}


        {{-- Label (optional) --}}
        @if(isset($item['label']))
            <span class="badge badge-{{ $item['label_color'] ?? 'primary' }}">
                {{ $item['label'] }}
            </span>
        @endif

    </a>

</li>


<!--script>
    function actual() {
         fecha=new Date(); //Actualizar fecha.
         hora=fecha.getHours(); //hora actual
         minuto=fecha.getMinutes(); //minuto actual
         segundo=fecha.getSeconds(); //segundo actual
         if (hora<10) { //dos cifras para la hora
            hora="0"+hora;
            }
         if (minuto<10) { //dos cifras para el minuto
            minuto="0"+minuto;
            }
         if (segundo<10) { //dos cifras para el segundo
            segundo="0"+segundo;
            }
         //ver en el recuadro del reloj:
         mireloj = hora+" : "+minuto+" : "+segundo;	
				 return mireloj; 
         }
            function actualizar() { //función del temporizador
            mihora=actual(); //recoger hora actual
            mireloj=document.getElementById("reloj"); //buscar elemento reloj
            mireloj.innerHTML=mihora; //incluir hora en elemento
                }
            setInterval(actualizar,1000); //iniciar temporizador
</script-->