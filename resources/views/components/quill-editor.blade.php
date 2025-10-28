@props(['content'=>null,'message'=>null])
<div>
    @push('style')
        <style>
            .ql-container {
                min-height: 480px;
                height: auto;
            }

            .ql-editor {
                min-height: 480px;
                height: auto;
            }
        </style>
    @endpush
    <div>
        <div wire:ignore>
            <div id="content" class="h-[480px] border-t border-gray-200">{{ $content }}</div>
        </div>
        {{--        @error('content') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror--}}
        @if($message)
            <span class="text-red-500 text-sm">{{ $message }}</span>

        @endif
    </div>
    @push('script')
        <script>
            document.addEventListener('livewire:navigated', () => {
                initQuill();
            });

            function initQuill() {
                const existingEditor = document.querySelector('.ql-toolbar');
                if (existingEditor) {
                    existingEditor.remove();
                }

                const editorContainer = document.querySelector('#content');
                if (!editorContainer) return;

                if (editorContainer.__quill) {
                    editorContainer.__quill = null;
                    editorContainer.innerHTML = '';
                }
                let timeout;
                const toolbarOptions = [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    ['link', 'formula', 'image'],
                    [{'header': 1}, {'header': 2}],
                    [{'list': 'ordered'}, {'list': 'bullet'}],
                    [{'indent': '-1'}, {'indent': '+1'}],
                    [{'direction': 'rtl'}],
                    [{'header': [1, 2, 3, 4, 5, 6, false]}],
                    [{'color': []}, {'background': []}],
                    [{'font': []}],
                    [{'align': []}],
                    ['clean']
                ];

                const quill = new Quill('#content', {
                    theme: 'snow',
                    modules: {
                        toolbar: {
                            container: toolbarOptions,
                            handlers: {
                                image: function () {
                                    selectLocalImage(quill);
                                }
                            }
                        }
                    },
                });

                editorContainer.__quill = quill;

                quill.on('text-change', function (delta, oldDelta, source) {
                    clearTimeout(timeout);
                    timeout = setTimeout(() => {
                        @this.set('content', quill.root.innerHTML);
                    }, 500);
                });

                let initialContent = @this.get('content');
                if (initialContent) {
                    quill.root.innerHTML = initialContent;
                }


            }

            function selectLocalImage(quill) {
                window.open('/laravel-filemanager?type=image', 'FileManager', 'width=900,height=600');
                window.SetUrl = function (items) {
                    const filePath = items[0].url;
                    const range = quill.getSelection();
                    quill.insertEmbed(range.index, 'image', filePath);
                };
            }

            {{--function openFileManager() {--}}
            {{--    window.open('/laravel-filemanager?type=image', 'FileManager', 'width=900,height=600');--}}
            {{--    window.SetUrl = function (items) {--}}
            {{--        const filePath = items[0].url;--}}
            {{--        @this.set('thumbnail', filePath);--}}
            {{--    };--}}
            {{--}--}}
        </script>
    @endpush
</div>
