<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight py-4">
            {{ __('投稿編集') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-3/4 py-8">
            <form action="{{ route('comments.update', $comment) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($comment->image)
                    <div class="mb-4 flex">
                        <label class="font-bold dark:text-slate-50 w-36">現在の画像:</label>
                        <img src="{{ asset('storage/images/comments/' . $comment->image) }}" alt="Current Image" class="w-40 h-auto">
                    </div>
                @endif
                <div class="mb-4 flex">
                    <label for="image" class="font-bold dark:text-slate-50 w-36">グローブ画像:</label>
                    <input type="file" name="image" id="image" class="dark:text-slate-50 flex-1">
                </div>

                <div class="mb-4 flex">
                    <label for="manufacturer" class="font-bold dark:text-slate-50 w-36">会社名:</label>
                    <input type="text" name="manufacturer" id="manufacturer" class="dark:text-gray-900 flex-1" value="{{ $comment->manufacturer }}">
                </div>

                <div class="mb-4 flex">
                    <label class="font-bold dark:text-slate-50 w-36">上場・非上場:</label>
                    <div class="flex flex-1 items-center">
                        <div class="flex items-center">
                            <label for="event-0" class="mr-2 flex items-center">
                                <input type="radio" name="event" id="event-0" value="0" class="text-blue-500" {{ $comment->event == 0 ? 'checked' : '' }}>
                                <span class="dark:text-white">上場</span>
                            </label>
                        </div>
                        <div class="flex items-center">
                            <label for="event-1" class="mr-2 flex items-center">
                                <input type="radio" name="event" id="event-1" value="1" class="text-blue-500" {{ $comment->event == 1 ? 'checked' : '' }}>
                                <span class="dark:text-white">非上場</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="mb-4 flex">
                    <label for="model" class="font-bold dark:text-slate-50 w-36">従業員数:</label>
                    <input type="text" name="model" id="model" class="dark:text-gray-900 flex-1"  value="{{ $comment->model }}">
                </div>

                <div class="mb-4 flex">
                    <label for="free_review" class="font-bold dark:text-slate-50 w-36">起業理由:</label>
                    <textarea name="free_review" id="free_review" class="dark:text-gray-900 flex-1 h-40 resize-y">{{ $comment->free_review }}</textarea>
                </div>

            <div class="mt-8 flex justify-end">
                <a href="{{ route('comments.show', ['comment' => $comment]) }}" class="hover:bg-gray-600 hover:text-slate-50 text-gray-900 font-bold py-2 px-4 rounded shadow-md mr-4">
                    戻る
                </a>
                <button type="button" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow-md mr-4" onclick="openModal()">
                    {{ __('レビュー削除') }}
                </button>
                <button type="submit" class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded shadow-md">
                    更新
                </button>
            </div>
            </form>
        </div>
    </div>
    <!-- モーダル -->
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
        <div class="bg-white rounded-lg p-8 z-0">
            <h2 class="text-xl font-semibold mb-4">{{ __('削除の確認') }}</h2>
            <p class="mb-8">{{ __('本当に削除しますか？') }}</p>
            <div class="flex justify-end">
                <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded shadow-md mr-4" onclick="closeModal()">
                    {{ __('キャンセル') }}
                </button>
                <form action="{{ route('comments.destroy', $comment) }}" method="POST" class="inline-block">
                    @csrf
                    @method('POST')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded shadow-md">
                        {{ __('削除') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>

</x-app-layout>
