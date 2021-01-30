
@extends('layouts.admin')
@section('title', 'Dashboard - Manage Worlds')

@section('dashboard')

 <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">World Builder Dashboard > Worlds</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Manage Worlds</li>
            </ol>
            <div class="row">
                <button class="btn btn-success" data-toggle="modal" data-target="#createmodal">Add World</button>
            </div>
            <br>
             <!-- Create Modal -->
              <div class="modal fade" id="createmodal" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      
                      <h4 class="modal-title">Add World</h4>
                    </div>
                    <div class="modal-body">
                      
                        <form action="/worlds/save" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="1">World Name</label>
                                <input id="1" type="text" class="form-control" name="worldname">
                            </div>
                            <div class="form-group">
                                <label for="2">World Description</label><br>
                                <textarea id="2" class="form-control ckeditor" name="worlddescription"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                       
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            <div class="row">
                <table class="table table-bordered">
                    <thead>
                         <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach($worlds as $world)
                                <td>{{$world->id}}</td>
                                <td>{{$world->user->name}}</td>
                                <td>{{$world->name}}</td>
                                <td>{{$world->description}}</td>
                                <td>
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editmodal{{$world->id}}">Edit</button>
                                    <a href="/worlds/delete?id={{$world->id}}" class="btn btn-danger">Delete</a>
                                </td>

                                 <!-- Edit Modal -->
                                  <div class="modal fade" id="editmodal{{$world->id}}" role="dialog">
                                    <div class="modal-dialog">
                                    
                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title">Edit World</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>Some text in the modal.</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>
                           
                        </tr>
                         @endforeach
                    </tbody>    
                </table>
            </div>
        </div>
    </main>
</div>
@stop
            