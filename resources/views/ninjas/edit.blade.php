<x-layout>


<div class="container">
    <h1>Edit Ninja</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('ninjas.update', $ninja->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $ninja->name) }}" class="form-control">
        </div>


        <div class="form-group">
            <label for="skill">Skill:</label>
            <input type="text" id="skill" name="skill" value="{{ old('skill', $ninja->skill) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="bio">bio:</label>
            
            <textarea
              rows='5'
              id="bio" 
              name="bio"
              >{{ old('bio', $ninja->bio) }}
            </textarea>
        </div>

        <div>
           <!-- select a dojo -->
        <label for="dojos_id">Dojo:</label>
        <select id="dojos_id" name="dojos_id" required>
          <option value="" disabled selected>Select a dojo</option>
          @foreach ($dojos as $dojo  )
           <option value="{{ $dojo->id }}" {{ old('dojos_id') == $dojo->id ? 'selected' : ''}}>{{ $dojo->name }}</option>
              
          @endforeach
          
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Ninja</button>
    </form>
</div>


</x-layout>

  