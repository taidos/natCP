@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="card-box">
                    <form role="form" method="post" >
                        <input type="hidden" name="_method" value="put"/>
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="hostname">Hostname / IP Address</label>
                            <input type="text" name= "hostname" id="hostname" value="{{$node->hostname}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="accessKey">Access Key</label>
                            <input type="text" id="accessKey" name="accesskey" value="{{$node->accesskey}}" class="form-control">
                        </div>
                        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">Save</button>
                    </form>
                </div>
            </div>

         </div>
        </div>
    </div>



@endsection