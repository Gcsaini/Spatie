<x-admin-layout>
    <div class="container-fluid" style="margin-top:30px">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Roles</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user) 
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('admin.users.show', $user)}}" type="button" class="btn btn-primary" style="color:black;margin-right:10px">Roles</a>
                                       
                                        <form method="POST" action="{{route('admin.users.destroy', $user)}}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="color:black;">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>        
    </div>
</x-admin-layout>
