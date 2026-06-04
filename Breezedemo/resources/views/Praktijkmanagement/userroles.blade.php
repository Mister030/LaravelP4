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
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-10">

                            <h2 class="my-3">{{ $title }}</h2>

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                                </div>
                                <meta http-equiv="refresh" content="3;url={{ route('praktijkmanagement.userroles') }}">
                            @elseif (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
                                </div>
                                <meta http-equiv="refresh" content="3;url={{ route('praktijkmanagement.userroles') }}">
                            @endif

                            <table class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th>Naam</th>
                                        <th>Email</th>
                                        <th>Gebruikersrol</th>
                                        <th class="text-center">Verwijder</th>
                                        <th class="text-center">Wijzig</th>
                                        <th class="text-center">Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->rolename }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('praktijkmanagement.destroy', $user->Id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('praktijkmanagement.edit', $user->Id) }}" class="btn btn-success btn-sm">Wijzig</a>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('praktijkmanagement.show', $user->Id) }}" class="btn btn-warning btn-sm">Details</a>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6">Geen gebruikers beschikbaar</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
