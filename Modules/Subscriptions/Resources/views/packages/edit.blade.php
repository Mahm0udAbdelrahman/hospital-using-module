<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Subscriber') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.subscriptions.update', $subscription->id) }}" method="post">
                    @csrf
                    @method('patch')

                        <input class="border" name="name" value="{{ old('name', $subscription->name) }}" />
                        <input class="border" name="email" value="{{ old('email', $subscription->email) }}" />
                        <input class="border" name="address" value="{{ old('address', $subscription->address) }}" />
                        <input class="border" name="phone" value="{{ old('phone', $subscription->phone) }}" />
                        <input class="border" name="image" value="{{ old('image', $subscription->image) }}" />
                        <button>{{ __('Submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
