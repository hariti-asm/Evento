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
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        <div class="bg-cover bg-center text-center overflow-hidden"
            style="min-height: 500px; background-image: url('https://api.time.com/wp-content/uploads/2020/07/never-trumpers-2020-election-01.jpg?quality=85&amp;w=1201&amp;h=676&amp;crop=1')"
            title="Woman holding a mug">
        </div>
        <div class="max-w-3xl mx-auto">
            <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                    <h1 class="text-gray-900 font-bold text-3xl mb-2">{{ $event->title }}</h1>
                    <p class="text-gray-700 text-xs mt-2">Written By:
                        <a href="#" class="text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                            {{ $event->organizer->name }}
                        </a>
                        In
                        <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out">
                            {{ $event->category->name }}
                        </a>
                    </p>
            
                    <p class="text-base leading-8 my-5">
                        {{ $event->description }}
                    </p>
            
                    <h3 class="text-2xl font-bold my-5">#1. What is Lorem Ipsum?</h3>
            
                    <p class="text-base leading-8 my-5">
                        {{ $event->description }}
                    </p>
            
                    <blockquote class="border-l-4 text-base italic leading-8 my-5 p-5 text-indigo-600">
                        {{ $event->description }}
                    </blockquote>
            
                    <p class="text-base leading-8 my-5">
                        {{ $event->description }}
                    </p>
            
                    <div class="flex flex-wrap mt-5">
                        <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out mr-2">
                            #Election
                        </a>
                        <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out mr-2">
                            #people
                        </a>
                        <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out mr-2">
                            #Election2020
                        </a>
                        <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out mr-2">
                            #trump
                        </a>
                        <a href="#" class="text-xs text-indigo-600 font-medium hover:text-gray-900 transition duration-500 ease-in-out mr-2">
                            #Joe
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>