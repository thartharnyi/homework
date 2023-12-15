
  <x-layout>
    
    <!-- hero section -->
    <x-hero />

    <x-category :currentCategory="$currentCategory ?? null" />
    
    <!-- blogs section -->
    
    <x-blogs-section 
      :blogs="$blogs" 
      
      {{-- :categories="$categories" 
       --}} />

    <!-- subscribe new blogs -->

    <x-subscribe />

    <!-- footer -->
    
  </x-layout>