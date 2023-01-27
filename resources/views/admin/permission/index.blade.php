<x-admin-layout>
    <div class="container-fluid" style="margin-top:30px">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="row"  style="margin-top: 20px;margin-bottom: 10px">
                
                    <div class="col-md-9">
                        
                    </div>     
                    <div class="col-md-3">
                        <a type="button" href="{{route('admin.permission.create')}}" class="btn btn-success" style="color:white;height:40px;background:green">Create</a>
                    </div>     
                  
                </div>  
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Permissions</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission) 
                            <tr>
                                <th scope="row">{{$permission->id}}</th>
                                <td>{{$permission->name}}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{route('admin.permission.edit',$permission)}}" type="button" class="btn btn-primary" style="color:black">Edit</a>
                                        <form method="POST" action="{{route('admin.permission.destroy',$permission)}}" onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="color:black;margin-left:10px">Delete</button>
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
