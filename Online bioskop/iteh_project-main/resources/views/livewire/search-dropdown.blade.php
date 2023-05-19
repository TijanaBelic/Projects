
                <div class="relative mt-3 md:mt-0" x-data="{ isOpen: true }" @click.away="isOpen = false">
                    <input 
                        wire:model.debounce.500ms="search" 
                        type="text"
                        class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus-shadow-outline"
                        placeholder="Search"
                        x-ref="search"
                        @keydown.window="
                            if(event.keyCode == 191) 
                            {
                              event.preventDefault();
                              $refs.search.focus();
                            }
                        "
                        @focus="isOpen = true"
                        @keydown="isOpen = true"
                        @keydown.escape.window="isOpen = false"
                        @keydown.shift.tab="isOpen = false"
                    >
                    <div class="absolute top-0">
                        <svg class="fill-current w-4 text-gray mt-2 ml-1" viewBox="0 0 56.966 56.966">
                            <path
                                d="M55.146 51.887L41.588 37.786A22.926 22.926 0 0046.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 00.083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z" />
                        </svg>
                    </div>

                    <div wire:loading class="spinner top-0 right-0 mr-4 mt-3"></div>

                    @if(strlen($search) > 1)    
                    <div 
                         class="z-50 absolute bg-gray-800 text-sm rounded w-64 mt-4" 
                         x-show.transition.opacity="isOpen"
                          
                    >
                         @if($searchResults->count() > 0 )
                         <ul>
                            @foreach($searchResults as $result)
                            <li class="border-b border-gray-700"> 
                              <a 
                                 href="{{ route('movies.show', $result['id']) }}" class="block 
                                 hover:bg-gray-700 px-3 py-3 flex items-center"
                                 @if($loop->last) @keydown.tab="isOpen = false"  @endif
                              >
                                @if($result['poster_path']) 
                                  <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster"
                                    class="w-8" > 
                                  @else 
                                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                                @endif     
                                <span class="ml-4">{{ $result['title'] }}</span>
                              </a>
                            </li>
                            @endforeach
                         </ul> 
                         @else 
                           <div class="px-3 py-3">No results for "{{ $search }}" </div>

                         @endif

                    </div>
                    @endif
                </div>

