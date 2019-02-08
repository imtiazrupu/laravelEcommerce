<div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="text text-success">New Customer</h3>
        </div>
        <div class="panel-body">
            @if(isset($newCustomers))
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($newCustomers as $customer)
                        <tr>
                            <td>
                                {{-- {{ $customer->name }} --}}
                            </td>
                            <td>
                                {{-- {{ $customer->email }} --}}
                            </td>
                            <td>
                                {{-- {{ $customer->phone }} --}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
