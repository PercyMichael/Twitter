<x-layout>
    <div class="p-10 max-w-screen-md mx-auto min-h-screen">
        <div class="border p-4 rounded-md bg-white flex flex-col justify-between gap-4">

            {{$tweet->content}}
            <div class="flex justify-between">

                <span class="text-xs flex gap-x-2">
                    <a href="/tweets/{{$tweet->id}}/edit" class="text-green-600 ">Edit</a>
                    <form method="post" action="/tweets/{{$tweet->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </span>


                <span>{{$tweet->comments->count()}} comments</span>

            </div>
        </div>


        <form action="/comments/create" method="post" class="py-8 flex flex-col gap-y-4">
            @csrf
            @error('comment')
            <x-form-error>{{$message}}</x-form-error>
            @enderror
            <textarea class="border p-4 rounded-xl" name="comment" id="tweet" rows="3">{{ old('tweet') }}</textarea>
            <div class="flex gap-x-4 items-center justify-end">
                <x-button>Comment</x-button>
            </div>
        </form>

        <!-- coments -->

        @if($tweet->comments->isEmpty())
        <p>No comments yet.</p>
        @else

        <div class="py-4">
            <ul>
                @foreach ($tweet->comments as $comment)
                <li class="border-t py-4">{{$comment->text}}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <!-- end comments -->
    </div>
</x-layout>