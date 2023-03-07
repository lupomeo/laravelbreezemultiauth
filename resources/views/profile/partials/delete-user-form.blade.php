<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium">
            {{ __('Cancella Account') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Attenzione, una volta cancellato l\'account tutti i dati verranno definitivamente persi.') }}
        </p>
    </header>

    <x-button
        variant="danger"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >
        {{ __('Cancella Account') }}
    </x-button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >
        <form
            method="post"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium">
                {{ __('Sei sicuro di voler cancellare l\'account?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Inserisci la password per confermare.') }}
            </p>

            <div class="mt-6 space-y-6">
                <x-form.label
                    for="delete-user-password"
                    value="Password"
                    class="sr-only"
                />

                <x-form.input
                    id="delete-user-password"
                    name="password"
                    type="password"
                    class="block w-3/4"
                    placeholder="Password"
                />

                <x-form.error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-button
                    type="button"
                    variant="secondary"
                    x-on:click="$dispatch('close')"
                >
                    {{ __('Cancel') }}
                </x-button>

                <x-button
                    variant="danger"
                    class="ml-3"
                >
                    {{ __('Cancella Account') }}
                </x-button>
            </div>
        </form>
    </x-modal>
</section>
