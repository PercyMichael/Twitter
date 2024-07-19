<x-layout>
    <div class="p-10 max-w-screen-md mx-auto min-h-screen">
        <h2 class="text-center py-4">Register</h2>
        <form class="flex flex-col gap-4" action="/register" method="post">
            @csrf
            <x-form-input placeholder="Name" name="name" />
            <x-form-input placeholder="Email" name="email" />
            <x-form-input placeholder="Password" name="password" />
            <x-form-input placeholder="Confirm Password" name="password_confirmation" />
            <x-button>Save</x-button>
        </form>
    </div>
</x-layout>