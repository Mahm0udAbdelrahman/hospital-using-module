<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Subscriber') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.subscriptions.create') }}" method="post">
                    @csrf
                        <input class="border" name="package_id" value="{{ old('package_id') }}" />
                        <input class="border" name="payment_system" value="{{ old('payment_system') }}" />
                        <input class="border" name="the_currency" value="{{ old('the_currency') }}" />
                        <input class="border" name="prefix" value="{{ old('prefix') }}" />
                        <input class="border" name="price" value="{{ old('price') }}" />
                        <button>@lang('admin.save')</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
