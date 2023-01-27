<x-admin-layout>
    <div class="container-fluid" style="margin-top:30px">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div> 
                    <span>Name:{{$user->name}}</span>
                   
                </div>
                <div> 
                    <span>Email:{{$user->email}}</span>
                </div>
            </div>
        </div>  
        <br/>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2>Roles
                <div class="input-group mb-3 mt-2">
                   @if ($user->roles)
                        @foreach ($user->roles as $user_role)
                            <div style="background:#4a4ab5;border-radius:30px;color:white;padding:2px 10px;margin-right:10px">
                                <div class="row" style="padding:5px 15px;">
                                    <span>{{$user_role->name}}</span>
                                    <form action="{{route('admin.users.revoke.role',[$user, $user_role])}}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                <form action="{{route('admin.users.assign.role', $user)}}" method="POST">
                    @csrf
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04" aria-label="Example select with button addon" name="role">
                            <option selected>Choose...</option>
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="submit" style="background-color: aquamarine;color:black">Assign</button>
                        </div>
                      </div> 
                </form>    
            </div>
        </div>
        <br/>   
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <h2>Permission
                <div class="input-group mb-3 mt-2">
                   @if ($user->permissions)
                        @foreach ($user->permissions as $user_permission)
                            <div style="background:#4a4ab5;border-radius:30px;color:white;padding:2px 10px;margin-right:10px">
                                <div class="row" style="padding:5px 15px;">
                                    <span>{{$user_permission->name}}</span>
                                    <form action="  {{route('admin.users.revoke.permission',[$user, $user_permission])}}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                <form action="{{route('admin.users.assign.permission', $user)}}" method="POST">
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
