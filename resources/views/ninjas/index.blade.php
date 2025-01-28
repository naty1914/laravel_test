<x-layout>
    <h1>Currently Available Ninjas</h1>
    
    <ul>
        @foreach ($ninjas as $ninja )
        <li>
           <x-card href="{{ route('ninjas.show', $ninja->id) }}" :highlight="$ninja->skill > 80">
               
              <div>
                <h3> {{ $ninja->name}}</h3>
                <p> {{ $ninja->dojo->name}}</p>
              </div>
        
           </x-card>
        </li>
        @endforeach
        {{ $ninjas->links()}}
    </ul>
 
</x-layout>