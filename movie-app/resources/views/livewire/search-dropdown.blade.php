<div class="relative mt-3 md:mt-0">
  <input wire:model.debounce.500ms="search" type="text" placeholder="Search" class="bg-gray-800 text-sm rounded-full w-64 px-4 pl-8 py-1 focus:outline-none focus:ring-2 focus:ring-gray-50" >
  <div class="absolute top-0">
    <i class="fas fa-search mt-2 ml-2"></i>
  </div>
  @if(strlen($search) >= 2)
  <div class="absolute bg-gray-800 rounded w-64 mt-4 text-sm">
    @if($searchResult->count() > 0)
    <ul>
      @foreach($searchResult as $result)
      <li class="border-b border-gray-700">
        <a href="{{ route('movies.show', $result['id']) }}" class="block hover:bg-gray-700 px-3 py-3 flex items-center">
          @if($result['poster_path'])
          <img src="{{ 'https://image.tmdb.org/t/p/w92/'. $result['poster_path'] }}" class="w-8">
          @else
          <img src="https://via.placeholder.com/50x75" class="w-8">
          @endif
          <span class="ml-4">{{ $result['title']}}</span>
        </a>
      </li>
      @endforeach
    </ul>
    @else
    <div class="px-3 py-3">
      No results for "{{ $search }}"
    </div>
    @endif
  </div>
  @endif
</div>
