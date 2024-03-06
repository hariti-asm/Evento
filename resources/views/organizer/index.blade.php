<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.tailwindcss.com"></script>


</head>
<body>
    {{-- <x-section></x-section> --}}
    <div class="table-data">
        <div class="todo">
            <div class="head">
                <h4>Events</h4>
                <a href="#" data-toggle="modal" data-target="#addeventModal"><i class='bx bx-plus'></i></a>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                @foreach($events as $event)
                <li>
                    <p class="text-[14px]">{{ $event->title }}</p>
                    <div>
                        <a href="#" data-toggle="modal" data-target="#editeventModal{{ $event->id }}" data-event-title="{{ $event->title }}"><i class='bx bx-edit'></i></a>
                        <a href="#" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this event?')) document.getElementById('deleteeventForm{{ $event->id }}').submit();"><i class='bx bx-trash'></i></a>
                        <form id="deleteeventForm{{ $event->id }}" action="{{ route('events.destroy', $event) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
        
    
    
    
        
        
    </div>
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