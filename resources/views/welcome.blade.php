<x-layout>
    <div class="p-10 max-w-screen-md mx-auto min-h-screen">
        <form class="flex flex-col gap-4" action="/create" method="post">
            @csrf
            <textarea class="border p-4 rounded-xl" name="tweet" id="" rows="5"></textarea>
            <button class="bg-green-500 w-1/2 p-3 rounded-full">Save</button>
        </form>

        <h1>List</h1>
        @foreach ($tweets as $tweet)

        <li>{{$tweet->content}}</li>

        @endforeach

    </div>
</x-layout>