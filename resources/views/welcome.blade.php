<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
 
    <form action="{{ route('filter.events') }}" method="GET" class="flex flex-col md:flex-row gap-3">
        <select id="category" name="category" class="w-full h-10 border-2 border-green-400 focus:outline-none focus:border-green-400 text-green-400 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
            <option value="All" selected>All</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <input type="text" id="title" name="title" placeholder="Search by title" class="w-full h-10 border-2 border-green-400 focus:outline-none focus:border-green-400 text-green-400 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider">
        <button type="submit" class="bg-green-400 text-white rounded-r px-2 md:px-3 py-0 md:py-1">Filter</button>

    </form>
    
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
            @foreach($events as $event)
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#"></a>
                <div class="relative">
                    <a href="#">
                        <img class="w-full" src="{{ $event->image }}" alt="{{ $event->title }}">
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                    </a>
                    <a href="#!">
                        <div class="absolute bottom-0 left-0 bg-indigo-600 px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            Photos
                        </div>
                    </a>
                    <a href="!#">
                        <div class="text-sm absolute top-0 right-0 bg-indigo-600 px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                            <span class="font-bold">{{\Carbon\Carbon::parse($event->date_time)->format('d F')
                            }}</span>
                            <small>{{ $event->month }}</small>
                        </div>
                    </a>
                </div>
                <div class="px-6 py-4">
                    <a href="#" class="font-semibold text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out">{{ $event->title }}</a>
                    <p class="text-gray-500 text-sm">{{ $event->description }}</p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <svg height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                            <g>
                                <g>
                                    <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z"></path>
                                </g>
                            </g>
                        </svg>
                        <span class="ml-1">
                            @php
                                $dateTime = \Carbon\Carbon::parse($event->date_time);
                                $daysDifference = $dateTime->diffInDays(now(), false);
                            @endphp
                            @if ($daysDifference > 0)
                                {{ $daysDifference }} day{{ $daysDifference > 1 ? 's' : '' }} ago
                            @elseif ($daysDifference == 0)
                                Today
                            @else
                                {{ abs($daysDifference) }} day{{ abs($daysDifference) > 1 ? 's' : '' }} left
                            @endif
                        </span>
                        
                        </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</body>
</html>