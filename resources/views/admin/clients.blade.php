<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

	<title>Evento</title>
</head>
<body>


	<!-- SIDEBAR -->
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
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<a href="#" class="nav-link">Categories</a>
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
				{{-- <img src=" ../{{$admin->image }}"> --}}
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					
				</div>
				<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text">Download PDF</span>
				</a>
			</div>


<div class="table-data">
    <div class="order">
        <div class="head">
            <h4 class="font-semibold text-xl">Recent clients</h4>
            <i class='bx bx-search'></i>
            <i class='bx bx-filter'></i>
        </div>
		<table>
			<thead>
				<tr>
					<th>client</th>
					<th>Email</th>
					<th>Action</th> <!-- New column for Block/Deblock action -->
				</tr>
			</thead>
			<tbody>
				@foreach($clients as $client)
				<tr>
					<td>
						<img src="../{{ $client->image }}">
						<p class="text-sm">{{ $client->name }}</p>
					</td>
					<td>
						<p class="text-sm">{{ $client->email }}</p>
					</td>
					<td> <!-- Action column -->
						<form method="POST" action="{{ route('users.update', $client) }}">
							@csrf
							@method('PATCH')
							<input type="hidden" name="banned" value="{{ $client->banned ? '0' : '1' }}">
							<button type="submit" class="bg-{{ $client->banned ? 'green' : 'red' }}-500 text-white text-sm px-3 py-1 rounded">
								{{ $client->banned ? 'Unban' : 'Ban' }}
							</button>
						</form>
						
					</td>
					
				</tr>
				@endforeach
			</tbody>
		</table>
		
    </div>



	
	
</div>


		</main>
	</section>
	

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
   
		const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});

// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})
	</script>
</body>
</html>