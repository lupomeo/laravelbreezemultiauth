<x-app-layout>
<x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Info') }}
            </h2>
        </div>
</x-slot>
<section class="align-items-center justify-content-center">
    
            <div class="col-12 text-center d-flex align-items-center justify-content-center">
                <div>
                    <h1 class="mt-5">Non <span class="fw-bolder text-primary">Autorizzato.</span></h1>
                    <p class="lead my-4">{{ $msg }}</p>
                    <a href="/dashboard" class="btn btn-gray-800 d-inline-flex align-items-center justify-content-center mb-4">
                        <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>
                        Torna alla Home.
                    </a>
                </div>
            </div>
        
    
</section>
</x-app-layout>