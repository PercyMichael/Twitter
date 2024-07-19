<x-layout>
    <div class="p-10 max-w-screen-md mx-auto min-h-screen">

        <h1 class="text-lg font-bold py-3">Write new</h1>
        @error('tweet')
        <p class="text-xs text-red-500 py-4 font-semibold">
            {{$message}}
        </p>
        @enderror


        <form class="flex flex-col gap-4" action="/create" method="post">
            @csrf
            <textarea class="border p-4 rounded-xl" name="tweet" id="tweet" rows="5">{{ old('tweet') }}</textarea>
            <div class="flex gap-x-4 items-center justify-end">
                <x-button>Save</x-button>
            </div>
        </form>


        @if ($tweets->count()>0)
        <h1 class="py-5"><span class="bg-yellow-400 text-black py-1 px-3 rounded-lg">{{$tweets->count()}}</span> Tweets</h1>
        @else
        <p class="text-xs text-center py-10">No tweets yet..</p>
        @endif

        <!-- //tweets -->
        <div class="flex flex-col gap-y-4">

            @foreach ($tweets as $tweet)

            <div class="flex flex-col w-full justify-between py-4 px-2 border rounded-md bg-white">
                <a href="/tweets/{{$tweet->id}}" class="">
                    {{$tweet->content}}
                </a>

                <span class="text-sm font-semibold pt-4 text-slate-400">{{$tweet->comments->count()}} comments</span>

            </div>

            @endforeach
        </div>

    </div>
</x-layout>