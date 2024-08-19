<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 leading-tight">
            {{ __('Document Details') }}: {{ $document->name }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:p-8">
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Document Information</h3>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Name:</span> {{ $document->name }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Path:</span> {{ $document->path }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Format:</span> {{ $document->format }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Size:</span> {{ $document->size }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Created:</span> {{ $document->created_at->format('Y-m-d H:i') }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Course:</span> {{ $document->course->name }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">School:</span> {{ $document->school->name }}</p>
                        <p class="text-sm text-gray-600 mb-1"><span class="font-medium">Grade:</span> {{ $document->grade->name }}</p>
                        <p class="text-sm text-gray-600 mb-4"><span class="font-medium">Period:</span> {{ $document->period->name }}</p>
                    </div>

                    @if($document->format === 'pdf')
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">PDF Preview</h3>
                            <div id="pdf-viewer" class="w-full" style="height: 800px;"></div>
                        </div>
                    @endif

                    <div class="flex justify-between items-center mt-6">
                        <div class="space-x-2">
                            <button id="prev" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Previous Page
                            </button>
                            <button id="next" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Next Page
                            </button>
                            <span id="page_num"></span> / <span id="page_count"></span>
                        </div>
                        <div class="space-x-2">
                            <a href="{{ route('documents.download', $document->id) }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-500 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring focus:ring-green-300 disabled:opacity-25 transition">
                                Download
                            </a>
                            <a href="{{ route('documents.edit', $document->id) }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring focus:ring-indigo-300 disabled:opacity-25 transition">
                                Edit
                            </a>
                            <a href="{{ route('documents.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-300 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-400 active:bg-gray-500 focus:outline-none focus:border-gray-500 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">
                                Back to List
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($document->format === 'pdf')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
        <script>
            var url = '{{ asset('storage/' . $document->path) }}';

            let pdfDoc = null,
                pageNum = 1,
                pageRendering = false,
                pageNumPending = null,
                scale = 1.5,
                canvas = document.createElement('canvas'),
                ctx = canvas.getContext('2d');

            document.getElementById('pdf-viewer').appendChild(canvas);

            function renderPage(num) {
                pageRendering = true;
                pdfDoc.getPage(num).then(function(page) {
                    var viewport = page.getViewport({scale: scale});
                    canvas.height = viewport.height;
                    canvas.width = viewport.width;

                    var renderContext = {
                        canvasContext: ctx,
                        viewport: viewport
                    };
                    var renderTask = page.render(renderContext);

                    renderTask.promise.then(function() {
                        pageRendering = false;
                        if (pageNumPending !== null) {
                            renderPage(pageNumPending);
                            pageNumPending = null;
                        }
                    });
                });

                document.getElementById('page_num').textContent = num;
            }

            function queueRenderPage(num) {
                if (pageRendering) {
                    pageNumPending = num;
                } else {
                    renderPage(num);
                }
            }

            function onPrevPage() {
                if (pageNum <= 1) {
                    return;
                }
                pageNum--;
                queueRenderPage(pageNum);
            }

            function onNextPage() {
                if (pageNum >= pdfDoc.numPages) {
                    return;
                }
                pageNum++;
                queueRenderPage(pageNum);
            }

            document.getElementById('prev').addEventListener('click', onPrevPage);
            document.getElementById('next').addEventListener('click', onNextPage);

            pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
                pdfDoc = pdfDoc_;
                document.getElementById('page_count').textContent = pdfDoc.numPages;

                renderPage(pageNum);
            });
        </script>
    @endif
</x-app-layout>
