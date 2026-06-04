<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <h1>{{ $title }}</h1>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('praktijkmanagement.update', $user->Id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="InputName" class="form-label">Naam</label>
                            <input name="name" type="text" class="form-control" id="InputName"
                                value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="mb-3">
                            <label for="InputDescription" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control" id="InputDescription"
                                value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="mb-3">
                            <label for="InputRolename" class="form-label">Gebruikersrol</label>
                            <select name="rolename" class="form-select" aria-label="InputRolename">
                                @foreach ($userroles as $userrole)
                                    <option value="{{ $userrole->rolename }}"
                                        @selected($userrole->rolename == $user->rolename)>
                                        {{ $userrole->rolename }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                        <a href="{{ route('praktijkmanagement.userroles') }}" class="btn btn-secondary">Annuleren</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
