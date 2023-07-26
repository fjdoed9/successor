<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight py-4">
            {{ __('投稿詳細') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div class="w-3/4 py-8">
            <div class="flex mb-8">
                <div class="w-1/3 pr-8">
                    <img src="{{ asset('storage/images/comments/' . $comment->image) }}" alt="{{ $comment->manufacturer }}" class="w-full object-cover h-auto">
                    @php
                        $hasLiked = $comment->likes()->where('user_id', Auth::id())->exists();
                        $likeButtonClass = $hasLiked ? 'text-indigo-700 hover:text-indigo-400' : 'text-gray-400 hover:text-gray-700';
                    @endphp

                    <button class="{{ $likeButtonClass }} toggle-like-button" data-comment-id="{{ $comment->id }}">
                        @if ($hasLiked)
                            <x-iconsax-bol-like-1 class="w-6 h-6" />
                        @else
                            <x-iconsax-bul-like-1 class="w-6 h-6" />
                        @endif
                    </button>
                </div>

                <div class="w-2/3">
                    <div class="mb-4">
                        <span class="font-bold dark:text-slate-50">ユーザーネーム:</span>
                        <span class="dark:text-slate-50">{{ $user_name }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold dark:text-slate-50">会社名:</span>
                        <span class="dark:text-slate-50">{{ $comment->manufacturer }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold dark:text-slate-50">上場・非上場:</span>
                        <span class="dark:text-slate-50">{{ $comment->event ? '非上場' : '上場' }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold dark:text-slate-50">従業員数:</span>
                        <span class="dark:text-slate-50">{{ $comment->model }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="font-bold dark:text-slate-50">起業理由:</span>
                        <p class="dark:text-slate-50">{!! nl2br(e($comment->free_review)) !!}</p>
                    </div>
                </div>
            </div>
            <form action="{{ route('comments.edit', $comment) }}" method="GET" class="inline-block">
                @csrf
                <button type="submit" class="hover:bg-blue-700 hover:text-white text-gray-900 font-semibold py-2 px-4 rounded shadow-xl">
                    {{ __('レビュー編集') }}
                </button>
            </form>
        </div>
    </div>

    <!-- JavaScriptの記述 -->
    <script>
        // いいねボタンのクリックイベントを監視
        const toggleLikeButtons = document.querySelectorAll('.toggle-like-button');
        toggleLikeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const commentId = this.getAttribute('data-comment-id');
                toggleLike(commentId);
            });
        });

        // いいねの状態を切り替える関数
        function toggleLike(commentId) {
            fetch(`/comments/${commentId}/toggleLike`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRFトークンの追加
                },
                body: JSON.stringify({
                    commentId: commentId
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data.message);
                // いいねが追加または削除された後の処理を記述

                // ボタンの表示を更新
                const likeButton = document.querySelector(`.toggle-like-button[data-comment-id="${commentId}"]`);
                if (likeButton) {
                    likeButton.classList.toggle('text-indigo-700', data.liked);
                    likeButton.classList.toggle('text-gray-400', !data.liked);
                }
            })
            .catch(error => {
                console.error('エラーが発生しました', error);
            });
        }
    </script>
</x-app-layout>
