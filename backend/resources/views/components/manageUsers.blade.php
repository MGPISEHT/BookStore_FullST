<x-layout>

    @include('pages.sidebar')
    @include('components.Users.userAdd')
    @include('components.Users.userEdit')
    @include('components.Users.userDelete')

    <section class="main_content dashboard_part large_header_bg">
        @include('pages.header')

        <div class="table-data">
            <div class="d-flex justify-content-between align-items-center flex-wrap p-3">
                <h1>Users</h1>
                <div class="serach_field-area d-flex align-items-center justify-content-between">
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#addUserModal">Add New</button>
                    <div class="search_inner ml-4">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" placeholder="Search here..." />
                            </div>
                            <button type="submit">
                                <img src="{{ url('img/icon/icon_search.svg') }}" alt />
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-2">
                <table class="table p-4" id="userTable">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($user->password, 10, '...') }}</td>
                            <td>
                                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editUserModal{{ $user->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">No user records found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @include('pages.footer')
    </section>

</x-layout>