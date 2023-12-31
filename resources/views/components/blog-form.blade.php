@props(['blog'=>null,'categories'=>null])
<form action="{{ $blog ? '/admin/blogs/'.$blog->id.'/update' : '/admin/blogs/store' }}" 
  method="POST" enctype="multipart/form-data">
    @if ($blog)
      @method('PUT')
    @endif
    @csrf
    <div class="form-group">
      <label for="exampleInputEmail1">Blog Title</label>
      <input 
        value="{{ $blog?->title }}"
        type="text" 
        name="title" 
        class="form-control" 
        ids="exampleInputEmail1" 
        aria-describedby="emailHelp" 
        placeholder="Enter title">
        @error('title')
              <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    
    @if ($blog)
      <img src="{{ $blog->photo }}" width="200" height="200">
    @endif
    <div class="form-group">
      <label for="exampleInputEmail1">Blog Photo</label>
      <input 
        type="file" 
        name="photo" 
        class="form-control" 
        ids="exampleInputEmail1" 
        aria-describedby="emailHelp" 
        @error('photo')
              <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Blog Slug</label>
        <input
            value="{{ $blog?->slug }}" 
            name="slug" 
            type="text" 
            class="form-control" 
            ids="exampleInputEmail1" 
            aria-describedby="emailHelp" 
            placeholder="Enter slug">

            @error('slug')
              <p class="text-danger">{{ $message }}</p>
            @enderror

      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Blog Introduction</label>
        <textarea name="intro" class="form-control" id="" cols="10" rows="2">
            {{ $blog?->intro }}
        </textarea>

        @error('intro')
              <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Blog Body</label>
        <textarea name="body" id="area" class="form-control" cols="30" rows="10">
            {{ $blog?->body }}
        </textarea>

        @error('body')
              <p class="text-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="form-group">
        <label for="exampleInputEmail1">Blog Category</label>
        <select name="cat_id" id="">
            @foreach ($categories as $category)
                <option {{ $category->id==$blog?->category->id?'selected':'' }}
                        value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('cat_id')
              <p class="text-danger">{{ $message }}</p>
            @enderror
      </div>
    <button type="submit" class="btn btn-primary">
      {{ $blog ? 'Update' :"Create" }}
    </button>

  </form>