<x-app-layout>
    <a href="{{ route('user_entry.create') }}" class="btn btn-primary"
        style="float: right; margin-right:151px; margin-top:20px;margin-bottom: 10px">Create User
    </a>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="content">
            <div class="row">
                <div class="col-md-6">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="col-md-6"></div>
            </div>
            <table class="table table-bordered text-center">
                <thead>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Execution Time</th>
                </thead>
                <tbody>
                    @if (blank($userEntry))
                        <tr>
                            <td colspan="3">
                                No records found
                            </td>
                        </tr>
                    @else
                        @foreach ($userEntry as $key => $user)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->execution_time }}</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
