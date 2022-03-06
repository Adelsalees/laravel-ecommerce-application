@extends('admin/layout')
@section('page_title',"Customers List")
@section('customer_class','active')
@section('container')

    <h2 class="title-1">Customers List</h2>
    <a href="{{ url('admin/customer')}}">
        <button type="button" class="btn btn-success mt-3">Back</button>
    </a>
    <div class="row m-t-20">
        <div class="col-md-8">
            <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                <table class="table table-borderless table-data3">
                   
                    <tbody>
                        <tr>
                            <td><strong> Name</strong></td>
                            <td>{{ $customer_list->name }}</td>
                        </tr>
                        <tr>
                            <td><strong> E-mail</strong></td>
                            <td>{{ $customer_list->name }}</td>
                        </tr>  <tr>
                            <td><strong> Mobile</strong></td>
                            <td>{{ $customer_list->mobile }}</td>
                        </tr>  <tr>
                            <td>Address</td>
                            <td>{{ $customer_list->address }}</td>
                        </tr>  <tr>
                            <td>City</td>
                            <td>{{ $customer_list->city }}</td>
                        </tr>  <tr>
                            <td>State</td>
                            <td>{{ $customer_list->state }}</td>
                        </tr>  <tr>
                            <td>Zip</td>
                            <td>{{ $customer_list->zip }}</td>
                        </tr>  <tr>
                            <td>Company</td>
                            <td>{{ $customer_list->company }}</td>
                        </tr>  <tr>
                            <td>GST</td>
                            <td>{{ $customer_list->gstin }}</td>
                        </tr>
                    </tr>  <tr>
                        <td>Created on</td>
                        <td>{{ \Carbon\Carbon::parse( $customer_list->created_at)->format('d-m-y h:i')}}</td>
                    </tr>
                </tr>  <tr>
                    <td>Updated on</td>
                    <td>{{ \Carbon\Carbon::parse( $customer_list->updated_at)}}</td>
                </tr>
                    </tbody>
                </table>
            </div>
            <!-- END DATA TABLE-->
        </div>
    </div>
@endsection