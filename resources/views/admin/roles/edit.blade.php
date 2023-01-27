<x-admin-layout>
    <div class="container-fluid" style="margin-top:30px">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{route('admin.roles.update',$role)}}" method="POST"> 
                    @csrf
                    @method('PUT')
                    <div> 
                        <div class="row"  style="margin-top: 20px;margin-bottom: 20px">
                            <div class="col-md-9">
                                <input type="text" style="width:100%" name="name" placeholder="Enter permission" value="{{$role->name}}">
                            </div>     
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success" style="color:white;height:40px;background:green">Update</button>
                            </div>     
                            @error('name')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>  
                    </div>
                 </form>   
            </div>
        </div>  
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2>Role permissions
                <div class="input-group mb-3 mt-2">
                   @if ($role->permissions)
                        @foreach ($role->permissions as $role_permission)
                            <div style="background:#4a4ab5;border-radius:30px;color:white;padding:2px 10px;margin-right:10px">
                                <div class="row" style="padding:5px 15px;">
                                    <span>{{$role_permission->name}}</span>
                                    <form action="{{route('admin.roles.permission.revoke',[$role, $role_permission])}}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button style="color:red;padding-left:10px" type="submit">
                                            X
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach  
                   @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{route('admin.roles.permissions', $role)}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="permission">
                            <option selected>Choose...</option>
                            @foreach ($permissions as $permission)
                                <option value="{{$permission->name}}">{{$permission->name}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit" style="background-color: aquamarine;color:black">Assign</button>
                        </div>
                      </div> 
                </form>    
            </div>
        </div>   
    </div>
</x-admin-layout>
