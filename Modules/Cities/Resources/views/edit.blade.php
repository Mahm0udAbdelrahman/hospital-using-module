<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('app.cities.update', $city->id) }}" method="post">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="email">Choose Category</label>
                        <select class="form-control custom-select mt-15" name="country_id" id="">
                            <option @selected($city->country_id == null) value="">No Category</option>
                            @foreach ( $countries as $cat )
                            <option value="{{ $cat->id }}" @selected($city->country_id == $cat->id) >{{
                                $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>


                        <input class="border" name="name" value="{{ old('name', $city->name) }}" />
                        <button>{{ __('Submit') }}</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
