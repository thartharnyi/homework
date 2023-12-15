@props(['blogs'])

<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
      
      {{--<select name="" id="" class="p-1 rounded-pill mx-3">
        <option value="">Filter by Tag</option>
      </select>--}}
      
    </div>
    <form action="" class="my-3">
      <div class="input-group mb-3">

        <input
          type="hidden"
          class="form-control"
          name="category"
          value="{{ request('category') }}"
        />

        <input
          type="text"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
          name="search"
          value="{{ request('search') }}"
        />

        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
          
        >
          Search
        </button>
      </div>
    </form>
    
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <x-blog-card :blog="$blog"/>
          </div>
          
        @endforeach
        {{ $blogs->links() }}
    </div>
  </section>
