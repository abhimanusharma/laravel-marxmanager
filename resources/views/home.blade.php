@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('inc.messages')

                    <div id="modalContainer">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#addModal" type="button" name="button">
                            <i class="fa fa-plus"></i>
                        </button>
                        <hr/>

                        <div class="bookmarks">
                            <h3>My Bookmarks</h3>
                            <ul class="list-group">
                                @if ($bookmarks)
                                    @foreach ($bookmarks as $bookmark)
                                        <li class="list-group-item">
                                           <a href="{{$bookmark->url}}" target="_blank" class="list-group-item-action">
                                            {{$bookmark->name}}
                                           <span class="badge badge-secondary">{{$bookmark->description}}</span>
                                        </a>
                                        <span class="float-right button-group">
                                            <button data-id="{{$bookmark->id}}" class="delete-bookmark btn btn-danger" type="button" name='delete'>
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            </span>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                       <!-- Modal -->
                        <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Bookmark</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="addForm">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="name">Bookmark Name</label>
                                                <input type="text" class="form-control" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="url">Bookmark URL</label>
                                                <input type="text" class="form-control" name="url">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Website Description</label>
                                                <textarea class="form-control" name="description"></textarea>
                                            </div>
                                            <input type="submit" value="Submit" name="submit" class="btn btn-success">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
