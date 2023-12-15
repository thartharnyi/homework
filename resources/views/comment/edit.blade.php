<x-layout>
    <div class="container">
        <h3>Comment Edit</h3>
        <form action="/comments/{{ $comment->id }}/update" method="POST">
            @csrf
            @method('patch')
        <textarea placeholder="comment here...." class="form-control" id="" cols="30" rows="10" name="body">{{ $comment->body }}</textarea>
        @error('body')
            <div class="text-danger">{{ $message }}</div>
        @enderror
          <button class='mt-3 btn btn-primary'>Update</button>
        </form>
    </div>
</x-layout>