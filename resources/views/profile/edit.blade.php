<x-appa-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Profilo') }}
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-6 mb-4">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                    <br><br><br><br>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-6 mb-4">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-800">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    
</x-appa-layout>
