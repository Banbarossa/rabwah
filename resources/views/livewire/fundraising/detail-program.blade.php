<div class="bg-gradient-to-b from-white to-brand-cream">
    <div class=" mx-auto w-full [:where(&)]:max-w-7xl p-4 ">
        <div class="mb-10 mt-4">
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="/">Home</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{route('donasi')}}">Donasi</flux:breadcrumbs.item>
                <flux:breadcrumbs.item>Detail</flux:breadcrumbs.item>
            </flux:breadcrumbs>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Program Image -->
                <div class="mb-6">
                    <img src="{{$program['thumbnail']}}" alt="Nama Program"
                         class="w-full h-auto object-cover rounded-lg shadow-md">
                </div>

                <div class=" lg:hidden">
                    <div class="mb-6 ">
                        <x-detail-program :program="$program"/>
                    </div>
                </div>


                <!-- Tabs for Details -->
                <div class="mt-8" x-data="{area:'detail'}">
                    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center gap-4">
                            <li class="me-2">
                                <button
                                    x-bind:class="area == 'detail'
                                        ?'border-b-4 border-b-brand-green text-brand-green font-bold'
                                        :'text-neutral-600'"
                                    class="inline-block py-2 " id="detail" type="button"
                                        aria-controls="detail" aria-selected="false" x-on:click="area = 'detail'">
                                    Detail
                                </button>
                            </li>

                            <li class="me-2">
                                <button x-on:click="area = 'donatur'"
                                        x-bind:class="area == 'donatur'
                                        ?'border-b-4 border-b-brand-green text-brand-green font-bold'
                                        :'text-neutral-600'"

                                    class="inline-block py-2  rounded-t-lg "
                                    type="button" aria-controls="donatur" aria-selected="false">
                                    Donatur
                                    <span class="p-0.5 font-semibold ms-1 rounded-full bg-brand-green text-[9px] text-white">{{$program['total_donors']}}</span>
                                </button>
                            </li>
                        </ul>
                    </div>


                    <!-- Tab Content -->
                    <div class="py-6 quill-reset max-w-none" x-show="area == 'detail'">
                        {!! $program['content'] !!}
                    </div>
                    <div class="py-6 max-w-none" x-show="area == 'donatur'">
                        <ul class="divide-y space-y-3">
                            @foreach($donations as $don)
                                <li class="grid grid-cols-1 sm:grid-cols-2">
                                    <div>
                                        <flux:heading class="text-sm sm:text-lg font-semibold">{{$don->donor?->hidden_name ? 'Hamba Allah':$don->donor->name}}
                                        </flux:heading>
                                        <flux:text size="sm">{{\Carbon\Carbon::parse($don->created_at)->locale('id')->translatedFormat('d M Y')}}</flux:text>
                                    </div>
                                    <div class="text-end">
                                        <flux:text size="sm">Donasi</flux:text>
                                        <flux:heading class="text-sm sm:text-lg font-semibold">{{format_rupiah($don->amount)}}</flux:heading>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Donation Form Sidebar -->
            <div class="lg:col-span-1 hidden lg:block">
                <div class="border rounded-lg p-6 mb-6 sticky top-24 shadow bg-white">
                    <x-detail-program :program="$program"/>

                </div>

            </div>

        </div>
    </div>
</div>
