@props(['Label','description','separator'=>true])

<div {{$attributes->merge(['class'=>'container mx-auto px-6 text-center'])}}>
    <h2 class="text-3xl font-bold text-brand-green mb-4">{{$label}}</h2>
    @if($separator)
        <div class="w-24 h-1 bg-brand-gold mx-auto mb-8"></div>
    @endif

    @if($description)
        <p class="text-lg text-gray-700 max-w-4xl mx-auto">
            {{$description}}
        </p>
    @endif

</div>
