<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-xl-12">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if (session('fail'))
                            <div class="alert alert-danger">
                                {{ session('fail') }}
                            </div>
                        @endif
                    </div>
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    {{ Form::open(array('url' => 'dashboard/transaction/search', 'method' => 'post', 'class'=>'needs-validation')) }}
                                        {{ Form::token() }}
                                        <div class="row mb-5">
                                            <div class="col">
                                                {{ Form::label('id', 'ID') }}
                                                {{ Form::text('id', '', ['class'=>'form-control']) }}
                                                {{ $errors->first('id') }}
                                            </div>
                                            <div class="col">
                                                {{ Form::label('email', 'Email') }}
                                                {{ Form::text('email', '', ['class'=>'form-control']) }}
                                                {{ $errors->first('email') }}
                                            </div>
                                            <div class="col">
                                                {{ Form::label('phone', 'Phone') }}
                                                {{ Form::text('phone', '', ['class'=>'form-control']) }}
                                                {{ $errors->first('phone') }}
                                            </div>
                                        </div>
                                        <div class="row mb-5">
                                            <div class="col">
                                                {{ Form::label('begin_date', 'Begin date') }}
                                                {{ Form::date('begin_date', '', ['class'=>'form-control']) }}
                                                {{ $errors->first('begin_date') }}
                                            </div>
                                            <div class="col">
                                                {{ Form::label('end_date', 'End date') }}
                                                {{ Form::date('end_date', '', ['class'=>'form-control']) }}
                                                {{ $errors->first('end_date') }}
                                            </div>
                                        </div>    
                                        {{ Form::submit('Отправить', ['class'=>'btn btn-primary']) }}
                                    {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="container p-md-3" align="right">
                            <button type="button" class="btn btn-primary">
                                <a href="transaction/create">Create</a>
                            </button>
                        </div>
                    </div>    
                    <div class="col-xl-12">
                        <div class="container">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Link</th>
                                        <th scope="col">Status</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                @if ($transactions)
                                    @foreach ($transactions as $transaction)
                                    <tbody>
                                        <tr>
                                            <td>{{ $transaction->id }}</td>
                                            <td>{{ $transaction->phone }}</td>
                                            <td>{{ $transaction->email }}</td>
                                            <td>{{ $transaction->amount }}</td>
                                            <td>{{ $transaction->created_at }}</td>
                                            <td>{{ $transaction->link }}</td>
                                            <td>{{ $transaction->status }}</td>
                                            <td><a href="transaction/show/{{ $transaction->id }}">See</a></td>
                                            <td><a href="/transaction/payment/{{ $transaction->link }}" target="blank">Link</a></td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="container p-md-3">
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
</x-app-layout>