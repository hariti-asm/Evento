


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="../css/style.css">
  
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../css/tooplate-style.css">

</head>
<body >
    {{-- <x-section :doctor="$doctor"></x-section> --}}
    <section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Evento</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="{{route('admin.index')}}">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
            <li>
				<a href="{{route("admin.events")}}">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Events</span>
				</a>
			</li>
			<li>
				<a href="{{route('admin.clients')}}">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">clients</span>
				</a>
			</li>
			
			
			<li>
				<a href="{{route('admin.reservations')}}">
					<i class='bx bxs-group' ></i>
					<span class="text">Reservations</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li>
			<li>
				<a href="#" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
    <section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Specialties</a>
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
			<a href="#" class="profile">
				{{-- <img src="{{ $client->image }}"> --}}
			</a>
		</nav>
    </section>
<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 

 
 <div class="w-full max-w-[76%] mx-auto ml-[300px] mt-10">
    <table class="w-full max-w-7xl mt-10 mx-auto  text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-[#e6f4f1] dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  
                    
                    <th scope="col" class="px-6 py-3">
                        <p class="text-lg text-black font-semibold italic">
                            Date
                        </p>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-lg text-black font-semibold italic"">
                         Location
                        </p>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-lg text-black font-semibold italic"">
                            End Time
                        </p>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <p class="text-lg text-black font-semibold italic"">
                            Approve
                        </p>
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                       
                        <td class="px-6 py-4">
                            <p class="text-md">
                                {{ $event->title }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-md">
                                {{ $event->location }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-md">
                                {{ $event->date_time}}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="{{ route('events.approve', $event) }}">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-white bg-[#0d9276] text-sm px-2 py-1 rounded focus:outline-none {{ $event->approved ? 'hover:cursor-not-allowed bg-[#79a79d]' : '' }}" {{ $event->approved ? 'disabled' : '' }}>
                                    {{ $event->approved ? 'Approved' : 'Approve' }}
                                </button>
                            </form>
                            
                        </td>
                        
                        
                        
                        
                       
                    </tr>
                @endforeach
            </tbody>
        </table>
    
    </div>
    <script src="../js/script.js"></script>
     <script>
        document.addEventListener("DOMContentLoaded", function () {
            const modalToggles = document.querySelectorAll("[data-modal-toggle]");
            const modalCloses = document.querySelectorAll("[data-modal-hide]");

            modalToggles.forEach((toggle) => {
                toggle.addEventListener("click", () => {
                    const target = toggle.getAttribute("data-modal-target");
                    const modal = document.getElementById(target);
                    modal.classList.toggle("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                });
            });

            modalCloses.forEach((close) => {
                close.addEventListener("click", () => {
                    const target = close.getAttribute("data-modal-hide");
                    const modal = document.getElementById(target);
                    modal.classList.add("hidden");
                    modal.setAttribute("aria-hidden", modal.classList.contains("hidden"));
                });
            });
        });
    </script>
    

</body>
</html>