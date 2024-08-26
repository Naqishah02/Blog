@if(session('success'))
<div class="space-y-2">
    <div class="alert text-green-800 bg-green-100" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg"
             width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline>
        </svg>
            {{ session('success') }}
    </div>
</div>
@endif
