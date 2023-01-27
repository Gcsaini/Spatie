<x-admin-layout>
    <div class="container-fluid" style="margin-top:30px">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <form action="{{route('admin.roles.store')}}" method="POST"> 
                    @csrf
                    <div> 
                        <div class="row"  style="margin-top: 20px;margin-bottom: 20px">
                            <div class="col-md-9">
                                <input type="text" style="width:100%" name="name" placeholder="Enter permission">
                            </div>     
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success" style="color:white;height:40px;background:green">Create</button>
                            </div>     
                            @error('name')
                            <span style="color: red;">{{$message}}</span>
                            @enderror
                        </div>  
                    </div>
                 </form>   
            </div>
        </div>        
    </div>
</x-admin-layout>
