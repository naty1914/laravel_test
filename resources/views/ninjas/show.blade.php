<x-layout>
    <h2> {{ $ninja->name}}</h2>
    <div class="bg-gray-200 p-4 rounded">
        <p> <strong>Skill level: </strong> {{ $ninja->skill}}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $ninja->bio}}</p>
    </div>
    <div class="bg-white-200 p-4 rounded">
        <p><strong>Dojo Information </strong></p>
        <p> <strong>Dojo Name: </strong> {{ $ninja->dojo->name}}</p>
        <p><strong>Location:</strong> {{ $ninja->dojo->location}}</p>
        <p><strong>About the Dojo:</strong></p>
        <p>{{ $ninja->dojo->description}}</p>
    </div>
<form action="{{ route('ninjas.destroy', $ninja->id)}} " method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn bg-red-500">Delete Ninja</button>
</form>
</x-layout>
  
 