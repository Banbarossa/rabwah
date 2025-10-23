@props(['href'=>'#','active'=>false])



<a href="{{$href}}" class="hover:text-neutral-600 group relative pb-1 block lg:inline {{$active ?'font-bold':''}}" {{$attributes}}>
    <span >{{$slot}} </span>
    <span class="absolute bottom-0 h-0.5 w-0 bg-brand-gold transition-all duration-300 group-hover:w-full left-0 ease-in-out {{$active?'w-full':''}}"></span>

</a>
