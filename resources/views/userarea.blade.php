<x-appa-layout>
<x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Info') }}
            </h2>
        </div>
</x-slot>
<section class="align-items-center justify-content-center">
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Area utenti') }}</div>
  
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
  
                    You are logged.
                </div>
            </div>
        </div>
    </div>
</div>
        
    
</section>
</x-appa-layout>