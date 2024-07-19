<x-layout>
    <div class="p-10 max-w-screen-md mx-auto min-h-screen">
        <h2 class="text-center py-4">Login</h2>
        <form class="flex flex-col gap-4" action="/login" method="post">
            @csrf
            @error('email')
            <x-form-error>{{$message}}</x-form-error>
            @enderror
            <x-form-input placeholder="email" name="email" />
            <x-form-input placeholder="password" name="password" />
            <x-button>Login</x-button>
        </form>
    </div>
</x-layout>