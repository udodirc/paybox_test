<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ Form::open(array('url' => 'dashboard/transaction/store', 'method' => 'post', 'class'=>'needs-validation')) }}
                        {{ Form::token() }}
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::text('email', '', ['class'=>'form-control']) }}
                            {{ $errors->first('email') }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone') }}
                            {{ Form::text('phone', '', ['class'=>'form-control']) }}
                            {{ $errors->first('phone') }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('amount', 'Amount') }}
                            {{ Form::text('amount', '', ['class'=>'form-control']) }}
                            {{ $errors->first('amount') }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('currency', 'Currency') }}
                            {{ Form::select('currency', $currency, ['class'=>'form-control']) }}
                            {{ $errors->first('currency') }}
                        </div>
                        {{ Form::submit('Отправить', ['class'=>'btn btn-primary']) }}
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>