<table class="table table-vcenter card-table text-center">
    <thead>
        <tr>
            <th>#</th>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>date of birth</th>
            <th>phone</th>
            <th>gender</th>
            <th>country</th>
            <th>role</th>
            <th class="w-1"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $index => $user)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->dob_date }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->gender }}</td>
                <td>{{ $user->country->name }}</td>
                <td>{{ $user->role_permissions }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
