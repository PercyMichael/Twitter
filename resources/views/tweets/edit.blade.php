<x-layout>
    <div class="p-10 max-w-screen-md mx-auto min-h-screen">
        @error('tweet')
        <p class="text-xs text-red-500 py-4 font-semibold">
            {{$message}}
        </p>
        @enderror
        <form class="flex flex-col gap-4" action="/tweets/{{$tweet->id}}" method="post">
            @csrf
            @method('PATCH')
            <textarea class="border p-4 rounded-xl" name="tweet" id="tweet" rows="5">{{ $tweet->content }}</textarea>
            <div class="flex gap-x-4 items-center justify-end">
                <button class="bg-green-500 py-2 px-4 rounded-full text-white">Update</button>
                <a href="/tweets/{{$tweet->id}}" class="bg-green-white py-2 px-4 rounded-full border">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>