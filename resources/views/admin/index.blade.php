<x-admin-layout>
    <h1>Blog List</h1>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Intro</th>
            <th scope="col">Body</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                  <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->slug }}</td>
                    <td>{!! $blog->intro !!}</td>
                    <td>{!! $blog->body !!}</td>
                    <td>{{ $blog->category->name }}</td>

                    @if (auth()->user()->can('edit',$blog))
                    <td>

                      <a 
                        href="admin/blogs/{{ $blog->id }}/edit" 
                        class="btn btn-link btn-warning">
                        Edit
                      </a></td>
                    
                    @endif

                   @if (auth()->user()->can('delete',$blog))
                  <td>
                    <form action="/admin/blogs/{{ $blog->id }}/destroy" method="post">
                      @csrf
                      @method('delete')
                      <button class=" btn-danger">Delete</button>
                    </form>
                  </td>
                   @endif
                    
                  </tr>
            @endforeach

            {{ $blogs->links() }}
        </tbody>
      </table>
</x-admin-layout>